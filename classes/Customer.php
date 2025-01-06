<?php 
require_once '../configs/Database.php';
require_once 'Users.php';

class Customer extends Users {

    public function browseProducts() {
        $display  = new ProductManager;
        $display->displayAllProducts();
    }
}


?>