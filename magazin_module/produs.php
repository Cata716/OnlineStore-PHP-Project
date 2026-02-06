<?php 

session_start();
require_once 'DBController.php';

$product_id = $_GET['product_id'];
$db = new DBController();

$product = $db->getDBResult("SELECT * FROM tbl_product WHERE id = ?",
                             [$product_id]);

$product = $product[0];

echo "<h1>" . htmlspecialchars($product['name']) . "</h1>";
echo "<img src='" . htmlspecialchars($product['image']) . "' width='250'>";
echo "<p><strong> Pret: " . "</strong>" . htmlspecialchars($product['price']) . "RON </p>";
echo "<p><strong> Descriere: " . "</strong>" . htmlspecialchars($product['descriere']) . "</p>";
echo "<p><strong> Cod: " . "</strong>" . htmlspecialchars($product['code']) . "</p>";
echo "<a href='../cart_module/addToCart.php?product_id=" . $product['id'] . "'> Adauga in cos </a>";
echo "<br><a href='../cart_module/cart.php'> Vezi cosul </a>";

    
?>