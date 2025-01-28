<?php
require_once 'C:\xampp\htdocs\pdo\prueba\config\conexion.php';

$database = new Database();
$db = $database->getConnection();

$id_productos = $_GET['id_product'] ?? '';

try {
    $sql = "DELETE FROM productos WHERE id_product = :id_product";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id_product', $id_product, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: ventas.php?message=Producto eliminado correctamente.");
    } else {
        header("Location: ventas.php?error=Error al eliminar el producto.");
    }
    exit; 
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

