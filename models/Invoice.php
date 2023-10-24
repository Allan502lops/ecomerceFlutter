<?php

class Invoice {
    private $db;

    function __construct() {
        $this->db = new Database();
    }

    function getAll() {
        $sql = "SELECT * FROM invoices";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    function getById($id) {
        $sql = "SELECT * FROM invoices WHERE id = ?";
        return $this->db->query($sql, [$id])->fetch_assoc();
    }

    function getByOrderId($orderId) {
        $sql = "SELECT * FROM invoices WHERE order_id = ?";
        return $this->db->query($sql, [$orderId])->fetch_assoc();
    }

    function create($orderId, $date, $total) {
        $sql = "INSERT INTO invoices (order_id, date, total) VALUES (?, ?, ?)";
        return $this->db->query($sql, [$orderId, $date, $total]);
    }

    function update($id, $total) {
        $sql = "UPDATE invoices SET total=? WHERE id = ?";
        return $this->db->query($sql, [$total, $id]);
    }

    function delete($id) {
        $sql = "DELETE FROM invoices WHERE id = ?";
        return $this->db->query($sql, [$id]);
    }
}
?>
