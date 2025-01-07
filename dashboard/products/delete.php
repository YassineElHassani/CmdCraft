<?php 
include_once '../../classes/ProductManager.php';


$manager = new ProductManager;

if(isset($_GET["id"])) {
    $manager->deleteProduct($_GET['id']);
}

header('Location: ../products.php');
?>