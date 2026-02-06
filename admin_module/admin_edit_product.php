<?php
session_start();
include("db_controller.php");

if (!isset($_SESSION['admin_id'])) {
    header("Location: login_admin.php");
    exit;
}

$error = '';

if (!empty($_POST['id'])) {
    if (isset($_POST['submit'])) {
        if (is_numeric($_POST['id'])) {
            $id = $_POST['id'];
            $nume = htmlentities($_POST['nume'], ENT_QUOTES);
            $code = htmlentities($_POST['code'], ENT_QUOTES);
            $imagine = htmlentities($_POST['imagine'], ENT_QUOTES);
            $price = htmlentities($_POST['price'], ENT_QUOTES);
            $descriere = htmlentities($_POST['descriere'], ENT_QUOTES);
            $categorie = htmlentities($_POST['categorie'], ENT_QUOTES);
            if (
                $nume == '' || $code == '' || $imagine == '' || $price == '' || $descriere == '' || $categorie ==
                ''
            ) {
                echo "<div> ERROR: Completati campurile obligatorii!</div>";
            } else {
                $db = new db_controller();
                try {
                    $query = "UPDATE tbl_product SET name=?, code=?, image=?, price=?, descriere=?, categorie=? WHERE id=?";
                    $db->updateDB($query, [$nume, $code, $imagine, $price, $descriere, $categorie, $id]);
                } catch (Exception $e) {
                    echo "ERROR: nu se poate executa update. " . htmlspecialchars($e->getMessage());
                }
            }
        } else {
            echo "id incorect!";
        }
    }
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <title><?php if (!empty($_GET['id'])) {
        echo "Modificare inregistrare";
    } ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <h1><?php if (!empty($_GET['id'])) {
        echo "Modificare Inregistrare";
    } ?></h1>
    <?php if ($error != '') {
        echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error . "</div>";
    } ?>
    <form action="" method="post">
        <div>
            <?php if (!empty($_GET['id'])) { ?>
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id']); ?>" />
                <p>ID: <?php echo htmlspecialchars($_GET['id']); ?></p>
                <?php
                $db = new db_controller();
                $query = "SELECT * FROM tbl_product WHERE id=?";
                $result = $db->getDBResult($query, [$_GET['id']]);

                if (!empty($result)) {
                    $row = $result[0];
                    ?>
                    <strong>Nume: </strong> <input type="text" name="nume" value="<?php echo
                        htmlspecialchars($row['name']); ?>" /><br />
                    <strong>Code: </strong> <input type="text" name="code" value="<?php echo
                        htmlspecialchars($row['code']); ?>" /><br />
                    <strong>Imagine: </strong> <input type="text" name="imagine" value="<?php echo
                        htmlspecialchars($row['image']); ?>" /><br />
                    <strong>Pret: </strong> <input type="text" name="price" value="<?php echo
                        htmlspecialchars($row['price']); ?>" /><br />
                    <strong>Descriere: </strong> <input type="text" name="descriere" value="<?php echo
                        htmlspecialchars($row['descriere']); ?>" /><br />
                    <strong>Categorie: </strong> <input type="text" name="categorie" value="<?php echo
                        htmlspecialchars($row['categorie']); ?>" /><br />
                    <?php
                } else {
                    echo "<div>Nu s-au găsit înregistrări.</div>";
                }
                ?>
                <br />
                <input type="submit" name="submit" value="Submit" />
                <a href="admin_home.php">Inapoi</a>
            <?php } ?>
        </div>
    </form>
</body>

</html>