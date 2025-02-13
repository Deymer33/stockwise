<?php 
session_start();
require_once "./controller/login.controller.php";
require_once "./controller/autenticacion.controller.php";


$login = new CargarLogin();
$login-> cargarLogin();



$controller = new UsuariosController();

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'registrar':
            $controller->registrarUsuario();
            break;
        case 'login':
            $controller->loginUsuario();
            break;
        default:
            echo "Acción no válida.";
    }
} else {
    echo "No se especificó ninguna acción.";
}
