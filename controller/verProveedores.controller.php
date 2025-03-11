<?php
require_once __DIR__ . '../../auth/permisos.php';
require_once __DIR__ . '../../model/model.verProveedores.php';

Class ControllerVerProveedores {

    public function __construct(){
        ControlAcceso::verificarAcceso('tendero');
    }

    public function verProveedores (){

        $database = new Database();
        $db = $database->getConnection();


        $surtidor = new VerProveedores($db);
        $proveedores = $surtidor->listadoProveedores();

        return $proveedores;

    }
}