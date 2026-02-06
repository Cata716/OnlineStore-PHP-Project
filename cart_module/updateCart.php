<?php

session_start();
require_once 'DBController.php';
if (!isset($_SESSION['id_member'])) {
    header("Location: login.php");
    exit;
}

$db = new DBController();
$cart_id = $_POST['cart_id'];
$quantity = $_POST['quantity'];

if ($quantity > 0) {
    $query = "UPDATE tbl_cart SET quantity = ? WHERE id = ?";
    $db->updateDB($query, [$quantity, $cart_id]);
} else {
    $query = "DELETE FROM tbl_cart WHERE id = ?";
    $db->updateDB($query, [$cart_id]);
}

header("Location: cart.php");
exit;
?>