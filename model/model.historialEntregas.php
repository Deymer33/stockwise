<?php
require_once '../usuarios/conexion.php';

class HistorialModelo {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function registrarEntrega($direccion, $estado, $nombre_cliente, $descripcion) {
        $fecha_entrega = date("Y-m-d H:i:s");

        // Evitar inyección de código
        $direccion = htmlspecialchars($direccion);
        $estado = htmlspecialchars($estado);
        $nombre_cliente = htmlspecialchars($nombre_cliente);
        $descripcion = htmlspecialchars($descripcion);

        $stmt = $this->conn->prepare("INSERT INTO historial_entregas (fecha_entrega, direccion, estado, nombre_cliente, descripcion) VALUES (?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $fecha_entrega);
        $stmt->bindParam(2, $direccion);
        $stmt->bindParam(3, $estado);
        $stmt->bindParam(4, $nombre_cliente);
        $stmt->bindParam(5, $descripcion);

        return $stmt->execute();
    }

    public function obtenerHistorial() {
        $sql = "SELECT he.fecha_entrega, he.direccion, he.estado, he.nombre_cliente, he.descripcion, p.producto, p.cantidad 
                FROM historial_entregas he 
                JOIN pedidos p ON he.nombre_cliente = p.nombre_cliente 
                ORDER BY he.fecha_entrega DESC";

        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
