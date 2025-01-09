<?php 
require_once '../configs/Database.php';


class Admin {

    public function totalUsers() {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT COUNT(*) FROM users");
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function totalActiveCustomers() {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE is_active = 1 AND role = 'customer';");
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function totalProducts() {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT COUNT(*) FROM products;");
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function totalOrders() {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT COUNT(*) FROM orders;");
        $stmt->execute();
        return $stmt->fetchColumn();
    }

}


?>