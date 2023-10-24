<?php


class Category {
    private $db;

    function __construct() {
        $this->db = new Database();
    }

    function getAll() {
        $sql = "SELECT * FROM categories";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    function getById($id) {
        $sql = "SELECT * FROM categories WHERE id = ?";
        return $this->db->query($sql, [$id])->fetch_assoc();
    }

    function create($name, $description) {
        $sql = "INSERT INTO categories (name, description) VALUES (?, ?)";
        return $this->db->query($sql, [$name, $description]);
    }

    function update($id, $name, $description) {
        $sql = "UPDATE categories SET name=?, description=? WHERE id = ?";
        return $this->db->query($sql, [$name, $description, $id]);
    }

    function delete($id) {
        $sql = "DELETE FROM categories WHERE id = ?";
        return $this->db->query($sql, [$id]);
    }
}
?>
