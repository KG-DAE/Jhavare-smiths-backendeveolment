<?php
require 'db.php';
session_start();

if (!isset($_SESSION["user_id"])) {
    http_response_code(401);
    echo "Unauthorized";
    exit;
}

$stmt = $pdo->prepare("SELECT expression, result, created_at FROM calculations WHERE user_id = ? ORDER BY created_at DESC");
$stmt->execute([$_SESSION["user_id"]]);
$history = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($history);
?>
