<?php
 require_once __DIR__ . '/../../controller/agregarProveedor.controller.php'; 
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Proveedores</title>
    <link rel="stylesheet" href="../css/agregarProveedor.css">
</head>
<body>
<div class="form-container">
    <img src="../img/tendero.jpeg" alt="banner">
    
    <?php if ($mensaje): ?>
        <p style="color: <?php echo isset($mensaje['error']) ? 'red' : 'green'; ?>;">
            <?php echo isset($mensaje['error']) ? $mensaje['error'] : $mensaje['success']; ?>
        </p>
    <?php endif; ?>

    <form method="POST">
        Nombre: <input type="text" name="nombre" required><br>
        Email: <input type="email" name="email" required><br>
        Teléfono: <input type="text" name="telefono" required><br>
        Dirección: <input type="text" name="ciudad" required><br>
        <input type="submit" value="Agregar Proveedor">
    </form>
    
    <p><a href="javascript:history.back()">Volver atrás</a></p>    
</div>
</body>
</html>
