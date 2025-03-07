<?php 
require_once __DIR__ . '../../auth/permisos.php';
require_once __DIR__ . '../../model/model.productosVencidos.php'; 

Class ProductosVencidosController {


    public function __construct() {
        ControlAcceso::verificarAcceso('tendero');
    }

    public function reporteVencido(){

        $database = new Database();
        $db = $database->getConnection();

        $productos = new Exprirados($db);
        $productos_vencidos = $productos->productosVencidos();

        return $productos_vencidos;

    }

}