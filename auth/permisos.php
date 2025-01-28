<?php

require_once 'autenticacion.php';
require_once 'C:\xampp\htdocs\pdo\prueba\config\conexion.php';

class ControlAcceso {
    public static function verificarAcceso($rolRequerido) {
        // Verificar si ya existe una sesión antes de iniciarla
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
            if (!isset($_SESSION['email'])) {
                header("Location: ../index.php");
                exit();
            }
        
        if (!isset($_SESSION['roll']) || $_SESSION['roll'] !== $rolRequerido) {
            header("Location: error.php");
            exit();
        }
    }
}