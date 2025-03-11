<?php
require_once __DIR__ . '/../../auth/permisos.php';
require_once __DIR__ . '/../../model//ventas/model.ventas.php';

class ProductoController {
    private $model;

    public function __construct() {
        ControlAcceso::verificarAcceso('tendero'); // Se verifica el acceso en el constructor
    }

    public function mostrarFormulario() {
        require_once __DIR__ . '/../../view/ventas/ventas.php';
    }
    
    public function categoria(){
        $database = new Database();
        $db = $database->getConnection();
        
        $categoria = new ModelVentas($db);
        $categorias = $categoria->obtenerCategorias();
    }
}