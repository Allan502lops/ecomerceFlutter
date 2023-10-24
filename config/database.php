<?php
class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "5160129802";
    private $dbname = "ecomerce";
    private $port = 3307; 

    function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname, $this->port);

        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }
    }


    function closeConnection() {
        $this->conn->close();
    }

    function query($sql, $params = []) {
        $stmt = $this->conn->prepare($sql);

        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $this->conn->error);
        }

        if (!empty($params)) {
            $types = str_repeat('s', count($params));
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        return $result;
    }
}

?>
