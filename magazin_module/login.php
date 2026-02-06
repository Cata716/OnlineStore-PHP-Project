<?php

session_start();
require_once 'DBController.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password =  $_POST['password'];

    $db = new DBController();
    $query = "SELECT id, password FROM users WHERE username = ?";
    $user = $db->getDBResult($query,[$username]);

    if($user && password_verify($password,$user[0]['password'])) {
        $_SESSION['id_member'] = $user[0]['id'];
        
        if(isset($_SESSION['redirect_product_id'])) {
            $product_id = $_SESSION['redirect_product_id'];
            unset($_SESSION['redirect_product_id']);
            header("Location: ../cart_module/addToCart.php?product_id=" . $product_id);
        } else {
            header("Location: index.php");
        }
        exit;
    } else {
        echo "Invalid username or password";
    }
}
?>

<form method="post">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Login</button>

    <p> Nu ai cont? <a href="register.php"> Inregistreaza-te aici! </a></p>
    <p><a href="index.php"> Inapoi la magazin </a></p>
</form>