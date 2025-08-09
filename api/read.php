<?php
require '../db.php';
$stmt = $pdo->query("SELECT * FROM users");
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
