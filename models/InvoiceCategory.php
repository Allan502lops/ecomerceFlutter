<?php

class InvoiceCategory {
    private $db;

    function __construct() {
        $this->db = new Database();
    }

    function getAll() {
        $sql = "SELECT * FROM invoice_categories";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    function getById($id) {
        $sql = "SELECT * FROM invoice_categories WHERE id = ?";
        return $this->db->query($sql, [$id])->fetch_assoc();
    }

    function create($name, $start_date, $end_date) {
        $sql = "INSERT INTO invoice_categories (name, start_date, end_date) VALUES (?, ?, ?)";
        return $this->db->query($sql, [$name, $start_date, $end_date]);
    }

    function update($id, $name, $start_date, $end_date) {
        $sql = "UPDATE invoice_categories SET name=?, start_date=?, end_date=? WHERE id = ?";
        return $this->db->query($sql, [$name, $start_date, $end_date, $id]);
    }

    function delete($id) {
        $sql = "DELETE FROM invoice_categories WHERE id = ?";
        return $this->db->query($sql, [$id]);
    }
}
?>
