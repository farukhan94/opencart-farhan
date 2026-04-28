<?php

namespace CustomerSegment;

class Segmentation
{
    private $db;
    private $config;
    private $log;

    public function __construct($registry)
    {
        $this->db = $registry->get('db');
        $this->config = $registry->get('config');
        $this->log = $registry->get('log');
    }

    public function evaluate($customer_id, $debug_rule_id = null)
    {
        if ($debug_rule_id === null) {
            $this->log->write("CustomerSegment: Evaluating rules for customer ID: " . $customer_id);
        }

        // Check for manual lock buffer
        if ($debug_rule_id === null) {
            $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_segment_manual` WHERE customer_id = '" . (int) $customer_id . "' AND is_locked = 1");
            if ($query->num_rows) {
                return $query->row['group_id'];
            }
        }

        $customer_query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer` WHERE customer_id = '" . (int) $customer_id . "'");
        if (!$customer_query->num_rows)
            return false;
        $customer = $customer_query->row;

        if ($debug_rule_id) {
            $rule_query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_segment_rule` WHERE rule_id = '" . (int) $debug_rule_id . "'");
            if ($rule_query->num_rows) {
                $trace = array();
                $match = $this->checkRuleMatch($customer, $rule_query->row, $trace);
                return array('match' => $match, 'trace' => $trace);
            }
            return array('error' => 'Rule not found');
        }

        // Get active rules sorted by priority
        $rules_query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_segment_rule` WHERE status = 1 ORDER BY priority DESC, rule_id ASC");
        $rules = $rules_query->rows;

        foreach ($rules as $rule) {
            $trace = array(); // unused in normal run but passed
            if ($this->checkRuleMatch($customer, $rule, $trace)) {
                $this->log->write("CustomerSegment: Customer " . $customer_id . " matched rule '" . $rule['name'] . "'");
                return array('group_id' => $rule['target_group_id'], 'rule_id' => $rule['rule_id']);
            }
        }

        return array('group_id' => $this->config->get('config_customer_group_id'), 'rule_id' => 0);
    }

    private function checkRuleMatch($customer, $rule, &$trace)
    {
        $json = isset($rule['conditions_json']) ? html_entity_decode($rule['conditions_json'], ENT_QUOTES, 'UTF-8') : '[]';
        $conditions = json_decode($json, true);

        if (empty($conditions) || !isset($conditions['type'])) {
            $trace[] = "No conditions defined. Match fails.";
            return false;
        }

        return $this->evaluateGroup($conditions, $customer, $trace, 0);
    }

    private function evaluateGroup($group, $customer, &$trace, $depth = 0)
    {
        $logic = isset($group['logic']) ? strtoupper($group['logic']) : 'AND';
        $prefix = str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;", $depth);
        $trace[] = $prefix . "<strong>[GROUP $logic]</strong>";

        if (empty($group['conditions'])) {
            $trace[] = $prefix . "&nbsp;&nbsp;-> Empty group evaluates to true.";
            return true;
        }

        $results = array();
        foreach ($group['conditions'] as $child) {
            if (isset($child['type']) && $child['type'] === 'group') {
                $res = $this->evaluateGroup($child, $customer, $trace, $depth + 1);
            } else {
                $res = $this->evaluateCondition($child, $customer, $trace, $depth + 1);
            }

            // Short-circuiting logic
            if ($logic === 'AND' && !$res) {
                $trace[] = $prefix . "&nbsp;&nbsp;=> AND Group failed.";
                return false;
            }
            if ($logic === 'OR' && $res) {
                $trace[] = $prefix . "&nbsp;&nbsp;=> OR Group matched early.";
                return true;
            }
        }

        $final = ($logic === 'AND') ? true : false;
        $trace[] = $prefix . "&nbsp;&nbsp;=> Group result: " . ($final ? "<span style='color:green'>TRUE</span>" : "<span style='color:red'>FALSE</span>");
        return $final;
    }

    private function evaluateCondition($condition, $customer, &$trace, $depth)
    {
        $field = isset($condition['field']) ? $condition['field'] : '';
        $op = isset($condition['operator']) ? $condition['operator'] : '==';
        $val = isset($condition['value']) ? $condition['value'] : '';
        $prefix = str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;", $depth);

        $actual_val = null;

        switch ($field) {
            case 'spend_total':
                $timeframe = isset($condition['timeframe']) ? $condition['timeframe'] : null;
                $actual_val = $this->getCustomerSpend($customer['customer_id'], $timeframe);
                break;
            case 'order_count':
                $timeframe = isset($condition['timeframe']) ? $condition['timeframe'] : null;
                $actual_val = $this->getCustomerOrderCount($customer['customer_id'], $timeframe);
                break;
            case 'last_order_days_ago':
                $actual_val = $this->getLastOrderDaysAgo($customer['customer_id']);
                break;
            case 'inactive_days':
                $actual_val = $this->getInactiveDays($customer);
                break;
            case 'has_category':
                $timeframe = isset($condition['timeframe']) ? $condition['timeframe'] : null;
                $actual_val = $this->hasOrderedCategory($customer['customer_id'], $val, $timeframe);
                break;
            case 'has_product':
                $timeframe = isset($condition['timeframe']) ? $condition['timeframe'] : null;
                $actual_val = $this->hasOrderedProduct($customer['customer_id'], $val, $timeframe);
                break;
            case 'has_coupon':
                $timeframe = isset($condition['timeframe']) ? $condition['timeframe'] : null;
                $actual_val = $this->hasUsedCoupon($customer['customer_id'], $val, $timeframe);
                break;
            case 'age':
                $actual_val = $this->getCustomerAge($customer);
                break;
            case 'gender':
                $actual_val = strtolower(trim(isset($customer['gender']) ? $customer['gender'] : ''));
                break;
            case 'country_id':
                $actual_val = $this->getCustomerCountryId($customer['customer_id']);
                break;
            case 'zone_id':
                $actual_val = $this->getCustomerZoneId($customer['customer_id']);
                break;
            default:
                $actual_val = 0;
        }

        $passed = false;
        if ($field === 'has_category' || $field === 'has_product' || $field === 'has_coupon') {
            $passed = ($op === '!=') ? !$actual_val : $actual_val;
            $act_display = $actual_val ? "Yes" : "No";
            $trace[] = $prefix . "- [$field $op $val] => Actual: $act_display => " . ($passed ? "<span style='color:green'>PASS</span>" : "<span style='color:red'>FAIL</span>");
        } elseif ($field === 'gender') {
            $target_gender = strtolower(trim($val));
            switch ($op) {
                case '==':
                    $passed = ($actual_val === $target_gender);
                    break;
                case '!=':
                    $passed = ($actual_val !== $target_gender);
                    break;
                default:
                    $passed = false;
            }
            $trace[] = $prefix . "- [$field $op $val] => Actual: '$actual_val' => " . ($passed ? "<span style='color:green'>PASS</span>" : "<span style='color:red'>FAIL</span>");
        } else {
            $numeric_actual = (float) $actual_val;
            $numeric_target = (float) $val;
            $timeframe_label = '';
            if (isset($condition['timeframe']) && $condition['timeframe']['type'] !== 'all') {
                $tf = $condition['timeframe'];
                if ($tf['type'] === 'calendar_month')
                    $timeframe_label = ' [Calendar Month]';
                elseif ($tf['type'] === 'rolling')
                    $timeframe_label = ' [Last ' . (int) (isset($tf['days']) ? $tf['days'] : 30) . ' Days]';
                elseif ($tf['type'] === 'custom')
                    $timeframe_label = ' [' . (isset($tf['start']) ? $tf['start'] : '') . ' to ' . (isset($tf['end']) ? $tf['end'] : '') . ']';
            }
            switch ($op) {
                case '==':
                    $passed = ($numeric_actual == $numeric_target);
                    break;
                case '!=':
                    $passed = ($numeric_actual != $numeric_target);
                    break;
                case '>':
                    $passed = ($numeric_actual > $numeric_target);
                    break;
                case '>=':
                    $passed = ($numeric_actual >= $numeric_target);
                    break;
                case '<':
                    $passed = ($numeric_actual < $numeric_target);
                    break;
                case '<=':
                    $passed = ($numeric_actual <= $numeric_target);
                    break;
            }
            $trace[] = $prefix . "- [$field$timeframe_label $op $val] => Actual: $actual_val => " . ($passed ? "<span style='color:green'>PASS</span>" : "<span style='color:red'>FAIL</span>");
        }

        return $passed;
    }

    private function buildTimeframeClause($timeframe, $dateColumn = 'date_added')
    {
        if (empty($timeframe) || !isset($timeframe['type']) || $timeframe['type'] === 'all') {
            return '';
        }
        switch ($timeframe['type']) {
            case 'calendar_month':
                return " AND $dateColumn >= DATE_FORMAT(NOW(), '%Y-%m-01') AND $dateColumn < DATE_FORMAT(DATE_ADD(NOW(), INTERVAL 1 MONTH), '%Y-%m-01')";
            case 'rolling':
                $days = isset($timeframe['days']) ? (int) $timeframe['days'] : 30;
                return " AND $dateColumn >= DATE_SUB(NOW(), INTERVAL $days DAY)";
            case 'custom':
                $clauses = '';
                if (!empty($timeframe['start'])) {
                    $clauses .= " AND $dateColumn >= '" . $this->db->escape($timeframe['start']) . "'";
                }
                if (!empty($timeframe['end'])) {
                    $clauses .= " AND $dateColumn <= '" . $this->db->escape($timeframe['end']) . " 23:59:59'";
                }
                return $clauses;
        }
        return '';
    }

    private function getCustomerSpend($customer_id, $timeframe = null)
    {
        $tf_clause = $this->buildTimeframeClause($timeframe, 'o.date_added');
        $query = $this->db->query("SELECT SUM(total) AS total FROM `" . DB_PREFIX . "order` o WHERE customer_id = '" . (int) $customer_id . "' AND order_status_id > 0" . $tf_clause);
        return (float) $query->row['total'];
    }

    private function getCustomerOrderCount($customer_id, $timeframe = null)
    {
        $tf_clause = $this->buildTimeframeClause($timeframe, 'date_added');
        $query = $this->db->query("SELECT COUNT(*) AS total FROM `" . DB_PREFIX . "order` WHERE customer_id = '" . (int) $customer_id . "' AND order_status_id > 0" . $tf_clause);
        return (int) $query->row['total'];
    }

    private function getLastOrderDaysAgo($customer_id)
    {
        $query = $this->db->query("SELECT MAX(date_added) as last_date FROM `" . DB_PREFIX . "order` WHERE customer_id = '" . (int) $customer_id . "' AND order_status_id > 0");
        if ($query->row['last_date']) {
            $diff = time() - strtotime($query->row['last_date']);
            return floor($diff / 86400);
        }
        return 999999;
    }

    private function getInactiveDays($customer)
    {
        $last_days = $this->getLastOrderDaysAgo($customer['customer_id']);
        if ($last_days == 999999) {
            if (!empty($customer['date_added']) && $customer['date_added'] != '0000-00-00 00:00:00') {
                $diff = time() - strtotime($customer['date_added']);
                return floor($diff / 86400);
            }
            return 0;
        }
        return $last_days;
    }

    private function hasOrderedCategory($customer_id, $category_id, $timeframe = null)
    {
        $tf_clause = $this->buildTimeframeClause($timeframe, 'o.date_added');
        $sql = "SELECT op.order_product_id FROM `" . DB_PREFIX . "order` o JOIN `" . DB_PREFIX . "order_product` op ON (o.order_id = op.order_id) JOIN `" . DB_PREFIX . "product_to_category` p2c ON (op.product_id = p2c.product_id) WHERE o.customer_id = '" . (int) $customer_id . "' AND o.order_status_id > 0 AND p2c.category_id = '" . (int) $category_id . "'" . $tf_clause . " LIMIT 1";
        $query = $this->db->query($sql);
        return $query->num_rows > 0;
    }

    private function hasOrderedProduct($customer_id, $product_id, $timeframe = null)
    {
        $tf_clause = $this->buildTimeframeClause($timeframe, 'o.date_added');
        $sql = "SELECT op.order_product_id FROM `" . DB_PREFIX . "order` o JOIN `" . DB_PREFIX . "order_product` op ON (o.order_id = op.order_id) WHERE o.customer_id = '" . (int) $customer_id . "' AND o.order_status_id > 0 AND op.product_id = '" . (int) $product_id . "'" . $tf_clause . " LIMIT 1";
        $query = $this->db->query($sql);
        return $query->num_rows > 0;
    }

    private function hasUsedCoupon($customer_id, $coupon_code, $timeframe = null)
    {
        $tf_clause = $this->buildTimeframeClause($timeframe, 'o.date_added');
        $sql = "SELECT ot.order_id FROM `" . DB_PREFIX . "order_total` ot JOIN `" . DB_PREFIX . "order` o ON (ot.order_id = o.order_id) WHERE ot.code = 'coupon' AND ot.title LIKE '%" . $this->db->escape($coupon_code) . "%' AND o.customer_id = '" . (int) $customer_id . "' AND o.order_status_id > 0" . $tf_clause . " LIMIT 1";
        $query = $this->db->query($sql);
        return $query->num_rows > 0;
    }

    private function getCustomerCountryId($customer_id)
    {
        $query = $this->db->query("SELECT a.country_id FROM `" . DB_PREFIX . "customer` c LEFT JOIN `" . DB_PREFIX . "address` a ON (c.address_id = a.address_id) WHERE c.customer_id = '" . (int) $customer_id . "'");
        return isset($query->row['country_id']) ? (int) $query->row['country_id'] : 0;
    }

    private function getCustomerZoneId($customer_id)
    {
        $query = $this->db->query("SELECT a.zone_id FROM `" . DB_PREFIX . "customer` c LEFT JOIN `" . DB_PREFIX . "address` a ON (c.address_id = a.address_id) WHERE c.customer_id = '" . (int) $customer_id . "'");
        return isset($query->row['zone_id']) ? (int) $query->row['zone_id'] : 0;
    }

    private function getCustomerAge($customer)
    {
        $dob = isset($customer['date_of_birth']) ? $customer['date_of_birth'] : null;
        if (empty($dob) || $dob === '0000-00-00') {
            return 0;
        }
        try {
            $birthDate = new \DateTime($dob);
            $today = new \DateTime();
            return (int) $birthDate->diff($today)->y;
        } catch (\Exception $e) {
            return 0;
        }
    }
}
