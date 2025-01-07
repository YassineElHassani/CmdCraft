<?php
require_once __DIR__ . '/../configs/Database.php';
require_once 'Product.php';



class ProductManager {
    public function displayAllProducts() {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM products");
        $stmt->execute();
        $products = $stmt->fetchAll();
        $data = [];
        foreach ($products as $product) {
            $data[] = new Product($product['id'], $product['name'], $product['description'], $product['price'], $product['quantity'], $product['image']);
        }
        return $data;
    }

    public function addProduct(Product $product) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("INSERT INTO products (name, description, price, quantity, image) VALUES (:name, :description, :price, :quantity, :image)");
        $stmt->execute([
            ':name' => $product->getName(),
            ':description' => $product->getDescription(),
            ':price' => $product->getPrice(),
            ':quantity' => $product->getQuantity(),
            ':image' => $product->getImage()
        ]);
    }


    public function deleteProduct($id) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("DELETE FROM products WHERE id = :id");
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
        return new Product($product['id'], $product['name'], $product['description'], $product['price'], $product['quantity'], $product['image']);
    }

    public function updateProduct(Product $product) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("UPDATE products SET name = :name, description = :description, price = :price, quantity = :quantity, image = :image WHERE id = :id");
        $stmt->execute([
            ':name' => $product->getName(),
            ':description' => $product->getDescription(),
            ':price' => $product->getPrice(),
            ':quantity' => $product->getQuantity(),
            ':image' => $product->getImage(),
            ':id' => $product->getId()
        ]);
    }
}
