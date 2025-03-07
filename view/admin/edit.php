<?php
require_once 'C:\xampp\htdocs\pdo\prueba\auth\permisos.php';
ControlAcceso::verificarAcceso('tendero');

$database = new Database();
$db = $database->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accion = $_POST['accion'] ?? '';
    $id_product = $_POST['id_product'] ?? null;
    $nombre_producto = $_POST['nombre_producto'] ?? '';
    $tipo = $_POST['tipo'] ?? '';
    $valor_unt = $_POST['valor_unt'] ?? '';
    $fecha_v = $_POST['fecha_v'] ?? '';
    $id_categoria = $_POST['id_categoria'] ?? '';

    if ($accion === 'insertar') {
        //nuevo producto
        try {
            $query = "INSERT INTO productos (nombre_producto, tipo, valor_unt, fecha_v, id_categoria) 
                      VALUES (:nombre_producto, :tipo, :valor_unt, :fecha_v, :id_categoria)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':nombre_producto', $nombre_producto);
            $stmt->bindParam(':tipo', $tipo);
            $stmt->bindParam(':valor_unt', $valor_unt);
            $stmt->bindParam(':fecha_v', $fecha_v);
            $stmt->bindParam(':id_categoria', $id_categoria);

            if ($stmt->execute()) {
                header("Location: ventas.php?message=Producto creado satisfactoriamente.");
                exit;
            } else {
                echo "<div class='message-container'>Error al crear el producto.</div>";
            }
        } catch (PDOException $e) {
            echo "<div class='message-container'>Error: " . $e->getMessage() . "</div>";
        }
    } elseif ($accion === 'actualizar' && $id_productos) {
        //actualización de un producto 
        try {
            $query = "UPDATE productos SET nombre_producto = :nombre_producto, tipo = :tipo, 
          valor_unt = :valor_unt, fecha_v = :fecha_v, id_categoria = :id_categoria 
          WHERE id_productos = :id_productos";

            $stmt->bindParam(':nombre_producto', $nombre_producto);
            $stmt->bindParam(':tipo', $tipo);
            $stmt->bindParam(':valor_unt', $valor_unt);
            $stmt->bindParam(':fecha_v', $fecha_v);
            $stmt->bindParam(':id_categoria', $id_categoria);
            $stmt->bindParam(':id_productos', $id_productos, PDO::PARAM_INT);


            if ($stmt->execute()) {
                header("Location: ventas.php?message=Producto actualizado satisfactoriamente.");
                exit;
            } else {
                echo "<div class='message-container'>Error al actualizar el producto.</div>";
            }
        } catch (PDOException $e) {
            echo "<div class='message-container'>Error: " . $e->getMessage() . "</div>";
        }
    } else {
        echo "<div class='message-container'>Acción no válida o falta de ID de producto.</div>";
    }
}
?>







