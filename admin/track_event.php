<?php
require 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $pdo->prepare("INSERT INTO analytics (event_type) VALUES (?)");
    $stmt->execute([$_POST['event']]);
}
