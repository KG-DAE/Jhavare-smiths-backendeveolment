<?php
require 'db.php';
session_start();

if (!isset($_SESSION["user_id"])) {
    http_response_code(401);
    echo "Unauthorized";
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['expression']) && isset($data['result'])) {
    $stmt = $pdo->prepare("INSERT INTO calculations (user_id, expression, result) VALUES (?, ?, ?)");
    $stmt->execute([$_SESSION["user_id"], $data['expression'], $data['result']]);
    echo "Saved";
} else {
    echo "Invalid input";
}
?>
