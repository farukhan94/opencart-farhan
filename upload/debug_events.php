<?php
// /Users/farhankhan/Downloads/opencart_customer_segmentation_sample/upload/debug_events.php
require_once('config.php');
require_once(DIR_SYSTEM . 'startup.php');

$db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);
$query = $db->query("SELECT * FROM " . DB_PREFIX . "event WHERE `code` = 'module_customer_segment'");

echo "Events for module_customer_segment:\n";
foreach ($query->rows as $row) {
    print_r($row);
}
