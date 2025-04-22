<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
    try {
        $stmt->execute([$email, $password]);
        echo "Account created! <a href='login.html'>Login now</a>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
