<?php
session_start();
require_once '../usuarios/conexion.php';
require_once '../modelo/historialModelo.php';

if (!isset($_SESSION['nombre'])) {
    header('Location: login.php');
    exit;
}

$historialModelo = new HistorialModelo($conn);

// Si se recibe un formulario, procesamos los datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $direccion = $_POST['direccion'];
    $estado = $_POST['estado'];
    $nombre_cliente = $_POST['nombre_cliente'];
    $descripcion = $_POST['descripcion'];

    if ($historialModelo->registrarEntrega($direccion, $estado, $nombre_cliente, $descripcion)) {
        $_SESSION['success'] = "Entrega registrada correctamente.";
    } else {
        $_SESSION['error'] = "Error al registrar la entrega.";
    }
}

// Obtener historial de entregas
$historial = $historialModelo->obtenerHistorial();

// Cargar la vista
require_once '../view/historialVista.php';
?>
