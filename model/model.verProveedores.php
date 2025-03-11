<?php 
require_once __DIR__ . '../../config/conexion.php'; 

Class VerProveedores {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function listadoProveedores(){
        $sql = "SELECT * FROM proveedores";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $proveedores = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $proveedores;
    }

}