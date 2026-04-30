<?php
// Debug script to check promotions and groups
$host = 'db';
$user = 'root';
$pass = 'opencart';
$db   = 'opencart';
$prefix = 'oc_';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Promotions:\n";
$res = $conn->query("SELECT * FROM customer_segment_promotion");
while ($row = $res->fetch_assoc()) {
    print_r($row);
}

echo "\nPromotion Groups:\n";
$res = $conn->query("SELECT * FROM customer_segment_promotion_group");
while ($row = $res->fetch_assoc()) {
    print_r($row);
}

$conn->close();
?>
