<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login_admin.php");
    exit;
}

include("db_controller.php");
$db = new db_controller();
$products = $db->getDBResult("SELECT id, name FROM tbl_product ORDER BY id DESC");
?>

Bine ai venit! <br>
<a href='logout_admin.php'>Logout</a><br>
<a href='admin_add_product.php'>Adauga produs</a><br>
<a href="../magazin_module/index.php">Index produse</a>

<h3>Produse existente (click pentru editare):</h3>

<?php foreach ($products as $product): ?>
    <a href='admin_edit_product.php?id=<?php echo $product['id']; ?>'>
        <?php echo htmlspecialchars($product['name']); ?> (ID: <?php echo $product['id']; ?>)
        <a href='admin_delete_product.php?id=<?php echo $product['id']; ?>'
            onclick="return confirm('Sigur stergeti acest produs?')">Delete</a>
        <br>
    </a><br>
<?php endforeach; ?>