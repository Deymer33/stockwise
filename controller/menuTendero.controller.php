<?php
session_start();
require_once '../auth/permisos.php';

class MenuTenderoController {
    public function __construct() {
        ControlAcceso::verificarAcceso('tendero');  // Verifica permisos
    }

    public function mostrarVista() {
        $vista = 'tendero.php';  // Vista por defecto

        if (isset($_GET['ruta']) && ($_GET['ruta'] == 'inventario' || $_GET['ruta'] == 'ventas')) {
            $vista = $_GET['ruta'] . ".php";
        }

        return $vista;
    }
}