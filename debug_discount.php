<?php
// Debug script to check config and discount evaluation
$host = 'db';
$user = 'root';
$pass = 'opencart';
$db   = 'opencart';
$prefix = 'oc_';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

echo "Status: ";
$res = $conn->query("SELECT value FROM {$prefix}setting WHERE `key` = 'total_customer_segment_discount_status'");
if ($row = $res->fetch_assoc()) echo $row['value'] . "\n";
else echo "NOT FOUND\n";

echo "Sort Order: ";
$res = $conn->query("SELECT value FROM {$prefix}setting WHERE `key` = 'total_customer_segment_discount_sort_order'");
if ($row = $res->fetch_assoc()) echo $row['value'] . "\n";
else echo "NOT FOUND\n";

echo "Promotions for checkout discount:\n";
$res = $conn->query("SELECT * FROM {$prefix}customer_segment_promotion WHERE type = 'cart_discount' AND status = 1");
while ($row = $res->fetch_assoc()) {
    print_r($row);
    $pid = $row['promotion_id'];
    echo "Groups for this promo: ";
    $res2 = $conn->query("SELECT customer_group_id FROM {$prefix}customer_segment_promotion_group WHERE promotion_id = $pid");
    while($row2 = $res2->fetch_assoc()) echo $row2['customer_group_id'] . " ";
    echo "\n";
}

$conn->close();
?>
