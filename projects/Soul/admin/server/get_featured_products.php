<?php 
include("admin/includes/db.php");

#products at index page
$stmt = $mysqli->prepare("SELECT * FROM `soul_products` order by rand() LIMIT 6");
$stmt->execute();
$featured_products = $stmt->get_result();//this is an array
?>