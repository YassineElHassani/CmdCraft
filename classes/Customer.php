<?php 
require_once '../configs/Database.php';

class Customer extends Users {
    private $isActive;

    public function __construct($isActive){
        $this->isActive = $isActive;
    }

    function getActivation() {
        return $this->isActive;
    }

    function setActivation($isActive) {
        $this->isActive = $isActive;
    }

    function register(Customer $customer) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("INSERT INTO users (name, email, password, role, is_active) VALUES (:name, :email, :password, :role, :is_active)");
        $stmt->execute([
            ':name' => $customer->getName(),
            ':email' => $customer->getEmail(),
            ':password' => $customer->getPassword(),
            ':role' => $customer->getRole(),
            ':isActive' => $customer->getActivation()
        ]);
    }

    function browseProducts() {
        $display  = new ProductManager;
        $display->displayAllProducts();
    }
}


?>