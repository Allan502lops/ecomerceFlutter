<?php
class Order {
    private $db;

    function __construct() {
        $this->db = new Database();
    }

    function getAll() {
        $sql = "SELECT * FROM orders";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    function getById($id) {
        $sql = "SELECT * FROM orders WHERE id = ?";
        return $this->db->query($sql, [$id])->fetch_assoc();
    }

    function create($userId, $date, $status, $total) {
        $sql = "INSERT INTO orders (user_id, date, status, total) VALUES (?, ?, ?, ?)";
        return $this->db->query($sql, [$userId, $date, $status, $total]);
    }

    function update($id, $status) {
        $sql = "UPDATE orders SET status=? WHERE id = ?";
        return $this->db->query($sql, [$status, $id]);
    }

    function delete($id) {
        $sql = "DELETE FROM orders WHERE id = ?";
        return $this->db->query($sql, [$id]);
    }
}
?>
