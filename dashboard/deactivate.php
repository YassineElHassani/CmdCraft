<?php
require_once '../configs/Database.php';

if(isset($_GET["id"])) {
    $conn = Database::getConnection();
    $stmt = $conn->prepare("UPDATE users SET is_active = 0 WHERE id = $_GET[id]");
    $stmt->execute();
}

header('Location: ./users.php');

?>