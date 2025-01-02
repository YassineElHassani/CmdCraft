<?php 

class Order {
    private $id;
    private $user_id;
    private $total_price;

    public function __construct($id, $user_id, $total_price) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->total_price = $total_price;
    }

    public function getId() {
        return $this->id;
    }

    public function getUser_id() {
        return $this->user_id;
    }

    public function getTotal_Price() {
        return $this->total_price;
    }

    public function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

    public function setTotal_price($total_price) {
        $this->total_price = $total_price;
    }

    public function createOrder(Order $order) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("INSERT INTO orders (user_id, total_price) VALUES (:user_id, :total_price)");
        $stmt->execute([
            ':user_id' => $order->getUser_id(),
            ':total_price' => $order->getTotal_Price()
        ]);
    }

    public function cancelOrder($id) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("DELETE FROM orders WHERE id = :id");
        // $stmt->bindParam(':id', $id);
        $stmt->execute([
            ':id' => $id
        ]);
    }
}

?>