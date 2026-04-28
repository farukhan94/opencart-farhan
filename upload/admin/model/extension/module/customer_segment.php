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

		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "customer_segment_rule` LIKE 'conditions_json'");
		if (!$query->num_rows) {
			$this->db->query("ALTER TABLE `" . DB_PREFIX . "customer_segment_rule` ADD COLUMN `conditions_json` TEXT DEFAULT NULL;");
		}

		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "customer_segment_rule` LIKE 'actions_json'");
		if (!$query->num_rows) {
			$this->db->query("ALTER TABLE `" . DB_PREFIX . "customer_segment_rule` ADD COLUMN `actions_json` TEXT DEFAULT NULL;");
		}

		// Drop old columns no longer used
		$legacy_columns = array('spend_min', 'spend_max', 'order_count_min', 'order_count_max', 'gender', 'age_min', 'age_max', 'country_id', 'zone_id', 'timeframe_type', 'timeframe_days', 'timeframe_start', 'timeframe_end', 'send_notification', 'notification_title', 'notification_body');
		foreach ($legacy_columns as $col) {
			$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "customer_segment_rule` LIKE '" . $this->db->escape($col) . "'");
			if ($query->num_rows) {
				$this->db->query("ALTER TABLE `" . DB_PREFIX . "customer_segment_rule` DROP COLUMN `" . $col . "`;");
			}
		}

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
		  `old_group_id` INT(11) NOT NULL,
		  `new_group_id` INT(11) NOT NULL,
		  `rule_id`      INT(11) DEFAULT NULL,
		  `comment`      TEXT,
		  `date_added`   DATETIME NOT NULL,
		  PRIMARY KEY (`log_id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "customer_segment_manual` (
		  `customer_id` INT(11) NOT NULL,
		  `group_id`    INT(11) NOT NULL,
		  `is_locked`   TINYINT(1) NOT NULL DEFAULT 1,
		  `date_added`  DATETIME NOT NULL,
		  PRIMARY KEY (`customer_id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "customer_segment_banner` (
		  `banner_id`         INT(11) NOT NULL AUTO_INCREMENT,
		  `customer_group_id` INT(11) NOT NULL,
		  `title`             VARCHAR(255) NOT NULL,
		  `image`             VARCHAR(255) NOT NULL,
		  `link`              VARCHAR(255) DEFAULT NULL,
		  `status`            TINYINT(1) NOT NULL DEFAULT 1,
		  PRIMARY KEY (`banner_id`),
		  KEY `customer_group_id` (`customer_group_id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "customer_segment_slider` (
		  `slider_id`         INT(11) NOT NULL AUTO_INCREMENT,
		  `customer_group_id` INT(11) NOT NULL,
		  `name`              VARCHAR(255) NOT NULL,
		  `product_ids`       TEXT DEFAULT NULL,
		  `status`            TINYINT(1) NOT NULL DEFAULT 1,
		  PRIMARY KEY (`slider_id`),
		  KEY `customer_group_id` (`customer_group_id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "customer_segment_promotion` (
		  `promotion_id`      INT(11) NOT NULL AUTO_INCREMENT,
		  `customer_group_id` INT(11) NOT NULL,
		  `title`             VARCHAR(255) NOT NULL,
		  `description`       TEXT DEFAULT NULL,
		  `code`              VARCHAR(50) DEFAULT NULL,
		  `status`            TINYINT(1) NOT NULL DEFAULT 1,
		  PRIMARY KEY (`promotion_id`),
		  KEY `customer_group_id` (`customer_group_id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;");

		// Alter customer table if columns don't exist
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "customer` LIKE 'date_of_birth'");
		if (!$query->num_rows) {
			$this->db->query("ALTER TABLE `" . DB_PREFIX . "customer` ADD COLUMN `date_of_birth` DATE DEFAULT NULL AFTER `fax`;");
		}

		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "customer` LIKE 'gender'");
		if (!$query->num_rows) {
			$this->db->query("ALTER TABLE `" . DB_PREFIX . "customer` ADD COLUMN `gender` VARCHAR(10) DEFAULT NULL AFTER `date_of_birth`;");
		}

		// Register Event
		$this->load->model('setting/event');
		$this->model_setting_event->deleteEventByCode('module_customer_segment');
		$this->model_setting_event->addEvent('module_customer_segment', 'catalog/model/checkout/order/addOrderHistory/after', 'extension/module/customer_segment/eventOrderComplete');
		$this->model_setting_event->addEvent('module_customer_segment_footer', 'catalog/controller/common/footer/after', 'extension/module/customer_segment/eventFooterAfter');
	}

	public function uninstall()
	{
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "customer_segment_rule`;");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "customer_segment_fcm_token`;");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "customer_segment_log`;");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "customer_segment_manual`;");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "customer_segment_banner`;");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "customer_segment_slider`;");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "customer_segment_promotion`;");

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

			$this->db->query("INSERT INTO " . DB_PREFIX . "customer_segment_log SET 
                customer_id = '" . (int) $customer_id . "', 
                old_group_id = '" . (int) $old_group_id . "', 
                new_group_id = '" . (int) $customer_group_id . "', 
                rule_id = '" . (int) $rule_id . "', 
                date_added = NOW()");

			// Check Rule Actions
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

			return true;
		}
	}

	public function addManual($customer_id, $customer_group_id)
	{
		$this->db->query("DELETE FROM " . DB_PREFIX . "customer_segment_manual WHERE customer_id = '" . (int) $customer_id . "'");
		$this->db->query("INSERT INTO " . DB_PREFIX . "customer_segment_manual SET customer_id = '" . (int) $customer_id . "', group_id = '" . (int) $customer_group_id . "', date_added = NOW()");
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
			$implode[] = "l.customer_id = '" . (int) $data['filter_customer_id'] . "'";
		}
		if (!empty($data['filter_new_group_id'])) {
			$implode[] = "l.new_group_id = '" . (int) $data['filter_new_group_id'] . "'";
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
			$implode[] = "l.customer_id = '" . (int) $data['filter_customer_id'] . "'";
		}
		if (!empty($data['filter_new_group_id'])) {
			$implode[] = "l.new_group_id = '" . (int) $data['filter_new_group_id'] . "'";
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
		$where = $customer_group_id ? " WHERE customer_group_id = '" . (int) $customer_group_id . "'" : '';
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_segment_banner`" . $where . " ORDER BY banner_id ASC");
		return $query->rows;
	}

	public function getBanner($banner_id)
	{
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_segment_banner` WHERE banner_id = '" . (int) $banner_id . "'");
		return $query->row;
	}

	public function addBanner($data)
	{
		$this->db->query("INSERT INTO `" . DB_PREFIX . "customer_segment_banner` SET
			customer_group_id = '" . (int) $data['customer_group_id'] . "',
			title   = '" . $this->db->escape($data['title']) . "',
			image   = '" . $this->db->escape($data['image']) . "',
			link    = '" . $this->db->escape(isset($data['link']) ? $data['link'] : '') . "',
			status  = '" . (int) (isset($data['status']) ? $data['status'] : 1) . "'");
		return $this->db->getLastId();
	}

	public function editBanner($banner_id, $data)
	{
		$this->db->query("UPDATE `" . DB_PREFIX . "customer_segment_banner` SET
			customer_group_id = '" . (int) $data['customer_group_id'] . "',
			title   = '" . $this->db->escape($data['title']) . "',
			image   = '" . $this->db->escape($data['image']) . "',
			link    = '" . $this->db->escape(isset($data['link']) ? $data['link'] : '') . "',
			status  = '" . (int) (isset($data['status']) ? $data['status'] : 1) . "'
			WHERE banner_id = '" . (int) $banner_id . "'");
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
		$where = $customer_group_id ? " WHERE customer_group_id = '" . (int) $customer_group_id . "'" : '';
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_segment_slider`" . $where . " ORDER BY slider_id ASC");
		return $query->rows;
	}

	public function getSlider($slider_id)
	{
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_segment_slider` WHERE slider_id = '" . (int) $slider_id . "'");
		return $query->row;
	}

	public function addSlider($data)
	{
		$this->db->query("INSERT INTO `" . DB_PREFIX . "customer_segment_slider` SET
			customer_group_id = '" . (int) $data['customer_group_id'] . "',
			name              = '" . $this->db->escape($data['name']) . "',
			product_ids       = '" . $this->db->escape(isset($data['product_ids']) ? $data['product_ids'] : '') . "',
			status            = '" . (int) (isset($data['status']) ? $data['status'] : 1) . "'");
		return $this->db->getLastId();
	}

	public function editSlider($slider_id, $data)
	{
		$this->db->query("UPDATE `" . DB_PREFIX . "customer_segment_slider` SET
			customer_group_id = '" . (int) $data['customer_group_id'] . "',
			name              = '" . $this->db->escape($data['name']) . "',
			product_ids       = '" . $this->db->escape(isset($data['product_ids']) ? $data['product_ids'] : '') . "',
			status            = '" . (int) (isset($data['status']) ? $data['status'] : 1) . "'
			WHERE slider_id = '" . (int) $slider_id . "'");
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
		$where = $customer_group_id ? " WHERE customer_group_id = '" . (int) $customer_group_id . "'" : '';
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_segment_promotion`" . $where . " ORDER BY promotion_id ASC");
		return $query->rows;
	}

	public function getPromotion($promotion_id)
	{
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_segment_promotion` WHERE promotion_id = '" . (int) $promotion_id . "'");
		return $query->row;
	}

	public function addPromotion($data)
	{
		$this->db->query("INSERT INTO `" . DB_PREFIX . "customer_segment_promotion` SET
			customer_group_id = '" . (int) $data['customer_group_id'] . "',
			title             = '" . $this->db->escape($data['title']) . "',
			description       = '" . $this->db->escape(isset($data['description']) ? $data['description'] : '') . "',
			code              = '" . $this->db->escape(isset($data['code']) ? $data['code'] : '') . "',
			status            = '" . (int) (isset($data['status']) ? $data['status'] : 1) . "'");
		return $this->db->getLastId();
	}

	public function editPromotion($promotion_id, $data)
	{
		$this->db->query("UPDATE `" . DB_PREFIX . "customer_segment_promotion` SET
			customer_group_id = '" . (int) $data['customer_group_id'] . "',
			title             = '" . $this->db->escape($data['title']) . "',
			description       = '" . $this->db->escape(isset($data['description']) ? $data['description'] : '') . "',
			code              = '" . $this->db->escape(isset($data['code']) ? $data['code'] : '') . "',
			status            = '" . (int) (isset($data['status']) ? $data['status'] : 1) . "'
			WHERE promotion_id = '" . (int) $promotion_id . "'");
	}

	public function deletePromotion($promotion_id)
	{
		$this->db->query("DELETE FROM `" . DB_PREFIX . "customer_segment_promotion` WHERE promotion_id = '" . (int) $promotion_id . "'");
	}
}

