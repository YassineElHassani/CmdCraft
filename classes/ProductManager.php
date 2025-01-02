<?php
require_once '../configs/Database.php';


class ProductManager {
    public function displayAllProducts() {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM products");
        $stmt->execute();
        $products = $stmt->fetchAll();
        $data = [];
        foreach ($products as $product) {
            $data[] = new Product($product['id'], $product['name'], $product['description'], $product['price'], $product['quantity']);
        }
        return $data;// [ Product, Product, Product]
    }

    public function addProduct(Product $product) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("INSERT INTO products (name, description, price, quantity) VALUES (:name, :description, :price, :quantity)");
        $stmt->execute([
            ':name' => $product->getName(),
            ':description' => $product->getDescription(),
            ':price' => $product->getPrice(),
            ':quantity' => $product->getQuantity()
        ]);
    }


    public function deleteProduct($id) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("DELETE FROM products WHERE id = :id");
        // $stmt->bindParam(':id', $id);
        $stmt->execute([
            ':id' => $id
        ]);
    }    

    public function getProduct($id) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute([
            ':id' => $id
        ]);
        $product = $stmt->fetch();
        return new Product($product['id'], $product['name'], $product['description'], $product['price'], $product['quantity']);
    }

    public function updateProduct(Product $product) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("UPDATE products SET name = :name, description = :description, price = :price, quantity = :quantity WHERE id = :id");
        $stmt->execute([
            ':name' => $product->getName(),
            ':description' => $product->getDescription(),
            ':price' => $product->getPrice(),
            ':quantity' => $product->getQuantity(),
            ':id' => $product->getId()
        ]);
    }
}
