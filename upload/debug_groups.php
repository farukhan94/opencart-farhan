<?php
define('DB_HOSTNAME', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'opencart');
define('DB_DATABASE', 'opencart');
define('DB_PREFIX', 'oc_');
$conn = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
$res = $conn->query("SELECT * FROM " . DB_PREFIX . "customer_group");
while ($row = $res->fetch_assoc()) {
    print_r($row);
}
$conn->close();
?>
