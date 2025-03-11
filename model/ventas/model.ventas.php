<?php

require_once __DIR__ . '/../../config/conexion.php';


class ModelVentas {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function obtenerCategorias() {
        $sql = 'SELECT id_categoria, nombre_categoria FROM categorias;';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}