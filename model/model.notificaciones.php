<?php 

require_once __DIR__ . '../../config/conexion.php';

class NotificacionVencidos {

    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function numeroProductosVencidos(){
        $query = "SELECT COUNT(*) as total_vencidos FROM productos WHERE fecha_v < NOW()";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $total_vencidos = $row['total_vencidos'];
    }
}