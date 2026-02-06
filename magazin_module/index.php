<?php

session_start();
require_once 'DBController.php';

$db = new DBController();

$categories = $db->getDBResult("SELECT DISTINCT categorie FROM tbl_product ORDER BY categorie");

echo "<h1>Magazin online</h1>";
echo "<h2>Categorii de produse</h2>";
echo "<ul>";

foreach($categories as $category) {
    echo "<li>" . htmlspecialchars($category['categorie']) . "  - <a href='produse.php?categorie=" . $category['categorie'] . "'>Vezi produsele</a></li>";
}

echo "</ul>";
echo "<p><strong> Esti un utilizator nou? Creeaza-ti un cont aici!</strong> <a href='register.php'>Click aici</a></p>";
echo "<p><strong> Ai deja un cont? Conecteaza-te la el!</strong> <a href='login.php'>Click aici</a></p>";
?>