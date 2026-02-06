<?php

session_start();
require_once 'db_controller.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $db = new db_controller();
    $query = "SELECT id, password FROM admins WHERE username = ?";
    $user = $db->getDBResult($query, [$username]);

    if ($user && password_verify($password, $user[0]['password'])) {
        $_SESSION['admin_id'] = $user[0]['id'];
        header("Location: admin_home.php");
        exit;
    } else {
        echo "Invalid username or password";
    }

}
?>

<form method="post">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Admin Login</button>
</form>