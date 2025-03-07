<?php
session_start();
require_once __DIR__ . '../../auth/permisos.php';

class MenuTenderoController {
    public function __construct() {
        ControlAcceso::verificarAcceso('tendero');  // Verifica permisos
    }

    public function mostrarVista() {
        $vista = 'tendero.php';  // Vista por defecto

        if (isset($_GET['ruta']) && ($_GET['ruta'] == 'inventarioMenu' || $_GET['ruta'] == 'ventas')) {
            $vista = $_GET['ruta'] . ".php";
        }

        return $vista;
    }
}