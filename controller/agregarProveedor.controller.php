<?php
session_start();
require_once __DIR__ . '../../auth/permisos.php';
require_once __DIR__ . '/../model/model.agregarProveedor.php';

$autenticacion = new ControlAcceso();
$roll = $autenticacion->verificarAcceso('tendero');


class ProveedorController {
    private $model;

    public function __construct() {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $this->model = new Proveedor($db);
    }

    public function agregarProveedor($nombre, $email, $telefono, $direccion) {
        if ($this->model->verificarProveedor($nombre, $email)) {
            return ['error' => 'El proveedor ya se encuentra registrado.'];
        }

        if ($this->model->agregarProveedor($nombre, $direccion, $telefono, $email)) {
            return ['success' => 'Proveedor agregado con éxito.'];
        } else {
            return ['error' => 'Error al agregar el proveedor.'];
        }
    }
}

$mensaje = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new ProveedorController();
    $mensaje = $controller->agregarProveedor($_POST['nombre'], $_POST['email'], $_POST['telefono'], $_POST['ciudad']);
}
?>
