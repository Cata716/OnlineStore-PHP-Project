<?php
session_start();
require_once 'DBController.php';
if (!isset($_SESSION['id_member'])) {
    header("Location: ../magazin_module/login.php");
    exit;
}

$db = new DBController();
$id_member = $_SESSION['id_member'];
$cart_items = $db->getDBResult("SELECT p.name, p.price, c.quantity, c.id FROM tbl_cart c JOIN
                                tbl_product p ON c.product_id = p.id WHERE c.id_member = ?", [$id_member]);

echo "<h1>Cos de cumparaturi</h1>";
foreach ($cart_items as $item) {
    echo"<br>";
    echo "<div>" . htmlspecialchars($item['name']) . " - " . htmlspecialchars($item['price']) . " RON " .  
    "<form method='post' action='updateCart.php'>
        <input type='number' name='quantity' value='" .$item['quantity'] . "'min='0' />
        <input type='hidden' name='cart_id' value='" . $item['id'] . "' />
        <input type='submit' value='Actualizeaza' />
    </form>
    <a href='removeFromCart.php?cart_id=" . $item['id'] ."'>Sterge</a>
    </div>";
    
}
echo "<br><a href='emptyCart.php'>Goleste cosul</a>";
echo "<p> Vrei sa te intorci la pagina principala? <a href='../magazin_module/index.php'> Click aici </a></p>";
echo "<p> Vrei sa te deloghezi? <a href='../magazin_module/logout.php'> Click aici </a></p>";
?>