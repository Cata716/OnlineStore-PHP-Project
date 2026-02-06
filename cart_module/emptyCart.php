<?php

session_start();
require_once 'DBController.php';

if (!isset($_SESSION['id_member'])) {
    header("Location: login.php");
    exit;
}

$db = new DBController();
$id_member = $_SESSION['id_member'];
$db->updateDB("DELETE FROM tbl_cart WHERE id_member = ?", [$id_member]);
header("Location: cart.php");
exit;
?>