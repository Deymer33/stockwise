<?php

require_once __DIR__ . '../../config/conexion.php'; 

class Producto {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function obtenerProductos() {
        $sql = "SELECT p.id_product, p.nombre_producto, p.cantidad, p.valor_unt, p.fecha_v, tipo, pr.nombre_proveedor
                FROM productos p
                JOIN proveedores pr ON p.id_proveedor = pr.id_proveedor";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
