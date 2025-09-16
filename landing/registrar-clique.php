<?php
require '../admin/config.php';

$stmt = $pdo->prepare("INSERT INTO whatsapp_clicks () VALUES ()");
$stmt->execute();

http_response_code(200);
echo json_encode(['status' => 'ok']);
