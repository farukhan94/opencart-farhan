<?php
class ModelExtensionModuleCustomerSegment extends Model
{
    public function getBanners($customer_group_id)
    {
        $query = $this->db->query("SELECT b.* FROM `" . DB_PREFIX . "customer_segment_banner` b JOIN `" . DB_PREFIX . "customer_segment_banner_group` bg ON (b.banner_id = bg.banner_id) WHERE bg.customer_group_id = '" . (int) $customer_group_id . "' AND b.status = '1' ORDER BY b.banner_id ASC");
        return $query->rows;
    }

    public function getBanner($banner_id, $customer_group_id = 0)
    {
        $sql = "SELECT b.* FROM `" . DB_PREFIX . "customer_segment_banner` b";
        if ($customer_group_id) {
            $sql .= " JOIN `" . DB_PREFIX . "customer_segment_banner_group` bg ON (b.banner_id = bg.banner_id) WHERE bg.customer_group_id = '" . (int) $customer_group_id . "' AND b.banner_id = '" . (int) $banner_id . "'";
        } else {
            $sql .= " WHERE b.banner_id = '" . (int) $banner_id . "'";
        }
        $sql .= " AND b.status = '1'";
        $query = $this->db->query($sql);
        return $query->row;
    }

    public function getSliders($customer_group_id)
    {
        $query = $this->db->query("SELECT s.* FROM `" . DB_PREFIX . "customer_segment_slider` s JOIN `" . DB_PREFIX . "customer_segment_slider_group` sg ON (s.slider_id = sg.slider_id) WHERE sg.customer_group_id = '" . (int) $customer_group_id . "' AND s.status = '1' ORDER BY s.slider_id ASC");

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
        $sql = "SELECT s.* FROM `" . DB_PREFIX . "customer_segment_slider` s";
        if ($customer_group_id) {
            $sql .= " JOIN `" . DB_PREFIX . "customer_segment_slider_group` sg ON (s.slider_id = sg.slider_id) WHERE sg.customer_group_id = '" . (int) $customer_group_id . "' AND s.slider_id = '" . (int) $slider_id . "'";
        } else {
            $sql .= " WHERE s.slider_id = '" . (int) $slider_id . "'";
        }
        $sql .= " AND s.status = '1'";
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

    public function getPromotions($customer_group_id)
    {
        $query = $this->db->query("SELECT p.* FROM `" . DB_PREFIX . "customer_segment_promotion` p JOIN `" . DB_PREFIX . "customer_segment_promotion_group` pg ON (p.promotion_id = pg.promotion_id) WHERE pg.customer_group_id = '" . (int) $customer_group_id . "' AND p.status = '1' ORDER BY p.promotion_id ASC");
        
        $promotions = array();
        foreach ($query->rows as $promo) {
            if ($promo['type'] == 'coupon' && $this->customer->isLogged()) {
                $promo['code'] = $this->getOrGenerateCoupon($promo['promotion_id'], $this->customer->getId());
            }
            $promotions[] = $promo;
        }
        return $promotions;
    }

    private function getOrGenerateCoupon($promotion_id, $customer_id)
    {
        $query = $this->db->query("SELECT coupon_code FROM `" . DB_PREFIX . "customer_segment_coupon_generated` WHERE promotion_id = '" . (int)$promotion_id . "' AND customer_id = '" . (int)$customer_id . "'");
        
        if ($query->num_rows) {
            return $query->row['coupon_code'];
        }

        // Generate new coupon
        $promo_info = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_segment_promotion` WHERE promotion_id = '" . (int)$promotion_id . "'")->row;
        if (!$promo_info || !$promo_info['coupon_basis_id']) return '';

        // Clone from basis coupon
        $basis_query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "coupon` WHERE coupon_id = '" . (int)$promo_info['coupon_basis_id'] . "'");
        if (!$basis_query->num_rows) return '';
        
        $basis = $basis_query->row;
        $new_code = ($promo_info['coupon_prefix'] ? $promo_info['coupon_prefix'] : 'SEG') . '-' . strtoupper(substr(md5(uniqid(rand(), true)), 0, 8));

        $this->db->query("INSERT INTO `" . DB_PREFIX . "coupon` SET 
            name = '" . $this->db->escape($promo_info['title'] . ' for Cust ' . $customer_id) . "', 
            code = '" . $this->db->escape($new_code) . "', 
            discount = '" . (float)$basis['discount'] . "', 
            type = '" . $this->db->escape($basis['type']) . "', 
            total = '" . (float)$basis['total'] . "', 
            logged = '" . (int)$basis['logged'] . "', 
            shipping = '" . (int)$basis['shipping'] . "', 
            date_start = '" . $this->db->escape($basis['date_start']) . "', 
            date_end = '" . $this->db->escape($basis['date_end']) . "', 
            uses_total = '" . (int)$basis['uses_total'] . "', 
            uses_customer = '" . (int)$basis['uses_customer'] . "', 
            status = '1', 
            date_added = NOW()");
        
        $new_coupon_id = $this->db->getLastId();

        // Copy categories/products from basis
        $this->db->query("INSERT INTO `" . DB_PREFIX . "coupon_category` (coupon_id, category_id) SELECT " . (int)$new_coupon_id . ", category_id FROM `" . DB_PREFIX . "coupon_category` WHERE coupon_id = '" . (int)$promo_info['coupon_basis_id'] . "'");
        $this->db->query("INSERT INTO `" . DB_PREFIX . "coupon_product` (coupon_id, product_id) SELECT " . (int)$new_coupon_id . ", product_id FROM `" . DB_PREFIX . "coupon_product` WHERE coupon_id = '" . (int)$promo_info['coupon_basis_id'] . "'");

        $this->db->query("INSERT INTO `" . DB_PREFIX . "customer_segment_coupon_generated` SET 
            promotion_id = '" . (int)$promotion_id . "', 
            customer_id = '" . (int)$customer_id . "', 
            coupon_id = '" . (int)$new_coupon_id . "', 
            coupon_code = '" . $this->db->escape($new_code) . "', 
            date_generated = NOW()");

        return $new_code;
    }

    public function getPromotion($promotion_id, $customer_group_id = 0)
    {
        $sql = "SELECT p.* FROM `" . DB_PREFIX . "customer_segment_promotion` p";
        if ($customer_group_id) {
            $sql .= " JOIN `" . DB_PREFIX . "customer_segment_promotion_group` pg ON (p.promotion_id = pg.promotion_id) WHERE pg.customer_group_id = '" . (int) $customer_group_id . "' AND p.promotion_id = '" . (int) $promotion_id . "'";
        } else {
            $sql .= " WHERE p.promotion_id = '" . (int) $promotion_id . "'";
        }
        $sql .= " AND p.status = '1'";
        $query = $this->db->query($sql);
        return $query->row;
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

    public function getRestrictedItems()
    {
        $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_segment_restricted` ");
        $restricted = array('product' => array(), 'category' => array());
        foreach ($query->rows as $row) {
            $restricted[$row['item_type']][$row['item_id']] = json_decode($row['customer_group_ids'], true);
        }
        return $restricted;
    }

    public function getCombosForGroups($group_ids)
    {
        $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_segment_combo` WHERE status = '1'");
        $combos = array();
        foreach ($query->rows as $row) {
            $allowed_groups = json_decode($row['customer_group_ids'], true);
            $intersect = array_intersect($group_ids, $allowed_groups);
            if (!empty($intersect)) {
                $combos[] = $row;
            }
        }
        return $combos;
    }

    public function getBestCartDiscount($group_ids, $cart_products)
    {
        if (empty($group_ids)) return array('value' => 0, 'type' => 'percent', 'title' => '');

        // 1. Fetch all active cart_discount promotions for these groups
        $sql = "SELECT p.* FROM `" . DB_PREFIX . "customer_segment_promotion` p JOIN `" . DB_PREFIX . "customer_segment_promotion_group` pg ON (p.promotion_id = pg.promotion_id) WHERE pg.customer_group_id IN (" . implode(',', array_map('intval', $group_ids)) . ") AND p.type = 'cart_discount' AND p.status = '1'";
        $query = $this->db->query($sql);

        $best_discount = array('value' => 0, 'type' => 'percent', 'title' => '');

        foreach ($query->rows as $promo) {
            $applies = false;
            if ($promo['scope'] == 'all') {
                $applies = true;
            } elseif ($promo['scope'] == 'specific_products') {
                $promo_pids = explode(',', $promo['product_ids']);
                foreach ($cart_products as $cp) {
                    if (in_array($cp['product_id'], $promo_pids)) {
                        $applies = true;
                        break;
                    }
                }
            } elseif ($promo['scope'] == 'specific_categories') {
                $promo_cids = explode(',', $promo['category_ids']);
                foreach ($cart_products as $cp) {
                    $product_categories = $this->db->query("SELECT category_id FROM " . DB_PREFIX . "product_to_category WHERE product_id = '" . (int)$cp['product_id'] . "'")->rows;
                    foreach ($product_categories as $pc) {
                        if (in_array($pc['category_id'], $promo_cids)) {
                            $applies = true;
                            break 2;
                        }
                    }
                }
            }

            if ($applies) {
                if ($promo['discount_value'] > $best_discount['value']) {
                    $best_discount = array(
                        'value' => (float)$promo['discount_value'],
                        'type'  => $promo['discount_type'],
                        'title' => $promo['title']
                    );
                }
            }
        }

        return $best_discount;
    }
}

