<?php
session_start();
require_once __DIR__ . '../../auth/permisos.php';

class MenuInventarioController {
    public function __construct() {
        ControlAcceso::verificarAcceso('tendero');  // Verifica permisos
    }

    public function mostrarVista() {
        $vista = '../component/inventario.php'; // Vista por defecto

        if (isset($_GET['ruta']) && ($_GET['ruta'] == 'stock' || $_GET['ruta'] == 'notificaciones')) {
            $vista = $_GET['ruta'] . ".php";
        }

        return $vista;
    }
}