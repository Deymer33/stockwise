<?php 
session_start();
require_once __DIR__ . '../../auth/permisos.php';
require_once __DIR__ . '../../model/model.eliminarProveedores.php';

Class ControllerEliminarProveedor{
    private $model;

    public function __construct() {
        ControlAcceso::verificarAcceso('tendero');  // Verifica permisos

        $database = new Database();
        $db = $database->getConnection();
        $this->model = new ModelEliminarProveedores($db);
    }

    public function mostrarProveedores() {

        return $this->model->obtenerProveedores();
    }


    public function eliminarProveedor() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre_proveedor = trim(filter_var($_POST['nombre_proveedor'], FILTER_SANITIZE_STRING));

            if (empty($nombre_proveedor)) {
                $_SESSION['error'] = 'Por favor, ingrese el nombre del proveedor.';
            } else {
                $_SESSION['success'] = $this->model->eliminarProveedor($nombre_proveedor);
            }

            header("Location: ../tendero/eliminarProveedor.php");
            exit();
        }
    }   
    
}

    $controller = new ControllerEliminarProveedor();
    $controller->eliminarProveedor();
    $proveedores = $controller->mostrarProveedores();