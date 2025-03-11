<?php
require_once __DIR__ . '/../config/conexion.php';

class Proveedor {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function verificarProveedor($nombre, $email) {
        $stmt = $this->conn->prepare("SELECT * FROM proveedor WHERE nombre = :nombre OR email = :email");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function agregarProveedor($nombre, $direccion, $telefono, $email) {
        $stmt = $this->conn->prepare("INSERT INTO proveedor (nombre, ciudad, telefono, email) VALUES (:nombre, :direccion, :telefono, :email)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':email', $email);

        return $stmt->execute();
    }
}
?>
