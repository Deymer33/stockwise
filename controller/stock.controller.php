<?php
require_once __DIR__ . '../../auth/permisos.php';
require_once __DIR__ . '../../model/model.stock.php';

class StockController {

    public function __construct(){
        ControlAcceso::verificarAcceso('tendero');
    }


    public function stock (){

        $database = new Database();
        $db = $database->getConnection();
        
        $productoModel = new Producto($db);
        $productos = $productoModel->obtenerProductos();

        return $productos;
    }


}

