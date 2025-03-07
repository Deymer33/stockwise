<?php
session_start();
if (!isset($_SESSION['nombre'])) {
    header('Location: login.php');
    exit;   
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial de Entregas</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="admin-container">
        <h1>Historial de Entregas</h1>

        <?php if (count($historial) > 0): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Dirección</th>
                        <th>Estado</th>
                        <th>Cliente</th>
                        <th>Descripción</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($historial as $row): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row["fecha_entrega"]); ?></td>
                            <td><?php echo htmlspecialchars($row["direccion"]); ?></td>
                            <td><?php echo htmlspecialchars($row["estado"]); ?></td>
                            <td><?php echo htmlspecialchars($row["nombre_cliente"]); ?></td>
                            <td><?php echo htmlspecialchars($row["descripcion"]); ?></td>
                            <td><?php echo htmlspecialchars($row["producto"]); ?></td>
                            <td><?php echo htmlspecialchars($row["cantidad"]); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay entregas registradas.</p>
        <?php endif; ?>

        <p><a href="javascript:history.back()">Volver atrás</a></p>    
    </div>
</body>
</html>
