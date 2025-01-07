<?php

class Product {
    private $id;
    private $name;
    private $description;
    private $price;
    private $quantity;
    private $image;

    public function __construct($id, $name, $description, $price, $quantity, $image) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->image = $image;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getImage() {
        return $this->image;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function renderRow() {
        // $id = htmlspecialchars();
        $name = htmlspecialchars($this->name);
        $description = htmlspecialchars($this->description);
        $price = htmlspecialchars($this->price);
        $quantity = htmlspecialchars($this->quantity);
        $image = htmlspecialchars($this->image);

        return "
        <tr>
            <td>$name</td>
            <td>$description</td>
            <td>$price</td>
            <td>$quantity</td>
            <td><img src='$image' height='100px' width='100px'/></td>
            <td>
                <a class='badge-pending' href='../dashboard/products/edit.php?id=$this->id'>Edit</a><br>
                <a class='badge-trashed' href='../dashboard/products/delete.php?id=$this->id'>Delete</a>
            </td>
        </tr>
        ";
    }
}
