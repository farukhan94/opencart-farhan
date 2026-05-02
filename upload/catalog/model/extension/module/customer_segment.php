<?php
class ModelExtensionModuleCustomerSegment extends Model
{
    public function getBanners($customer_group_id)
    {
        $query = $this->db->query("SELECT p.* FROM `" . DB_PREFIX . "customer_segment_promotion` p JOIN `" . DB_PREFIX . "customer_segment_promotion_group` pg ON (p.promotion_id = pg.promotion_id) WHERE pg.customer_group_id = '" . (int) $customer_group_id . "' AND p.status = '1' AND p.visual_type = 'banner' ORDER BY p.promotion_id ASC");
        
        $banners = array();
        foreach ($query->rows as $row) {
            if (!empty($row['banner_data'])) {
                $bdata = json_decode($row['banner_data'], true);
                if (is_array($bdata)) {
                    foreach ($bdata as $b) {
                        $banners[] = array(
                            'title' => $row['title'],
                            'link' => isset($b['link']) ? $b['link'] : '',
                            'image' => isset($b['image']) ? $b['image'] : ''
                        );
                    }
                }
            }
        }
        return $banners;
    }

    public function getBanner($banner_id, $customer_group_id = 0)
    {
        $sql = "SELECT p.* FROM `" . DB_PREFIX . "customer_segment_promotion` p";
        if ($customer_group_id) {
            $sql .= " JOIN `" . DB_PREFIX . "customer_segment_promotion_group` pg ON (p.promotion_id = pg.promotion_id) WHERE pg.customer_group_id = '" . (int) $customer_group_id . "' AND p.promotion_id = '" . (int) $banner_id . "'";
        } else {
            $sql .= " WHERE p.promotion_id = '" . (int) $banner_id . "'";
        }
        $sql .= " AND p.status = '1' AND p.visual_type = 'banner'";
        $query = $this->db->query($sql);
        return $query->row;
    }

    public function getSliders($customer_group_id)
    {
        $query = $this->db->query("SELECT p.*, p.promotion_id AS slider_id FROM `" . DB_PREFIX . "customer_segment_promotion` p JOIN `" . DB_PREFIX . "customer_segment_promotion_group` pg ON (p.promotion_id = pg.promotion_id) WHERE pg.customer_group_id = '" . (int) $customer_group_id . "' AND p.status = '1' AND p.visual_type = 'product_slider' ORDER BY p.promotion_id ASC");

        $sliders = array();
        $this->load->model('catalog/product');
        $this->load->model('tool/image');

        $all_slider_product_ids = array();
        foreach ($query->rows as $result) {
            if (!empty($result['product_ids'])) {
                $ids = array_filter(array_map('intval', explode(',', $result['product_ids'])));
                $all_slider_product_ids = array_merge($all_slider_product_ids, $ids);
            }
        }
        $all_slider_product_ids = array_unique($all_slider_product_ids);

        $cart_products_for_check = array();
        foreach ($all_slider_product_ids as $pid) {
            $cart_products_for_check[] = array('product_id' => $pid);
        }

        $cart_discount = $this->getBestCartDiscount(array($customer_group_id), $cart_products_for_check);
        $has_segment_discount = $cart_discount && $cart_discount['value'] > 0;

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

                        $base_price = (float)$product_info['price'];
                        $special = false;
                        $discount_percent = 0;

                        if ((float)$product_info['special']) {
                            $base_price = (float)$product_info['special'];
                            $special = $this->currency->format($this->tax->calculate($product_info['special'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                            if ((float)$product_info['price'] > 0) {
                                $discount_percent = round((($product_info['price'] - $product_info['special']) / $product_info['price']) * 100);
                            }
                        }

                        if ($has_segment_discount) {
                            if ($cart_discount['type'] == 'percent') {
                                $discount_amount = $base_price * ($cart_discount['value'] / 100);
                                $discount_percent = (int)$cart_discount['value'];
                            } else {
                                $discount_amount = $cart_discount['value'];
                                if ($base_price > 0) {
                                    $discount_percent = round(($discount_amount / $base_price) * 100);
                                }
                            }
                            $base_price = $base_price - $discount_amount;
                        }

                        $discounted_price = false;
                        if ($has_segment_discount) {
                            $discounted_price = $this->currency->format($this->tax->calculate($base_price, $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                        }

                        $products[] = array(
                            'product_id' => $product_info['product_id'],
                            'thumb' => $image,
                            'name' => $product_info['name'],
                            'description' => utf8_substr(strip_tags(html_entity_decode($product_info['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
                            'price' => $this->currency->format($this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']),
                            'special' => $special,
                            'discount_percent' => $discount_percent,
                            'discounted_price' => $discounted_price,
                            'segment_discount' => $has_segment_discount,
                            'segment_discount_title' => $has_segment_discount ? $cart_discount['title'] : '',
                            'segment_discount_badge_text' => $has_segment_discount ? ($cart_discount['type'] == 'percent' ? '- ' . (int)$cart_discount['value'] . '%' : '- ' . $this->currency->format($this->tax->calculate($cart_discount['value'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency'])) : '',
                            'href' => $this->url->link('product/product', 'product_id=' . $product_info['product_id'])
                        );
                    }
                }
            }

            $sliders[] = array(
                'slider_id' => $result['promotion_id'],
                'name' => $result['title'],
                'product_ids' => $result['product_ids'],
                'products' => $products,
            );
        }

        return $sliders;
    }

    public function getSlider($slider_id, $customer_group_id = 0)
    {
        $sql = "SELECT p.* FROM `" . DB_PREFIX . "customer_segment_promotion` p";
        if ($customer_group_id) {
            $sql .= " JOIN `" . DB_PREFIX . "customer_segment_promotion_group` pg ON (p.promotion_id = pg.promotion_id) WHERE pg.customer_group_id = '" . (int) $customer_group_id . "' AND p.promotion_id = '" . (int) $slider_id . "'";
        } else {
            $sql .= " WHERE p.promotion_id = '" . (int) $slider_id . "'";
        }
        $sql .= " AND p.status = '1' AND p.visual_type = 'product_slider'";
        $query = $this->db->query($sql);

        if (!$query->row)
            return array();

        $this->load->model('catalog/product');
        $this->load->model('tool/image');

        $all_slider_product_ids = array();
        if (!empty($query->row['product_ids'])) {
            $all_slider_product_ids = array_filter(array_map('intval', explode(',', $query->row['product_ids'])));
        }

        $cart_products_for_check = array();
        foreach ($all_slider_product_ids as $pid) {
            $cart_products_for_check[] = array('product_id' => $pid);
        }

        $cart_discount = $this->getBestCartDiscount(array($customer_group_id), $cart_products_for_check);
        $has_segment_discount = $cart_discount && $cart_discount['value'] > 0;

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

                    $base_price = (float)$product_info['price'];
                    $special = false;
                    $discount_percent = 0;

                    if ((float)$product_info['special']) {
                        $base_price = (float)$product_info['special'];
                        $special = $this->currency->format($this->tax->calculate($product_info['special'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                        if ((float)$product_info['price'] > 0) {
                            $discount_percent = round((($product_info['price'] - $product_info['special']) / $product_info['price']) * 100);
                        }
                    }

                    if ($has_segment_discount) {
                        if ($cart_discount['type'] == 'percent') {
                            $discount_amount = $base_price * ($cart_discount['value'] / 100);
                            $discount_percent = (int)$cart_discount['value'];
                        } else {
                            $discount_amount = $cart_discount['value'];
                            if ($base_price > 0) {
                                $discount_percent = round(($discount_amount / $base_price) * 100);
                            }
                        }
                        $base_price = $base_price - $discount_amount;
                    }

                    $discounted_price = false;
                    if ($has_segment_discount) {
                        $discounted_price = $this->currency->format($this->tax->calculate($base_price, $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                    }

                    $products[] = array(
                        'product_id' => $product_info['product_id'],
                        'thumb' => $image,
                        'name' => $product_info['name'],
                        'description' => utf8_substr(strip_tags(html_entity_decode($product_info['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
                        'price' => $this->currency->format($this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']),
                        'special' => $special,
                        'discount_percent' => $discount_percent,
                        'discounted_price' => $discounted_price,
                        'segment_discount' => $has_segment_discount,
                        'segment_discount_title' => $has_segment_discount ? $cart_discount['title'] : '',
                        'segment_discount_badge_text' => $has_segment_discount ? ($cart_discount['type'] == 'percent' ? '- ' . (int)$cart_discount['value'] . '%' : '- ' . $this->currency->format($this->tax->calculate($cart_discount['value'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency'])) : '',
                        'href' => $this->url->link('product/product', 'product_id=' . $product_info['product_id'])
                    );
                }
            }
        }

        return array(
            'slider_id' => $query->row['promotion_id'],
            'name' => $query->row['title'],
            'product_ids' => $query->row['product_ids'],
            'products' => $products
        );
    }

    public function getPromotions($customer_group_id)
    {
        $query = $this->db->query("SELECT p.* FROM `" . DB_PREFIX . "customer_segment_promotion` p JOIN `" . DB_PREFIX . "customer_segment_promotion_group` pg ON (p.promotion_id = pg.promotion_id) WHERE pg.customer_group_id = '" . (int) $customer_group_id . "' AND p.status = '1' ORDER BY p.promotion_id ASC");
        
        return $query->rows;
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

			$this->addLog('group_change', $customer_id, array(
				'old_group_id' => $old_group_id,
				'new_group_id' => $customer_group_id
			), $rule_id);

            if ($rule_id > 0) {
                $this->sendReassignmentNotification($customer_id, $customer_group_id, $rule_id);
            }
        }
    }

    public function sendReassignmentNotification($customer_id, $customer_group_id, $rule_id = 0)
    {
        $notification_title = '';
        $notification_body = '';
        $promotion_id = 0;

        // 1. Check for Promotion Overrides
        $promo_query = $this->db->query("SELECT p.* FROM `" . DB_PREFIX . "customer_segment_promotion` p 
            JOIN `" . DB_PREFIX . "customer_segment_promotion_group` pg ON (p.promotion_id = pg.promotion_id) 
            WHERE pg.customer_group_id = '" . (int)$customer_group_id . "' 
            AND p.status = '1' 
            AND p.notification_title IS NOT NULL 
            AND p.notification_title != '' 
            ORDER BY p.promotion_id ASC LIMIT 1");

        if ($promo_query->num_rows) {
            $promo_info = $promo_query->row;
            $notification_title = $promo_info['notification_title'];
            $notification_body = $promo_info['notification_body'];
            $promotion_id = $promo_info['promotion_id'];
        }

        // 2. Fallback to Rule Actions if no promotion notification
        if (!$notification_title && $rule_id > 0) {
            $rule_query = $this->db->query("SELECT actions_json FROM `" . DB_PREFIX . "customer_segment_rule` WHERE rule_id = '" . (int)$rule_id . "'");
            if ($rule_query->num_rows && !empty($rule_query->row['actions_json'])) {
                $actions = json_decode(html_entity_decode($rule_query->row['actions_json'], ENT_QUOTES, 'UTF-8'), true);
                if (isset($actions['notification']) && !empty($actions['notification']['title'])) {
                    $notification_title = $actions['notification']['title'];
                    $notification_body = $actions['notification']['body'];
                }
            }
        }

        if ($notification_title) {
            // Resolve Placeholders
            $customer_query = $this->db->query("SELECT firstname, lastname FROM `" . DB_PREFIX . "customer` WHERE customer_id = '" . (int)$customer_id . "'");
            $fname = $customer_query->row ? $customer_query->row['firstname'] : '';
            $lname = $customer_query->row ? $customer_query->row['lastname'] : '';
            
            $find = array('{F_NAME}', '{L_NAME}');
            $replace = array($fname, $lname);

            $notification_title = str_replace($find, $replace, $notification_title);
            $notification_body = str_replace($find, $replace, $notification_body);

            // Send via Firebase
            $tokens_query = $this->db->query("SELECT token FROM `" . DB_PREFIX . "customer_segment_fcm_token` WHERE customer_id = '" . (int)$customer_id . "'");
            if ($tokens_query->num_rows) {
                $firebase_json = $this->config->get('module_customer_segment_firebase_json');
                if ($firebase_json) {
                    require_once(DIR_SYSTEM . 'library/customer_segment/firebase.php');
                    $firebase = new \CustomerSegment\Firebase($firebase_json, $this->registry);
					foreach ($tokens_query->rows as $token_row) {
						$firebase->sendToDevice($token_row['token'], $notification_title, $notification_body);
						
						$this->addLog('notification', $customer_id, array(
							'title' => $notification_title,
							'body'  => $notification_body,
							'promotion_id' => $promotion_id
						), $promotion_id);
					}
				}
			}
		}
	}

	public function addLog($type, $customer_id, $data = array(), $target_id = 0)
	{
		$sql = "INSERT INTO " . DB_PREFIX . "customer_segment_log SET 
			customer_id = '" . (int) $customer_id . "', 
			type = '" . $this->db->escape($type) . "', 
			target_id = '" . (int) $target_id . "', 
			data = '" . $this->db->escape(json_encode($data)) . "', ";

		if ($type == 'group_change') {
			$sql .= "old_group_id = '" . (int) (isset($data['old_group_id']) ? $data['old_group_id'] : 0) . "', 
				new_group_id = '" . (int) (isset($data['new_group_id']) ? $data['new_group_id'] : 0) . "', 
				rule_id = '" . (int) $target_id . "', ";
		}

		$sql .= "date_added = NOW()";

		$this->db->query($sql);
	}

    public function addFCMToken($customer_id, $token)
    {
        $this->db->query("DELETE FROM `" . DB_PREFIX . "customer_segment_fcm_token` WHERE token = '" . $this->db->escape($token) . "'");
        $this->db->query("INSERT INTO `" . DB_PREFIX . "customer_segment_fcm_token` SET customer_id = '" . (int) $customer_id . "', token = '" . $this->db->escape($token) . "', date_added = NOW()");
    }

    public function getSpecialItems()
    {
        $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_segment_special` ");
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

    public function getComboOffers($group_ids, $target_combo_id = 0)
    {
        $sql = "SELECT * FROM `" . DB_PREFIX . "customer_segment_combo` WHERE status = '1'";
        if ((int)$target_combo_id > 0) {
            $sql .= " AND combo_id = '" . (int)$target_combo_id . "'";
        }
        $sql .= " ORDER BY combo_id ASC";

        $query = $this->db->query($sql);

        $this->load->model('catalog/product');
        $this->load->model('tool/image');

        $offers = array();

        foreach ($query->rows as $row) {
            $allowed_groups = json_decode($row['customer_group_ids'], true);
            if (!is_array($allowed_groups)) {
                $allowed_groups = array();
            }

            if (empty(array_intersect($group_ids, $allowed_groups))) {
                continue;
            }

            $product_ids = array_values(array_unique(array_filter(array_map('intval', explode(',', (string)$row['product_ids'])))));
            if (!$product_ids) {
                continue;
            }

            $products = array();
            $raw_prices = array();
            $subtotal = 0.0;

            foreach ($product_ids as $product_id) {
                $product_info = $this->model_catalog_product->getProduct($product_id);
                if (!$product_info) {
                    continue;
                }

                if ($product_info['image']) {
                    $image = $this->model_tool_image->resize(
                        $product_info['image'],
                        $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'),
                        $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height')
                    );
                } else {
                    $image = $this->model_tool_image->resize(
                        'placeholder.png',
                        $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'),
                        $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height')
                    );
                }

                $base_price = (float)$product_info['price'];
                if ((float)$product_info['special']) {
                    $base_price = (float)$product_info['special'];
                }

                $raw_prices[] = $base_price;
                $subtotal += $base_price;

                $products[] = array(
                    'product_id' => $product_info['product_id'],
                    'name' => $product_info['name'],
                    'thumb' => $image,
                    'price' => $this->currency->format(
                        $this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')),
                        $this->session->data['currency']
                    ),
                    'raw_price' => $base_price,
                    'tax_class_id' => $product_info['tax_class_id'],
                    'special' => (float)$product_info['special'] ? $this->currency->format(
                        $this->tax->calculate($product_info['special'], $product_info['tax_class_id'], $this->config->get('config_tax')),
                        $this->session->data['currency']
                    ) : false,
                    'href' => $this->url->link('product/product', 'product_id=' . $product_info['product_id'])
                );
            }

            if (!$products) {
                continue;
            }

            $discount_type = isset($row['discount_type']) ? $row['discount_type'] : 'percent';
            $discount_value = (float)$row['discount_value'];
            $discount_mode = isset($row['discount_on']) ? $row['discount_on'] : 'bundle';
            $cheapest = $raw_prices ? min($raw_prices) : 0.0;
            $discount_base = ($discount_mode === 'cheapest') ? $cheapest : $subtotal;

            if ($discount_type === 'percent') {
                $discount_amount = ($discount_base * $discount_value) / 100;
            } else {
                $discount_amount = $discount_value;
            }

            if ($discount_mode === 'cheapest') {
                $discount_amount = min($discount_amount, $cheapest);
            } else {
                $discount_amount = min($discount_amount, $subtotal);
            }

            $bundle_total = max($subtotal - $discount_amount, 0);

            // Calculate per-product bundle prices
            $temp_cheapest = $cheapest;
            foreach ($products as &$p) {
                $p_discount = 0;
                if ($discount_mode === 'bundle') {
                    if ($discount_type === 'percent') {
                        $p_discount = ($p['raw_price'] * $discount_value) / 100;
                    } else {
                        // Distribute fixed discount proportionally
                        $p_discount = ($subtotal > 0) ? ($discount_amount * ($p['raw_price'] / $subtotal)) : 0;
                    }
                } elseif ($discount_mode === 'cheapest') {
                    if ($p['raw_price'] == $temp_cheapest) {
                        $p_discount = $discount_amount;
                        $temp_cheapest = -1; // Only apply to one cheapest item
                    }
                }
                
                $p_bundle_price = max($p['raw_price'] - $p_discount, 0);
                $p['bundle_price'] = $this->currency->format($this->tax->calculate($p_bundle_price, $p['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                $p['bundle_discount'] = $p_discount > 0 ? $this->currency->format($this->tax->calculate($p_discount, $p['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']) : false;
            }

            $offers[] = array(
                'combo_id' => $row['combo_id'],
                'name' => $row['name'],
                'discount_type' => $discount_type,
                'discount_value' => $discount_value,
                'discount_on' => $discount_mode,
                'products' => $products,
                'product_count' => count($products),
                'subtotal' => $this->currency->format($subtotal, $this->session->data['currency']),
                'discount_amount' => $this->currency->format($discount_amount, $this->session->data['currency']),
                'bundle_total' => $this->currency->format($bundle_total, $this->session->data['currency']),
                'discount_label' => ($discount_type === 'percent')
                    ? ('Save ' . (float)$discount_value . '%')
                    : ('Save ' . $this->currency->format($discount_value, $this->session->data['currency']))
            );
        }

        return $offers;
    }


    public function getProductDiscount($product_id, $customer_group_id)
    {
        $sql = "SELECT p.* FROM `" . DB_PREFIX . "customer_segment_promotion` p 
                JOIN `" . DB_PREFIX . "customer_segment_promotion_group` pg ON (p.promotion_id = pg.promotion_id) 
                WHERE pg.customer_group_id = '" . (int)$customer_group_id . "' 
                AND p.type IN ('cart_discount', 'manual_code') 
                AND p.status = '1'
                AND (p.date_start = '0000-00-00' OR p.date_start IS NULL OR p.date_start <= NOW())
                AND (p.date_end = '0000-00-00' OR p.date_end IS NULL OR p.date_end >= NOW())";
        
        $query = $this->db->query($sql);
        
        $best_discount = array('value' => 0, 'type' => 'percent');

        foreach ($query->rows as $promo) {
            // Manual Code check
            if ($promo['type'] == 'manual_code') {
                if (empty($this->session->data['coupon']) || $this->session->data['coupon'] != $promo['code']) {
                    continue;
                }
            }

            $applies = false;
            if ($promo['scope'] == 'all') {
                $applies = true;
            } elseif ($promo['scope'] == 'specific_products') {
                $promo_pids = explode(',', $promo['product_ids']);
                if (in_array($product_id, $promo_pids)) {
                    $applies = true;
                }
            } elseif ($promo['scope'] == 'specific_categories') {
                $promo_cids = explode(',', $promo['category_ids']);
                $product_categories = $this->db->query("SELECT category_id FROM " . DB_PREFIX . "product_to_category WHERE product_id = '" . (int)$product_id . "'")->rows;
                foreach ($product_categories as $pc) {
                    if (in_array($pc['category_id'], $promo_cids)) {
                        $applies = true;
                        break;
                    }
                }
            }

            if ($applies) {
                if ($promo['discount_value'] > $best_discount['value']) {
                    $best_discount = array(
                        'value' => (float)$promo['discount_value'],
                        'type'  => $promo['discount_type']
                    );
                }
            }
        }

        return $best_discount;
    }

    public function getBestCartDiscount($group_ids, $cart_products)
    {
        if (empty($group_ids)) return array('value' => 0, 'type' => 'percent', 'title' => '');

        // 1. Fetch all active promotions for these groups
        $sql = "SELECT p.* FROM `" . DB_PREFIX . "customer_segment_promotion` p 
                JOIN `" . DB_PREFIX . "customer_segment_promotion_group` pg ON (p.promotion_id = pg.promotion_id) 
                WHERE pg.customer_group_id IN (" . implode(',', array_map('intval', $group_ids)) . ") 
                AND p.type IN ('cart_discount', 'manual_code') 
                AND p.status = '1'
                AND (p.date_start = '0000-00-00' OR p.date_start IS NULL OR p.date_start <= NOW())
                AND (p.date_end = '0000-00-00' OR p.date_end IS NULL OR p.date_end >= NOW())";
                
        $query = $this->db->query($sql);

        $best_discount = array('value' => 0, 'type' => 'percent', 'title' => '');

        foreach ($query->rows as $promo) {
            // Manual Code check
            if ($promo['type'] == 'manual_code') {
                if (empty($this->session->data['coupon']) || $this->session->data['coupon'] != $promo['code']) {
                    continue;
                }
            }

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

