<?php

class Role {
    private $db;

    function __construct() {
        $this->db = new Database();
    }

    function getAll() {
        $sql = "SELECT * FROM roles";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    function getById($id) {
        $sql = "SELECT * FROM roles WHERE id = ?";
        return $this->db->query($sql, [$id])->fetch_assoc();
    }

    function create($name) {
        $sql = "INSERT INTO roles (name) VALUES (?)";
        return $this->db->query($sql, [$name]);
    }

    function update($id, $name) {
        $sql = "UPDATE roles SET name=? WHERE id = ?";
        return $this->db->query($sql, [$name, $id]);
    }

    function delete($id) {
        $sql = "DELETE FROM roles WHERE id = ?";
        return $this->db->query($sql, [$id]);
    }
}
?>
