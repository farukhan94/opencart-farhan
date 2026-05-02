<?php
class ModelExtensionModuleCustomerSegment extends Model
{
	public function install()
	{
		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "customer_segment_rule` (
		  `rule_id`              INT(11)       NOT NULL AUTO_INCREMENT,
		  `name`                 VARCHAR(128)  NOT NULL,
		  `target_group_id`      INT(11)       NOT NULL,
		  `priority`             INT(3)        NOT NULL DEFAULT 0,
		  `conditions_json`      TEXT          DEFAULT NULL,
		  `actions_json`         TEXT          DEFAULT NULL,
		  `status`               TINYINT(1)    NOT NULL DEFAULT 1,
		  `date_added`           DATETIME      NOT NULL,
		  `date_modified`        DATETIME      NOT NULL,
		  PRIMARY KEY (`rule_id`),
		  KEY `idx_status` (`status`),
		  KEY `idx_target_group` (`target_group_id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "customer_segment_fcm_token` (
		  `fcm_token_id` INT(11) NOT NULL AUTO_INCREMENT,
		  `customer_id`  INT(11) NOT NULL,
		  `token`        TEXT NOT NULL,
		  `device_type`  VARCHAR(20) DEFAULT NULL,
		  `date_added`   DATETIME NOT NULL,
		  PRIMARY KEY (`fcm_token_id`),
		  KEY `customer_id` (`customer_id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "customer_segment_log` (
		  `log_id`       INT(11) NOT NULL AUTO_INCREMENT,
		  `customer_id`  INT(11) NOT NULL,
		  `type`         VARCHAR(50) NOT NULL DEFAULT 'group_change',
		  `target_id`    INT(11) DEFAULT NULL,
		  `old_group_id` INT(11) DEFAULT NULL,
		  `new_group_id` INT(11) DEFAULT NULL,
		  `rule_id`      INT(11) DEFAULT NULL,
		  `data`         TEXT,
		  `comment`      TEXT,
		  `date_added`   DATETIME NOT NULL,
		  PRIMARY KEY (`log_id`),
		  KEY `customer_id` (`customer_id`),
		  KEY `type` (`type`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "customer_segment_manual` (
		  `customer_id` INT(11) NOT NULL,
		  `group_id`    INT(11) NOT NULL,
		  `is_locked`   TINYINT(1) NOT NULL DEFAULT 1,
		  `date_added`  DATETIME NOT NULL,
		  PRIMARY KEY (`customer_id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;");

		// BANNERS
		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "customer_segment_banner` (
		  `banner_id` INT(11) NOT NULL AUTO_INCREMENT,
		  `title`     VARCHAR(255) NOT NULL,
		  `image`     VARCHAR(255) NOT NULL,
		  `link`      VARCHAR(255) DEFAULT NULL,
		  `status`    TINYINT(1) NOT NULL DEFAULT 1,
		  PRIMARY KEY (`banner_id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "customer_segment_banner_group` (
		  `banner_id`         INT(11) NOT NULL,
		  `customer_group_id` INT(11) NOT NULL,
		  PRIMARY KEY (`banner_id`, `customer_group_id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;");

		// SLIDERS
		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "customer_segment_slider` (
		  `slider_id`   INT(11) NOT NULL AUTO_INCREMENT,
		  `name`        VARCHAR(255) NOT NULL,
		  `product_ids` TEXT DEFAULT NULL,
		  `status`      TINYINT(1) NOT NULL DEFAULT 1,
		  PRIMARY KEY (`slider_id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "customer_segment_slider_group` (
		  `slider_id`         INT(11) NOT NULL,
		  `customer_group_id` INT(11) NOT NULL,
		  PRIMARY KEY (`slider_id`, `customer_group_id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;");

		// PROMOTIONS
		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "customer_segment_promotion` (
		  `promotion_id`    INT(11) NOT NULL AUTO_INCREMENT,
		  `title`           VARCHAR(255) NOT NULL,
		  `description`     TEXT DEFAULT NULL,
		  `type`            VARCHAR(20) NOT NULL DEFAULT 'coupon',
		  `visual_type`     VARCHAR(50) NOT NULL DEFAULT 'none',
		  `discount_type`   VARCHAR(10) DEFAULT 'percent',
		  `discount_value`  DECIMAL(15,4) DEFAULT 0.0000,
		  `scope`           VARCHAR(25) DEFAULT 'all',
		  `product_ids`     TEXT DEFAULT NULL,
		  `category_ids`    TEXT DEFAULT NULL,
		  `code`            VARCHAR(50) DEFAULT NULL,
		  `date_start`      DATE DEFAULT NULL,
		  `date_end`        DATE DEFAULT NULL,
		  `uses_total`      INT(11) DEFAULT 0,
		  `uses_customer`   INT(11) DEFAULT 1,
		  `status`          TINYINT(1) NOT NULL DEFAULT 1,
		  PRIMARY KEY (`promotion_id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "customer_segment_promotion_group` (
		  `promotion_id`      INT(11) NOT NULL,
		  `customer_group_id` INT(11) NOT NULL,
		  PRIMARY KEY (`promotion_id`, `customer_group_id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;");

		// SECRET ITEMS
		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "customer_segment_special` (
		  `id`                 INT(11) NOT NULL AUTO_INCREMENT,
		  `item_type`          VARCHAR(10) NOT NULL,
		  `item_id`            INT(11) NOT NULL,
		  `customer_group_ids` TEXT NOT NULL,
		  PRIMARY KEY (`id`),
		  UNIQUE KEY `item` (`item_type`, `item_id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;");

		// EXCLUSIVE COMBOS
		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "customer_segment_combo` (
		  `combo_id`           INT(11) NOT NULL AUTO_INCREMENT,
		  `name`               VARCHAR(255) NOT NULL,
		  `product_ids`        TEXT NOT NULL,
		  `discount_type`      VARCHAR(10) DEFAULT 'percent',
		  `discount_value`     DECIMAL(15,4) DEFAULT 0.0000,
		  `discount_on`        VARCHAR(10) DEFAULT 'bundle',
		  `customer_group_ids` TEXT NOT NULL,
		  `date_start`         DATE DEFAULT NULL,
		  `date_end`           DATE DEFAULT NULL,
		  `status`             TINYINT(1) NOT NULL DEFAULT 1,
		  PRIMARY KEY (`combo_id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;");

		// Migration: Move existing customer_group_id to junction tables
		$tables_to_migrate = array(
			'banner'    => 'banner_id',
			'slider'    => 'slider_id',
			'promotion' => 'promotion_id'
		);

		foreach ($tables_to_migrate as $tbl => $pk) {
			$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "customer_segment_" . $tbl . "` LIKE 'customer_group_id'");
			if ($query->num_rows) {
				$this->db->query("INSERT IGNORE INTO `" . DB_PREFIX . "customer_segment_" . $tbl . "_group` (" . $pk . ", customer_group_id) SELECT " . $pk . ", customer_group_id FROM `" . DB_PREFIX . "customer_segment_" . $tbl . "`");
				$this->db->query("ALTER TABLE `" . DB_PREFIX . "customer_segment_" . $tbl . "` DROP COLUMN `customer_group_id`;");
			}
		}

		// Ensure columns exist for advanced promotions
		$promo_columns = array(
			'type'           => "VARCHAR(20) NOT NULL DEFAULT 'coupon'",
			'discount_type'  => "VARCHAR(10) DEFAULT 'percent'",
			'discount_value' => "DECIMAL(15,4) DEFAULT 0.0000",
			'scope'          => "VARCHAR(25) DEFAULT 'all'",
			'product_ids'    => "TEXT DEFAULT NULL",
			'category_ids'   => "TEXT DEFAULT NULL",
			'date_start'     => "DATE DEFAULT NULL",
			'date_end'       => "DATE DEFAULT NULL",
			'banner_data'    => "TEXT DEFAULT NULL",
			'visual_type'    => "VARCHAR(50) NOT NULL DEFAULT 'none'"
		);

		foreach ($promo_columns as $col => $def) {
			$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "customer_segment_promotion` LIKE '" . $col . "'");
			if (!$query->num_rows) {
				$this->db->query("ALTER TABLE `" . DB_PREFIX . "customer_segment_promotion` ADD COLUMN `" . $col . "` " . $def . ";");
			}
		}

		$promo_notif_columns = array(
			'notification_title' => "VARCHAR(255) DEFAULT NULL",
			'notification_body'  => "TEXT DEFAULT NULL"
		);

		foreach ($promo_notif_columns as $col => $def) {
			$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "customer_segment_promotion` LIKE '" . $col . "'");
			if (!$query->num_rows) {
				$this->db->query("ALTER TABLE `" . DB_PREFIX . "customer_segment_promotion` ADD COLUMN `" . $col . "` " . $def . ";");
			}
		}

		// Legacy Cleanup: Remove coupon-generation columns and tables
		$legacy_columns = array('coupon_prefix', 'coupon_basis_id', 'uses_total', 'uses_customer');
		foreach ($legacy_columns as $col) {
			$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "customer_segment_promotion` LIKE '" . $col . "'");
			if ($query->num_rows) {
				$this->db->query("ALTER TABLE `" . DB_PREFIX . "customer_segment_promotion` DROP COLUMN `" . $col . "`");
			}
		}
		
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "customer_segment_coupon_generated` ");



		// Ensure columns exist for logs (migration)
		$log_columns = array(
			'type'      => "VARCHAR(50) NOT NULL DEFAULT 'group_change'",
			'target_id' => "INT(11) DEFAULT NULL",
			'data'      => "TEXT"
		);

		foreach ($log_columns as $col => $def) {
			$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "customer_segment_log` LIKE '" . $col . "'");
			if (!$query->num_rows) {
				$this->db->query("ALTER TABLE `" . DB_PREFIX . "customer_segment_log` ADD COLUMN `" . $col . "` " . $def . ";");
			}
		}

		// Ensure columns exist for customer table
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "customer` LIKE 'date_of_birth'");
		if (!$query->num_rows) {
			$this->db->query("ALTER TABLE `" . DB_PREFIX . "customer` ADD COLUMN `date_of_birth` DATE DEFAULT NULL AFTER `fax`;");
		}

		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "customer` LIKE 'gender'");
		if (!$query->num_rows) {
			$this->db->query("ALTER TABLE `" . DB_PREFIX . "customer` ADD COLUMN `gender` VARCHAR(10) DEFAULT NULL AFTER `date_of_birth`;");
		}

		// Register Events
		$this->load->model('setting/event');
		$this->model_setting_event->deleteEventByCode('module_customer_segment');
		
		// Assignment Event
		$this->model_setting_event->addEvent('module_customer_segment', 'catalog/model/checkout/order/addOrderHistory/after', 'extension/module/customer_segment/eventOrderComplete');
		
		// Display/Discount Events
		$this->model_setting_event->addEvent('module_customer_segment', 'catalog/controller/common/footer/after', 'extension/module/customer_segment/eventFooterAfter');
		
		// Secret Content Enforcement Events
		$this->model_setting_event->addEvent('module_customer_segment', 'catalog/model/catalog/product/getProduct/after', 'extension/module/customer_segment/eventCheckProduct');
		$this->model_setting_event->addEvent('module_customer_segment', 'catalog/model/catalog/product/getProducts/after', 'extension/module/customer_segment/eventCheckProduct');
		$this->model_setting_event->addEvent('module_customer_segment', 'catalog/model/catalog/category/getCategory/after', 'extension/module/customer_segment/eventCheckCategory');
		$this->model_setting_event->addEvent('module_customer_segment', 'catalog/model/catalog/category/getCategories/after', 'extension/module/customer_segment/eventCheckCategory');

		// Enable the Order Total extension by default
		$this->db->query("DELETE FROM `" . DB_PREFIX . "setting` WHERE `key` = 'total_customer_segment_discount_status'");
		$this->db->query("INSERT INTO `" . DB_PREFIX . "setting` SET `code` = 'total_customer_segment_discount', `key` = 'total_customer_segment_discount_status', `value` = '1', `serialized` = '0', `store_id` = '0'");
		
		$this->db->query("DELETE FROM `" . DB_PREFIX . "setting` WHERE `key` = 'total_customer_segment_discount_sort_order'");
		$this->db->query("INSERT INTO `" . DB_PREFIX . "setting` SET `code` = 'total_customer_segment_discount', `key` = 'total_customer_segment_discount_sort_order', `value` = '4', `serialized` = '0', `store_id` = '0'");
	}

	public function uninstall()
	{
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "customer_segment_rule`;");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "customer_segment_fcm_token`;");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "customer_segment_log`;");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "customer_segment_manual`;");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "customer_segment_banner`;");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "customer_segment_banner_group`;");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "customer_segment_slider`;");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "customer_segment_slider_group`;");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "customer_segment_promotion`;");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "customer_segment_promotion_group`;");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "customer_segment_coupon_generated`;");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "customer_segment_special`;");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "customer_segment_combo`;");

		$this->load->model('setting/event');
		$this->model_setting_event->deleteEventByCode('module_customer_segment');
	}


	public function addRule($data)
	{
		$this->db->query("INSERT INTO `" . DB_PREFIX . "customer_segment_rule` SET 
			name = '" . $this->db->escape($data['name']) . "', 
			target_group_id = '" . (int) $data['target_group_id'] . "', 
			priority = '" . (int) $data['priority'] . "',
			conditions_json = '" . $this->db->escape(isset($data['conditions_json']) ? html_entity_decode($data['conditions_json'], ENT_QUOTES, 'UTF-8') : '[]') . "',
			actions_json = '" . $this->db->escape(isset($data['actions_json']) ? html_entity_decode($data['actions_json'], ENT_QUOTES, 'UTF-8') : '{}') . "',
			status = '" . (int) (isset($data['status']) ? $data['status'] : 0) . "', 
			date_added = NOW(), 
			date_modified = NOW()");

		return $this->db->getLastId();
	}

	public function editRule($rule_id, $data)
	{
		$this->db->query("UPDATE `" . DB_PREFIX . "customer_segment_rule` SET 
			name = '" . $this->db->escape($data['name']) . "', 
			target_group_id = '" . (int) $data['target_group_id'] . "', 
			priority = '" . (int) $data['priority'] . "',
			conditions_json = '" . $this->db->escape(isset($data['conditions_json']) ? html_entity_decode($data['conditions_json'], ENT_QUOTES, 'UTF-8') : '[]') . "',
			actions_json = '" . $this->db->escape(isset($data['actions_json']) ? html_entity_decode($data['actions_json'], ENT_QUOTES, 'UTF-8') : '{}') . "',
			status = '" . (int) (isset($data['status']) ? $data['status'] : 0) . "', 
			date_modified = NOW() 
			WHERE rule_id = '" . (int) $rule_id . "'");
	}

	public function deleteRule($rule_id)
	{
		$this->db->query("DELETE FROM `" . DB_PREFIX . "customer_segment_rule` WHERE rule_id = '" . (int) $rule_id . "'");
	}

	public function getRule($rule_id)
	{
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_segment_rule` WHERE rule_id = '" . (int) $rule_id . "'");
		return $query->row;
	}

	public function getRules($data = array())
	{
		$sql = "SELECT * FROM `" . DB_PREFIX . "customer_segment_rule`";

		$sql .= " ORDER BY priority DESC, name ASC";

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0)
				$data['start'] = 0;
			if ($data['limit'] < 1)
				$data['limit'] = 20;
			$sql .= " LIMIT " . (int) $data['start'] . "," . (int) $data['limit'];
		}

		$query = $this->db->query($sql);
		return $query->rows;
	}

	public function getTotalRules()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total FROM `" . DB_PREFIX . "customer_segment_rule` ");
		return $query->row['total'];
	}

	public function evaluateRulesForCustomer($customer_id)
	{
		require_once(DIR_SYSTEM . 'library/customer_segment/segmentation.php');
		$segmentation = new \CustomerSegment\Segmentation($this->registry);
		$eval_result = $segmentation->evaluate($customer_id);

		$new_group_id = $eval_result['group_id'];
		$rule_id = $eval_result['rule_id'];

		$this->reassignCustomerGroup($customer_id, $new_group_id, $rule_id);

		return $new_group_id;
	}

	public function reassignCustomerGroup($customer_id, $customer_group_id, $rule_id = 0)
	{
		// Get old group for logging
		$query = $this->db->query("SELECT customer_group_id FROM " . DB_PREFIX . "customer WHERE customer_id = '" . (int) $customer_id . "'");
		$old_group_id = $query->row ? $query->row['customer_group_id'] : 0;

		if ($old_group_id != $customer_group_id) {
			$this->db->query("UPDATE " . DB_PREFIX . "customer SET customer_group_id = '" . (int) $customer_group_id . "' WHERE customer_id = '" . (int) $customer_id . "'");

			$this->addLog('group_change', $customer_id, array(
				'old_group_id' => $old_group_id,
				'new_group_id' => $customer_group_id
			), $rule_id);

			// Check Rule Actions
			if ($rule_id > 0) {
				$this->sendReassignmentNotification($customer_id, $customer_group_id, $rule_id);
			}

			return true;
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



	public function addManual($customer_id, $customer_group_id)
	{
		$this->db->query("DELETE FROM " . DB_PREFIX . "customer_segment_manual WHERE customer_id = '" . (int) $customer_id . "'");
		$this->db->query("INSERT INTO " . DB_PREFIX . "customer_segment_manual SET customer_id = '" . (int) $customer_id . "', group_id = '" . (int) $customer_group_id . "', date_added = NOW()");

		$this->addLog('manual_assignment', $customer_id, array(
			'group_id' => $customer_group_id
		));
	}

	public function deleteManual($customer_id)
	{
		$this->db->query("DELETE FROM " . DB_PREFIX . "customer_segment_manual WHERE customer_id = '" . (int) $customer_id . "'");
	}

	public function getManuals()
	{
		$query = $this->db->query("SELECT m.*, c.firstname, c.lastname, cg.name AS customer_group FROM " . DB_PREFIX . "customer_segment_manual m LEFT JOIN " . DB_PREFIX . "customer c ON (m.customer_id = c.customer_id) LEFT JOIN " . DB_PREFIX . "customer_group_description cg ON (m.group_id = cg.customer_group_id) WHERE cg.language_id = '" . (int) $this->config->get('config_language_id') . "' ORDER BY m.date_added DESC");
		return $query->rows;
	}

	public function getLogs($data = array())
	{
		$sql = "SELECT l.*, c.firstname, c.lastname, cg1.name AS old_group, cg2.name AS new_group ";
		$sql .= "FROM " . DB_PREFIX . "customer_segment_log l ";
		$sql .= "LEFT JOIN " . DB_PREFIX . "customer c ON (l.customer_id = c.customer_id) ";
		$sql .= "LEFT JOIN " . DB_PREFIX . "customer_group_description cg1 ON (l.old_group_id = cg1.customer_group_id AND cg1.language_id = '" . (int) $this->config->get('config_language_id') . "') ";
		$sql .= "LEFT JOIN " . DB_PREFIX . "customer_group_description cg2 ON (l.new_group_id = cg2.customer_group_id AND cg2.language_id = '" . (int) $this->config->get('config_language_id') . "') ";

		$implode = array();

		if (!empty($data['filter_customer_id'])) {
			if (is_numeric($data['filter_customer_id'])) {
				$implode[] = "l.customer_id = '" . (int) $data['filter_customer_id'] . "'";
			} else {
				$implode[] = "(c.firstname LIKE '%" . $this->db->escape($data['filter_customer_id']) . "%' OR c.lastname LIKE '%" . $this->db->escape($data['filter_customer_id']) . "%')";
			}
		}

		if (!empty($data['filter_new_group_id'])) {
			$implode[] = "l.new_group_id = '" . (int) $data['filter_new_group_id'] . "'";
		}

		if (!empty($data['filter_type'])) {
			$implode[] = "l.type = '" . $this->db->escape($data['filter_type']) . "'";
		}

		if ($implode) {
			$sql .= " WHERE " . implode(" AND ", $implode);
		}

		$sql .= " ORDER BY l.date_added DESC";

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}
			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}
			$sql .= " LIMIT " . (int) $data['start'] . "," . (int) $data['limit'];
		}

		$query = $this->db->query($sql);
		return $query->rows;
	}

	public function getTotalLogs($data = array())
	{
		$sql = "SELECT COUNT(*) AS total FROM " . DB_PREFIX . "customer_segment_log l";

		$implode = array();

		if (!empty($data['filter_customer_id'])) {
			if (is_numeric($data['filter_customer_id'])) {
				$implode[] = "l.customer_id = '" . (int) $data['filter_customer_id'] . "'";
			} else {
				$sql .= " LEFT JOIN " . DB_PREFIX . "customer c ON (l.customer_id = c.customer_id)";
				$implode[] = "(c.firstname LIKE '%" . $this->db->escape($data['filter_customer_id']) . "%' OR c.lastname LIKE '%" . $this->db->escape($data['filter_customer_id']) . "%')";
			}
		}

		if (!empty($data['filter_new_group_id'])) {
			$implode[] = "l.new_group_id = '" . (int) $data['filter_new_group_id'] . "'";
		}

		if (!empty($data['filter_type'])) {
			$implode[] = "l.type = '" . $this->db->escape($data['filter_type']) . "'";
		}

		if ($implode) {
			$sql .= " WHERE " . implode(" AND ", $implode);
		}

		$query = $this->db->query($sql);
		return $query->row['total'];
	}

	// ----------------------------------------------------------------
	// BANNERS
	// ----------------------------------------------------------------
	public function getBanners($customer_group_id = 0)
	{
		$sql = "SELECT b.* FROM `" . DB_PREFIX . "customer_segment_banner` b";
		if ($customer_group_id) {
			$sql .= " JOIN `" . DB_PREFIX . "customer_segment_banner_group` bg ON (b.banner_id = bg.banner_id) WHERE bg.customer_group_id = '" . (int) $customer_group_id . "'";
		}
		$sql .= " ORDER BY b.banner_id ASC";
		$query = $this->db->query($sql);

		$results = array();
		$this->load->model('customer/customer_group');

		foreach ($query->rows as $row) {
			$groups = array();
			$group_query = $this->db->query("SELECT customer_group_id FROM `" . DB_PREFIX . "customer_segment_banner_group` WHERE banner_id = '" . (int)$row['banner_id'] . "'");
			foreach ($group_query->rows as $g) {
				$group_info = $this->model_customer_customer_group->getCustomerGroup($g['customer_group_id']);
				if ($group_info) {
					$groups[$g['customer_group_id']] = $group_info['name'];
				}
			}
			$row['group_ids'] = $groups;
			
			// Add thumb
			$this->load->model('tool/image');
			if ($row['image'] && is_file(DIR_IMAGE . $row['image'])) {
				$row['thumb'] = $this->model_tool_image->resize($row['image'], 100, 100);
			} else {
				$row['thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
			}

			$results[] = $row;
		}
		return $results;
	}

	public function getBanner($banner_id)
	{
		$query = $this->db->query("SELECT b.*, GROUP_CONCAT(bg.customer_group_id) as group_ids FROM `" . DB_PREFIX . "customer_segment_banner` b LEFT JOIN `" . DB_PREFIX . "customer_segment_banner_group` bg ON (b.banner_id = bg.banner_id) WHERE b.banner_id = '" . (int) $banner_id . "' GROUP BY b.banner_id");
		return $query->row;
	}

	public function addBanner($data)
	{
		$this->db->query("INSERT INTO `" . DB_PREFIX . "customer_segment_banner` SET
			title   = '" . $this->db->escape($data['title']) . "',
			image   = '" . $this->db->escape($data['image']) . "',
			link    = '" . $this->db->escape(isset($data['link']) ? $data['link'] : '') . "',
			status  = '" . (int) (isset($data['status']) ? $data['status'] : 1) . "'");
		$banner_id = $this->db->getLastId();

		if (isset($data['group_ids']) && is_array($data['group_ids'])) {
			foreach ($data['group_ids'] as $group_id) {
				$this->db->query("INSERT INTO `" . DB_PREFIX . "customer_segment_banner_group` SET banner_id = '" . (int)$banner_id . "', customer_group_id = '" . (int)$group_id . "'");
			}
		}

		return $banner_id;
	}

	public function editBanner($banner_id, $data)
	{
		$this->db->query("UPDATE `" . DB_PREFIX . "customer_segment_banner` SET
			title   = '" . $this->db->escape($data['title']) . "',
			image   = '" . $this->db->escape($data['image']) . "',
			link    = '" . $this->db->escape(isset($data['link']) ? $data['link'] : '') . "',
			status  = '" . (int) (isset($data['status']) ? $data['status'] : 1) . "'
			WHERE banner_id = '" . (int) $banner_id . "'");

		$this->db->query("DELETE FROM `" . DB_PREFIX . "customer_segment_banner_group` WHERE banner_id = '" . (int)$banner_id . "'");

		if (isset($data['group_ids']) && is_array($data['group_ids'])) {
			foreach ($data['group_ids'] as $group_id) {
				$this->db->query("INSERT INTO `" . DB_PREFIX . "customer_segment_banner_group` SET banner_id = '" . (int)$banner_id . "', customer_group_id = '" . (int)$group_id . "'");
			}
		}
	}

	public function deleteBanner($banner_id)
	{
		$this->db->query("DELETE FROM `" . DB_PREFIX . "customer_segment_banner` WHERE banner_id = '" . (int) $banner_id . "'");
	}

	// ----------------------------------------------------------------
	// SLIDERS
	// ----------------------------------------------------------------
	public function getSliders($customer_group_id = 0)
	{
		$sql = "SELECT s.* FROM `" . DB_PREFIX . "customer_segment_slider` s";
		if ($customer_group_id) {
			$sql .= " JOIN `" . DB_PREFIX . "customer_segment_slider_group` sg ON (s.slider_id = sg.slider_id) WHERE sg.customer_group_id = '" . (int) $customer_group_id . "'";
		}
		$sql .= " ORDER BY s.slider_id ASC";
		$query = $this->db->query($sql);

		$results = array();
		$this->load->model('customer/customer_group');

		foreach ($query->rows as $row) {
			$groups = array();
			$group_query = $this->db->query("SELECT customer_group_id FROM `" . DB_PREFIX . "customer_segment_slider_group` WHERE slider_id = '" . (int)$row['slider_id'] . "'");
			foreach ($group_query->rows as $g) {
				$group_info = $this->model_customer_customer_group->getCustomerGroup($g['customer_group_id']);
				if ($group_info) {
					$groups[$g['customer_group_id']] = $group_info['name'];
				}
			}
			$row['group_ids'] = $groups;
			$results[] = $row;
		}
		return $results;
	}

	public function getSlider($slider_id)
	{
		$query = $this->db->query("SELECT s.*, GROUP_CONCAT(sg.customer_group_id) as group_ids FROM `" . DB_PREFIX . "customer_segment_slider` s LEFT JOIN `" . DB_PREFIX . "customer_segment_slider_group` sg ON (s.slider_id = sg.slider_id) WHERE s.slider_id = '" . (int) $slider_id . "' GROUP BY s.slider_id");
		return $query->row;
	}

	public function addSlider($data)
	{
		$this->db->query("INSERT INTO `" . DB_PREFIX . "customer_segment_slider` SET
			name              = '" . $this->db->escape($data['name']) . "',
			product_ids       = '" . $this->db->escape(isset($data['product_ids']) ? $data['product_ids'] : '') . "',
			banner_data       = '" . $this->db->escape(isset($data['banner_data']) ? json_encode($data['banner_data']) : '') . "',
			status            = '" . (int) (isset($data['status']) ? $data['status'] : 1) . "'");
		$slider_id = $this->db->getLastId();

		if (isset($data['group_ids']) && is_array($data['group_ids'])) {
			foreach ($data['group_ids'] as $group_id) {
				$this->db->query("INSERT INTO `" . DB_PREFIX . "customer_segment_slider_group` SET slider_id = '" . (int)$slider_id . "', customer_group_id = '" . (int)$group_id . "'");
			}
		}

		return $slider_id;
	}

	public function editSlider($slider_id, $data)
	{
		$this->db->query("UPDATE `" . DB_PREFIX . "customer_segment_slider` SET
			name              = '" . $this->db->escape($data['name']) . "',
			product_ids       = '" . $this->db->escape(isset($data['product_ids']) ? $data['product_ids'] : '') . "',
			status            = '" . (int) (isset($data['status']) ? $data['status'] : 1) . "'
			WHERE slider_id = '" . (int) $slider_id . "'");

		$this->db->query("DELETE FROM `" . DB_PREFIX . "customer_segment_slider_group` WHERE slider_id = '" . (int)$slider_id . "'");

		if (isset($data['group_ids']) && is_array($data['group_ids'])) {
			foreach ($data['group_ids'] as $group_id) {
				$this->db->query("INSERT INTO `" . DB_PREFIX . "customer_segment_slider_group` SET slider_id = '" . (int)$slider_id . "', customer_group_id = '" . (int)$group_id . "'");
			}
		}
	}

	public function deleteSlider($slider_id)
	{
		$this->db->query("DELETE FROM `" . DB_PREFIX . "customer_segment_slider` WHERE slider_id = '" . (int) $slider_id . "'");
	}

	// ----------------------------------------------------------------
	// PROMOTIONS
	// ----------------------------------------------------------------
	public function getPromotions($customer_group_id = 0)
	{
		$sql = "SELECT p.* FROM `" . DB_PREFIX . "customer_segment_promotion` p";
		if ($customer_group_id) {
			$sql .= " JOIN `" . DB_PREFIX . "customer_segment_promotion_group` pg ON (p.promotion_id = pg.promotion_id) WHERE pg.customer_group_id = '" . (int) $customer_group_id . "'";
		}
		$sql .= " ORDER BY p.promotion_id ASC";
		$query = $this->db->query($sql);
		
		$results = array();
		$this->load->model('customer/customer_group');

		foreach ($query->rows as $row) {
			$groups = array();
			$group_query = $this->db->query("SELECT customer_group_id FROM `" . DB_PREFIX . "customer_segment_promotion_group` WHERE promotion_id = '" . (int)$row['promotion_id'] . "'");
			foreach ($group_query->rows as $g) {
				$group_info = $this->model_customer_customer_group->getCustomerGroup($g['customer_group_id']);
				if ($group_info) {
					$groups[$g['customer_group_id']] = $group_info['name'];
				}
			}
			$row['group_ids'] = $groups;
			$results[] = $row;
		}
		return $results;
	}

	public function getPromotion($promotion_id)
	{
		$query = $this->db->query("SELECT p.* FROM `" . DB_PREFIX . "customer_segment_promotion` p WHERE p.promotion_id = '" . (int) $promotion_id . "'");
		
		if ($query->num_rows) {
			$row = $query->row;
			$groups = array();
			$this->load->model('customer/customer_group');
			$group_query = $this->db->query("SELECT customer_group_id FROM `" . DB_PREFIX . "customer_segment_promotion_group` WHERE promotion_id = '" . (int)$promotion_id . "'");
			foreach ($group_query->rows as $g) {
				$group_info = $this->model_customer_customer_group->getCustomerGroup($g['customer_group_id']);
				if ($group_info) {
					$groups[$g['customer_group_id']] = $group_info['name'];
				}
			}
			$row['group_ids'] = $groups;

			// Handle banner_data thumbs
			if ($row['banner_data']) {
				$this->load->model('tool/image');
				$bdata = json_decode($row['banner_data'], true);
				if (is_array($bdata)) {
					foreach ($bdata as &$bitem) {
						if (isset($bitem['image']) && is_file(DIR_IMAGE . $bitem['image'])) {
							$bitem['thumb'] = $this->model_tool_image->resize($bitem['image'], 100, 100);
						} else {
							$bitem['thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
						}
					}
					$row['banner_data'] = json_encode($bdata);
				}
			}

			return $row;
		}
		return array();
	}

	public function addPromotion($data)
	{
		$this->db->query("INSERT INTO `" . DB_PREFIX . "customer_segment_promotion` SET
			title             = '" . $this->db->escape($data['title']) . "',
			description       = '" . $this->db->escape($data['description']) . "',
			type              = '" . $this->db->escape($data['type']) . "',
			visual_type       = '" . $this->db->escape(isset($data['visual_type']) ? $data['visual_type'] : 'none') . "',
			discount_type     = '" . $this->db->escape($data['discount_type']) . "',
			discount_value    = '" . (float)$data['discount_value'] . "',
			scope             = '" . $this->db->escape($data['scope']) . "',
			product_ids       = '" . $this->db->escape(isset($data['product_ids']) ? $data['product_ids'] : '') . "',
			category_ids      = '" . $this->db->escape(isset($data['category_ids']) ? $data['category_ids'] : '') . "',
			code              = '" . $this->db->escape(isset($data['code']) ? $data['code'] : '') . "',
			date_start        = '" . $this->db->escape(isset($data['date_start']) ? $data['date_start'] : '') . "',
			date_end          = '" . $this->db->escape(isset($data['date_end']) ? $data['date_end'] : '') . "',
			banner_data       = '" . $this->db->escape(isset($data['banner_data']) ? json_encode($data['banner_data']) : '') . "',
			notification_title = '" . $this->db->escape(isset($data['notification_title']) ? $data['notification_title'] : '') . "',
			notification_body  = '" . $this->db->escape(isset($data['notification_body']) ? $data['notification_body'] : '') . "',
			status            = '" . (int) (isset($data['status']) ? $data['status'] : 1) . "'");
		$promotion_id = $this->db->getLastId();

		if (isset($data['group_ids']) && is_array($data['group_ids'])) {
			foreach ($data['group_ids'] as $group_id) {
				$this->db->query("INSERT INTO `" . DB_PREFIX . "customer_segment_promotion_group` SET promotion_id = '" . (int)$promotion_id . "', customer_group_id = '" . (int)$group_id . "'");
			}
		}

		return $promotion_id;
	}

	public function editPromotion($promotion_id, $data)
	{
		$this->db->query("UPDATE `" . DB_PREFIX . "customer_segment_promotion` SET
			title             = '" . $this->db->escape($data['title']) . "',
			description       = '" . $this->db->escape($data['description']) . "',
			type              = '" . $this->db->escape($data['type']) . "',
			visual_type       = '" . $this->db->escape(isset($data['visual_type']) ? $data['visual_type'] : 'none') . "',
			discount_type     = '" . $this->db->escape($data['discount_type']) . "',
			discount_value    = '" . (float)$data['discount_value'] . "',
			scope             = '" . $this->db->escape($data['scope']) . "',
			product_ids       = '" . $this->db->escape(isset($data['product_ids']) ? $data['product_ids'] : '') . "',
			category_ids      = '" . $this->db->escape(isset($data['category_ids']) ? $data['category_ids'] : '') . "',
			code              = '" . $this->db->escape(isset($data['code']) ? $data['code'] : '') . "',
			date_start        = '" . $this->db->escape(isset($data['date_start']) ? $data['date_start'] : '') . "',
			date_end          = '" . $this->db->escape(isset($data['date_end']) ? $data['date_end'] : '') . "',
			banner_data       = '" . $this->db->escape(isset($data['banner_data']) ? json_encode($data['banner_data']) : '') . "',
			notification_title = '" . $this->db->escape(isset($data['notification_title']) ? $data['notification_title'] : '') . "',
			notification_body  = '" . $this->db->escape(isset($data['notification_body']) ? $data['notification_body'] : '') . "',
			status            = '" . (int) (isset($data['status']) ? $data['status'] : 1) . "'
			WHERE promotion_id = '" . (int) $promotion_id . "'");

		$this->db->query("DELETE FROM `" . DB_PREFIX . "customer_segment_promotion_group` WHERE promotion_id = '" . (int)$promotion_id . "'");

		if (isset($data['group_ids']) && is_array($data['group_ids'])) {
			foreach ($data['group_ids'] as $group_id) {
				$this->db->query("INSERT INTO `" . DB_PREFIX . "customer_segment_promotion_group` SET promotion_id = '" . (int)$promotion_id . "', customer_group_id = '" . (int)$group_id . "'");
			}
		}
	}

	public function deletePromotion($promotion_id)
	{
		$this->db->query("DELETE FROM `" . DB_PREFIX . "customer_segment_promotion_group` WHERE promotion_id = '" . (int)$promotion_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "customer_segment_promotion` WHERE promotion_id = '" . (int) $promotion_id . "'");
	}

	// SECRET ITEMS
	public function getSpecialItems()
	{
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_segment_special` ORDER BY id ASC");
		return $query->rows;
	}

	public function addSpecialItem($data)
	{
		$this->db->query("INSERT INTO `" . DB_PREFIX . "customer_segment_special` SET
			item_type          = '" . $this->db->escape($data['item_type']) . "',
			item_id            = '" . (int)$data['item_id'] . "',
			customer_group_ids = '" . $this->db->escape(json_encode($data['group_ids'])) . "'
			ON DUPLICATE KEY UPDATE customer_group_ids = '" . $this->db->escape(json_encode($data['group_ids'])) . "'");
	}

	public function deleteSpecialItem($id)
	{
		$this->db->query("DELETE FROM `" . DB_PREFIX . "customer_segment_special` WHERE id = '" . (int)$id . "'");
	}

	// EXCLUSIVE COMBOS
	public function getCombos()
	{
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_segment_combo` ORDER BY combo_id ASC");
		return $query->rows;
	}

	public function getCombo($combo_id)
	{
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_segment_combo` WHERE combo_id = '" . (int)$combo_id . "'");
		return $query->row;
	}

	public function addCombo($data)
	{
		$this->db->query("INSERT INTO `" . DB_PREFIX . "customer_segment_combo` SET
			name               = '" . $this->db->escape($data['name']) . "',
			product_ids        = '" . $this->db->escape($data['product_ids']) . "',
			discount_type      = '" . $this->db->escape($data['discount_type']) . "',
			discount_value     = '" . (float)$data['discount_value'] . "',
			discount_on        = '" . $this->db->escape($data['discount_on']) . "',
			customer_group_ids = '" . $this->db->escape(json_encode($data['group_ids'])) . "',
			date_start         = '" . $this->db->escape($data['date_start']) . "',
			date_end           = '" . $this->db->escape($data['date_end']) . "',
			status             = '" . (int)$data['status'] . "'");
	}

	public function editCombo($combo_id, $data)
	{
		$this->db->query("UPDATE `" . DB_PREFIX . "customer_segment_combo` SET
			name               = '" . $this->db->escape($data['name']) . "',
			product_ids        = '" . $this->db->escape($data['product_ids']) . "',
			discount_type      = '" . $this->db->escape($data['discount_type']) . "',
			discount_value     = '" . (float)$data['discount_value'] . "',
			discount_on        = '" . $this->db->escape($data['discount_on']) . "',
			customer_group_ids = '" . $this->db->escape(json_encode($data['group_ids'])) . "',
			date_start         = '" . $this->db->escape($data['date_start']) . "',
			date_end           = '" . $this->db->escape($data['date_end']) . "',
			status             = '" . (int)$data['status'] . "'
			WHERE combo_id = '" . (int)$combo_id . "'");
	}

	public function deleteCombo($combo_id)
	{
		$this->db->query("DELETE FROM `" . DB_PREFIX . "customer_segment_combo` WHERE combo_id = '" . (int)$combo_id . "'");
	}


}
