<?php
require '../db.php';
$data = json_decode(file_get_contents("php://input"), true);
$stmt = $pdo->prepare("UPDATE users SET name=?, email=? WHERE id=?");
$stmt->execute([$data['name'], $data['email'], $data['id']]);
echo json_encode(["status" => "updated"]);
