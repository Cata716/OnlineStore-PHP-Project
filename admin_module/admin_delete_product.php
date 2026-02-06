<?php
include("db_controller.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $db = new db_controller();
    try {
        $query = "DELETE FROM tbl_product WHERE id = ?";
        $result = $db->updateDB($query, [$id]);
        echo "Produs sters cu succes!";
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage();
    }
} else {
    echo "ID invalid!";
}
echo "<br><a href='admin_home.php'>Inapoi</a>";
?>