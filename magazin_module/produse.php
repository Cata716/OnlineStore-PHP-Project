<?php 

session_start();
require_once 'DBController.php';

$categorie = $_GET['categorie'];
$db = new DBController();

$products = $db->getDBResult("SELECT * FROM tbl_product WHERE categorie = ? ORDER BY name",
                             [$categorie]);


echo "<h1> Lista de produse disponibile " . htmlspecialchars($categorie) . "</h1>" ;

foreach($products as $product) {
    echo "<h3>" . htmlspecialchars($product['name']) . " - " . "<a href='produs.php?product_id=" . $product['id'] . "'>Vezi detalii</a></h3>";  
    echo "<img src='" . htmlspecialchars($product['image']) . "' width='250'>";
}

