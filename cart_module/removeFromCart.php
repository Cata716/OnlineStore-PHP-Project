<?php

session_start();
require_once 'DBController.php';

if(!isset($_SESSION['id_member'])) {
    header("Location: login.php");
    exit;
}

$db = new DBController();
$cart_id = $_GET['cart_id'];
$id_member = $_SESSION['id_member'];


$db->updateDB("DELETE FROM tbl_cart WHERE id = ? AND id_member = ?", [$cart_id, $id_member]);
header("Location: cart.php");
exit;
?>
