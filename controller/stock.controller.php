<?php
require_once '../auth/permisos.php';
require_once '../model/model.notificaciones.php'; 

class StockController {
    private $model;

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

