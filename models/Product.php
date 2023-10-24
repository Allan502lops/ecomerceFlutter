<?php
class Product {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    function getAll() {
        $sql = "SELECT * FROM products";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    function getById($id) {
        $sql = "SELECT * FROM products WHERE id = ?";
        return $this->db->query($sql, [$id])->fetch_assoc();
    }

    function create($name, $description, $price, $stock, $category_id) {
        $sql = "INSERT INTO products (name, description, price, stock, category_id) VALUES (?, ?, ?, ?, ?)";
        return $this->db->query($sql, [$name, $description, $price, $stock, $category_id]);
    }

    function update($id, $name, $description, $price, $stock, $category_id) {
        $sql = "UPDATE products SET name = ?, description = ?, price = ?, stock = ?, category_id = ? WHERE id = ?";
        return $this->db->query($sql, [$name, $description, $price, $stock, $category_id, $id]);
    }

    function delete($id) {
        $sql = "DELETE FROM products WHERE id = ?";
        return $this->db->query($sql, [$id]);
    }
}
?>
