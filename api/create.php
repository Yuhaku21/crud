<?php
require '../db.php';
$data = json_decode(file_get_contents("php://input"), true);
$stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
$stmt->execute([$data['name'], $data['email']]);
echo json_encode(["status" => "success"]);
