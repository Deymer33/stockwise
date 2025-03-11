<?php

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrada de Mercancía</title>
    <link rel="stylesheet" type="text/css" href="../css/entradaMercancia.css">
</head>
<body>

<div class="form-container">
    <h2>Registro de Entrada de Mercancía</h2>
    
    <form method="POST" action="../controllers/MercanciaController.php">
        <label for="nombre_producto">Nombre del Producto:</label>
        <input type="text" id="nombre_producto" name="nombre_producto" required>

        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" required min="1">

        <label for="tipo">Tipo:</label>
        <select id="tipo" name="tipo" required>
            <option value="kg">Kilogramos (kg)</option>
            <option value="und">Unidades (und)</option>
            <option value="lt">Litros (lt)</option>
        </select>

        <label for="valor_unitario">Valor Unitario:</label>
        <input type="number" id="valor_unitario" name="valor_unitario" required min="0.01" step="0.01">

        <label for="fecha_vencimiento">Fecha de Vencimiento:</label>
        <input type="date" id="fecha_vencimiento" name="fecha_vencimiento">

        <label for="proveedor">Proveedor:</label>
        <select id="proveedor" name="proveedor" required>
            <option value="">Seleccione un proveedor</option>
            <?php foreach ($proveedores as $proveedor): ?>
                <option value="<?= htmlspecialchars($proveedor['id']) ?>"><?= htmlspecialchars($proveedor['nombre']) ?></option>
            <?php endforeach; ?>
        </select>

        <label for="categoria">Categoría:</label>
        <select id="categoria" name="categoria" required>
            <option value="">Seleccione una categoría</option>
            <?php foreach ($categorias as $categoria): ?>
                <option value="<?= htmlspecialchars($categoria['id']) ?>"><?= htmlspecialchars($categoria['nombre']) ?></option>
            <?php endforeach; ?>
        </select>

        <input type="submit" value="Registrar Entrada">
    </form>

    <p><a href="javascript:history.back()">Volver atrás</a></p>    
</div>

</body>
</html>
