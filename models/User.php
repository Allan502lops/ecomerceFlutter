<?php
class User {
    private $db;

    function __construct() {
        $this->db = new Database();
    }

    function getAll() {
        $sql = "SELECT * FROM users";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    function getById($id) {
        $sql = "SELECT * FROM users WHERE id = ?";
        return $this->db->query($sql, [$id])->fetch_assoc();
    }

    function create($name, $email, $password, $role) {
      
        $sql = "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)";
        return $this->db->query($sql, [$name, $email, $password, $role]);
    }

    function update($id, $name, $email, $password, $role) {
        $sql = "UPDATE users SET name=?, email=?, password=?, role=? WHERE id = ?";
        return $this->db->query($sql, [$name, $email, $password, $role, $id]);
    }

    function delete($id) {
        $sql = "DELETE FROM users WHERE id = ?";
        return $this->db->query($sql, [$id]);
    }
}
?>
