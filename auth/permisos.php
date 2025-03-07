<?php
session_start();
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
        
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== $rolRequerido) {
            header("Location: error.php");
            exit();
        }
    }
}