<?php
require_once 'db_controller.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    $db = new db_controller();
    $query = "INSERT INTO admins(username, password, email) VALUES (?, ?, ?)";
    try{
        $db->updateDB($query, [$username, $password, $email]);
        echo "Admin registration successful!";
    } catch(Exception $e){
        echo "Error: " . $e->getMessage();
    }
}

?>

<form method="post">
    Username:<input type="text" name="username" required><br>
    Password:<input type="password" name="password" required><br>
    Email:<input type="email" name="email" required><br>
    <button type = "submit">Register Admin</button>
</form>

<span>Already an admin? <a href="login_admin.php">Go to Login</a></span>