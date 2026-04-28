<?php
class ModelExtensionModuleCustomerSegment extends Model
{
    public function getBanners($customer_group_id)
    {
        $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_segment_banner` WHERE customer_group_id = '" . (int) $customer_group_id . "' AND status = 1 ORDER BY banner_id ASC");
        return $query->rows;
    }

    public function getBannersForGroup($customer_group_id)
    {
        return $this->getBanners($customer_group_id);
    }

    public function getBanner($banner_id, $customer_group_id = 0)
    {
        $sql = "SELECT * FROM `" . DB_PREFIX . "customer_segment_banner` WHERE banner_id = '" . (int) $banner_id . "' AND status = 1";
        if ($customer_group_id) {
            $sql .= " AND customer_group_id = '" . (int) $customer_group_id . "'";
        }
        $query = $this->db->query($sql);
        return $query->row;
    }

    public function getSliders($customer_group_id)
    {
        $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_segment_slider` WHERE customer_group_id = '" . (int) $customer_group_id . "' AND status = 1 ORDER BY slider_id ASC");

        $sliders = array();
        $this->load->model('catalog/product');
        $this->load->model('tool/image');

        foreach ($query->rows as $result) {
            $products = array();
            if (!empty($result['product_ids'])) {
                $ids = array_filter(array_map('intval', explode(',', $result['product_ids'])));
                foreach ($ids as $pid) {
                    $product_info = $this->model_catalog_product->getProduct($pid);
                    if ($product_info) {
                        if ($product_info['image']) {
                            $image = $this->model_tool_image->resize($product_info['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height'));
                        } else {
                            $image = $this->model_tool_image->resize('placeholder.png', $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height'));
                        }

                        $products[] = array(
                            'product_id' => $product_info['product_id'],
                            'thumb' => $image,
                            'name' => $product_info['name'],
                            'description' => utf8_substr(strip_tags(html_entity_decode($product_info['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
                            'price' => $this->currency->format($this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']),
                            'href' => $this->url->link('product/product', 'product_id=' . $product_info['product_id'])
                        );
                    }
                }
            }

            $sliders[] = array(
                'slider_id' => $result['slider_id'],
                'name' => $result['name'],
                'product_ids' => $result['product_ids'],
                'products' => $products,
            );
        }

        return $sliders;
    }

    public function getSlider($slider_id, $customer_group_id = 0)
    {
        $sql = "SELECT * FROM `" . DB_PREFIX . "customer_segment_slider` WHERE slider_id = '" . (int) $slider_id . "' AND status = 1";
        if ($customer_group_id) {
            $sql .= " AND customer_group_id = '" . (int) $customer_group_id . "'";
        }
        $query = $this->db->query($sql);

        if (!$query->row)
            return array();

        $this->load->model('catalog/product');
        $this->load->model('tool/image');

        $products = array();
        if (!empty($query->row['product_ids'])) {
            $ids = array_filter(array_map('intval', explode(',', $query->row['product_ids'])));
            foreach ($ids as $pid) {
                $product_info = $this->model_catalog_product->getProduct($pid);
                if ($product_info) {
                    if ($product_info['image']) {
                        $image = $this->model_tool_image->resize($product_info['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height'));
                    } else {
                        $image = $this->model_tool_image->resize('placeholder.png', $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height'));
                    }

                    $products[] = array(
                        'product_id' => $product_info['product_id'],
                        'thumb' => $image,
                        'name' => $product_info['name'],
                        'description' => utf8_substr(strip_tags(html_entity_decode($product_info['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
                        'price' => $this->currency->format($this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']),
                        'href' => $this->url->link('product/product', 'product_id=' . $product_info['product_id'])
                    );
                }
            }
        }

        return array(
            'slider_id' => $query->row['slider_id'],
            'name' => $query->row['name'],
            'product_ids' => $query->row['product_ids'],
            'products' => $products
        );
    }

    public function getSlidersForGroup($customer_group_id)
    {
        return $this->getSliders($customer_group_id);
    }

    public function getPromotion($promotion_id, $customer_group_id = 0)
    {
        $sql = "SELECT * FROM `" . DB_PREFIX . "customer_segment_promotion` WHERE promotion_id = '" . (int) $promotion_id . "' AND status = 1";
        if ($customer_group_id) {
            $sql .= " AND customer_group_id = '" . (int) $customer_group_id . "'";
        }
        $query = $this->db->query($sql);
        return $query->row;
    }

    public function getPromotions($customer_group_id)
    {
        $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_segment_promotion` WHERE customer_group_id = '" . (int) $customer_group_id . "' AND status = 1 ORDER BY promotion_id ASC");
        return $query->rows;
    }

    public function getPromotionsForGroup($customer_group_id)
    {
        return $this->getPromotions($customer_group_id);
    }

    public function evaluateRulesForCustomer($customer_id)
    {
        require_once(DIR_SYSTEM . 'library/customer_segment/segmentation.php');
        $segmentation = new \CustomerSegment\Segmentation($this->registry);
        $eval_result = $segmentation->evaluate($customer_id);

        $this->updateCustomerGroup($customer_id, $eval_result['group_id']);

        return $eval_result['group_id'];
    }

    public function updateCustomerGroup($customer_id, $customer_group_id, $rule_id = 0)
    {
        $query = $this->db->query("SELECT customer_group_id FROM " . DB_PREFIX . "customer WHERE customer_id = '" . (int) $customer_id . "'");
        $old_group_id = $query->row ? $query->row['customer_group_id'] : 0;

        if ($old_group_id != $customer_group_id) {
            $this->db->query("UPDATE " . DB_PREFIX . "customer SET customer_group_id = '" . (int) $customer_group_id . "' WHERE customer_id = '" . (int) $customer_id . "'");

            $this->db->query("INSERT INTO " . DB_PREFIX . "customer_segment_log SET
                customer_id = '" . (int) $customer_id . "',
                old_group_id = '" . (int) $old_group_id . "',
                new_group_id = '" . (int) $customer_group_id . "',
                rule_id = '" . (int) $rule_id . "',
                date_added = NOW()");

            if ($rule_id > 0) {
                $rule_query = $this->db->query("SELECT actions_json FROM `" . DB_PREFIX . "customer_segment_rule` WHERE rule_id = '" . (int) $rule_id . "'");
                if ($rule_query->num_rows && !empty($rule_query->row['actions_json'])) {
                    $actions = json_decode(html_entity_decode($rule_query->row['actions_json'], ENT_QUOTES, 'UTF-8'), true);

                    if (isset($actions['notification']) && !empty($actions['notification']['title'])) {
                        $tokens_query = $this->db->query("SELECT token FROM `" . DB_PREFIX . "customer_segment_fcm_token` WHERE customer_id = '" . (int) $customer_id . "'");
                        if ($tokens_query->num_rows) {
                            $firebase_json = $this->config->get('module_customer_segment_firebase_json');
                            if ($firebase_json) {
                                require_once(DIR_SYSTEM . 'library/customer_segment/firebase.php');
                                $firebase = new \CustomerSegment\Firebase($firebase_json, $this->registry);
                                foreach ($tokens_query->rows as $token_row) {
                                    $firebase->sendToDevice($token_row['token'], $actions['notification']['title'], $actions['notification']['body']);
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    public function addFCMToken($customer_id, $token)
    {
        $this->db->query("DELETE FROM `" . DB_PREFIX . "customer_segment_fcm_token` WHERE token = '" . $this->db->escape($token) . "'");
        $this->db->query("INSERT INTO `" . DB_PREFIX . "customer_segment_fcm_token` SET customer_id = '" . (int) $customer_id . "', token = '" . $this->db->escape($token) . "', date_added = NOW()");
    }
}
