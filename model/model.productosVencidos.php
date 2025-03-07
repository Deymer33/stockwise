<?php
require_once __DIR__ . '../../config/conexion.php'; 

class Exprirados {

    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }
 
    public function productosVencidos(){  
        $query_vencidos = "SELECT nombre_producto, cantidad, valor_unt, tipo, fecha_v FROM productos WHERE fecha_v < NOW()";
        
        $stmt_vencidos = $this->conn->prepare($query_vencidos);
        $stmt_vencidos->execute();
        return $stmt_vencidos->fetchAll(PDO::FETCH_ASSOC);
     }
}

