<?php 

class OrderDetails {
    private $id;
    private $product_id;
    private $order_id;
    private $quantity;

    public function __construct($id, $product_id, $order_id, $quantity) {
        $this->id = $id;
        $this->product_id = $product_id;
        $this->order_id = $order_id;
        $this->quantity = $quantity;
    }

    public function getId() {
        return $this->id;
    }
    public function getProduct_id() {
        return $this->product_id;
    }
    public function getOrder_id() {
        return $this->order_id;
    }
    public function getQuantity() {
        return $this->quantity;
    }

    
    public function setProduct_id($product_id) {
        $this->product_id = $product_id;

    }
    public function setOrder_id($order_id) {
        $this->order_id = $order_id;

    }
    public function setQuantity($quantity) {
        $this->quantity = $quantity;

    }
}

?>