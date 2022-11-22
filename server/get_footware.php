<?php
include('connection.php');

$stmt = $conn->prepare("SELECT * FROM `products` WHERE product_category='footware' LIMIT 4");

$stmt->execute();

$footware_products = $stmt->get_result();

?>