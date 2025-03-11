<?php
require_once __DIR__ . '/../../auth/permisos.php';
require_once __DIR__ . '/../../model/Mensajero/mensajero.php';

class MensajeroController {
    private $model;

    public function __construct() {
        ControlAcceso::verificarAcceso('mensajero');
        $database = new Database();
        $db = $database->getConnection();
        $this->model = new ModelMensajero($db);
    }

    public function mostrarPanel() {
        $entregasRealizadas = $this->model->obtenerEntregas('realizada');
        $entregasPendientes = $this->model->obtenerEntregas('pendiente');
        $entregasNoCompletadas = $this->model->obtenerEntregas('no completada');
        $finanzas = $this->model->obtenerFinanzas();

        require_once __DIR__ . '/../../view/mensajero/mensajero.php';
    }
}
