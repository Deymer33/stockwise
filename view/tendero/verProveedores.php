<?php
session_start();
require_once __DIR__ . '/../../controller/verProveedores.controller.php';
$controller = new ControllerVerProveedores();
$proveedores = $controller->verProveedores();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Proveedores</title>
    <link rel="stylesheet" href="../css/verProveedores.css">
</head>
<body>

<div class="admin-container">
    <img src="../imagen/tendero.jpeg" alt="banner">
    <h2>Lista de Proveedores</h2>

    <?php if (count($proveedores) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($proveedores as $proveedor): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($proveedor['nombre_proveedor ']); ?></td>
                        <td><?php echo htmlspecialchars($proveedor['email']); ?></td>
                        <td><?php echo htmlspecialchars($proveedor['telefono']); ?></td>
                        <td><?php echo htmlspecialchars($proveedor['ciudad']); ?></td>
                        <td>
                            <button onclick="location.href='editar_proveedor.php?id=<?php echo urlencode($proveedor['id_proveedor']); ?>'">
                                Editar
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hay proveedores registrados.</p>
    <?php endif; ?>

    <a href="javascript:history.back()">Volver atrás</a>
</div>

</body>
</html>
