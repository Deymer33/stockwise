<?php
require_once __DIR__ . '../../auth/permisos.php';
require_once __DIR__ . '../../model/model.notificaciones.php'; 

class NotificacionController{

    public function __construct() {
        ControlAcceso::verificarAcceso('tendero');  // Verifica permisos
    }
    
    public function notificacion(){
        $database = new Database();
        $db = $database->getConnection();

        $productos = new NotificacionVencidos($db);
        $total_vencidos = $productos->numeroProductosVencidos();
        return $total_vencidos;
    }

}