<?php
require_once __DIR__ . '/../../config/conexion.php';

class ModelMensajero {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Obtener entregas por estado
    public function obtenerEntregas($estado) {
        $sql = 'SELECT id, descripcion FROM entregas WHERE estado = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$estado]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener finanzas del mensajero
    public function obtenerFinanzas() {
        $sql = 'SELECT dinero_base, dinero_recibido, dinero_devuelto, ganancias_totales FROM finanzas WHERE id_mensajero = 1';
        $stmt = $this->conn->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
