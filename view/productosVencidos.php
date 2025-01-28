<?php
require_once 'C:\xampp\htdocs\pdo\prueba\auth\permisos.php';
require_once 'C:\xampp\htdocs\pdo\prueba\model\model.productosVencidos.php';

ControlAcceso::verificarAcceso('tendero');

$database = new Database();
$db = $database->getConnection();

// Consulta para obtener los productos vencidos
$productos = new Exprirados($db);

$productos_vencidos = $productos->productosVencidos();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/PDO/prueba/view/css/productosVencidos.css">
    <title>Productos Vencidos</title>
</head>
<body>

<header>

    <div class="dropdown">
        <button>menu</button>
            <div class="dropdown-options">
                <a href="logout.php">Cerrar Sesión</a>
            </div>
    </div>
     
</header>

<h1>Lista de Productos Vencidos</h1>
<table >
    <thead>
        <tr>
            <th>Nombre del Producto</th>
            <th>Cantidad</th>
            <th>Valor Unitario</th>
            <th>Fecha de Vencimiento</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($productos_vencidos as $producto): ?>
            <tr>
                <td><?php echo htmlspecialchars($producto['nombre_producto']); ?></td>
                <td><?php echo htmlspecialchars($producto['cantidad']).''.htmlspecialchars($producto['tipo']); ?></td>
                <td><?php echo htmlspecialchars($producto['valor_unt']); ?></td>
                <td><?php echo htmlspecialchars($producto['fecha_v']); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
