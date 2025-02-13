<?php
session_start();
require_once '../auth/permisos.php';

class MenuInventarioController {
    public function __construct() {
        ControlAcceso::verificarAcceso('tendero');  // Verifica permisos
    }

    public function mostrarVista() {
        include './component/inventario.php'; // Vista por defecto

        if (isset($_GET['ruta']) && ($_GET['ruta'] == 'stock' || $_GET['ruta'] == 'notificaciones')) {
            $vista = $_GET['ruta'] . ".php";
        }

        return $vista;
    }
}