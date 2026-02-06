1<?php

session_start();
require_once 'DBController.php';
if (!isset($_SESSION['id_member'])) {
    $_SESSION['redirect_product_id'] = $_GET['product_id'];
    header("Location: ../magazin_module/login.php");
    exit;
}

$db = new DBController();
$product_id = $_GET['product_id'];
$id_member = $_SESSION['id_member'];
$quantity = 1; 
$query = "INSERT INTO tbl_cart (product_id, quantity, id_member) VALUES (?, ?, ?)";
$db->updateDB($query, [$product_id, $quantity, $id_member]);
header("Location: cart.php");
exit;
?>