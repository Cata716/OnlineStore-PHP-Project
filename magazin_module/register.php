<?php

require_once 'DBController.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    $db = new DBController();
    $query = "INSERT INTO users (username, password, email) VALUES (?,?,?)";
    try {
        $db->updateDB($query,[$username,$password,$email]);
        echo "Inregistrare reusita!";
    }catch (Exception $e) {
        echo "Eroare: " . $e->getMessage();
    }
}
?>

<form method="post">
    Username: <input type="text" name="username" required><br>
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit"> Register </button>
</form>

<p>Ai deja cont? <a href="login.php"> Login aici! </a></p>
<p><a href="index.php"> Inapoi la magazin</a></p>