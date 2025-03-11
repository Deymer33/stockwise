<?php

require_once __DIR__ . '/../config/conexion.php';

Class ModelEliminarProveedores {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function obtenerProveedores() {
        $sql = 'SELECT id_proveedor , nombre_proveedor FROM proveedores';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminarProveedor($nombre_proveedor) {
        try {
            $stmt = $this->conn->prepare("SELECT id_proveedor  FROM proveedores WHERE nombre_proveedor = :nombre_proveedor");
            $stmt->bindParam(':nombre_proveedor', $nombre_proveedor);
            $stmt->execute();
            $row = $stmt->fetch();

            if ($row) {
                $stmt = $this->conn->prepare("DELETE FROM proveedores WHERE id_proveedor = :id_proveedor");
                $stmt->bindParam(':id_proveedor', $row['id_proveedor']);
                $stmt->execute();
                return "Proveedor eliminado con éxito.";
            } else {
                return "Proveedor no encontrado.";
            }
        } catch (PDOException $e) {
            return "Error al conectar a la base de datos: " . $e->getMessage();
        }
    }

}