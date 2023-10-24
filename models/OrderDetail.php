<?php

class OrderDetail {
    private $db;

    function __construct() {
        $this->db = new Database();
    }

    function getAll() {
        $sql = "SELECT * FROM order_details";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    function getById($id) {
        $sql = "SELECT * FROM order_details WHERE id = ?";
        return $this->db->query($sql, [$id])->fetch_assoc();
    }

    function getByOrderId($orderId) {
        $sql = "SELECT * FROM order_details WHERE order_id = ?";
        return $this->db->query($sql, [$orderId])->fetch_all(MYSQLI_ASSOC);
    }

    function create($orderId, $productId, $quantity, $price) {
        $sql = "INSERT INTO order_details (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)";
        return $this->db->query($sql, [$orderId, $productId, $quantity, $price]);
    }

    function update($id, $quantity, $price) {
        $sql = "UPDATE order_details SET quantity=?, price=? WHERE id = ?";
        return $this->db->query($sql, [$quantity, $price, $id]);
    }

    function delete($id) {
        $sql = "DELETE FROM order_details WHERE id = ?";
        return $this->db->query($sql, [$id]);
    }
}
?>
