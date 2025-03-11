<?php
 require_once __DIR__ . '/../../controller/eliminarProveedor.controller.php'; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/eliminarProveedor.css">
    <title>Eliminar Proveedor</title>
    <script>
        function confirmDeletion() {
            return confirm("¿Estás seguro de que deseas eliminar este proveedor?");
        }
    </script>
</head>
<body>
    <div class="form-container">
        <h2>Stockwise</h2>
        <h1>Eliminar Proveedor</h1>
        <form method="POST" action="" onsubmit="return confirmDeletion();">
            <label for="nombre_proveedor">Nombre del Proveedor</label>
            <input type="text" id="nombre_proveedor" name="nombre_proveedor" required>
            <br>
            <input type="submit" value="Eliminar Proveedor">
        </form>
        <p><a href="javascript:history.back()">Volver atrás</a></p>    

        <?php if (!empty($_SESSION['error'])): ?>
            <p style="color:red;"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
        <?php endif; ?>

        <?php if (!empty($_SESSION['success'])): ?>
            <p style="color:green;"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></p>
        <?php endif; ?>
        
        <h2>Lista de Proveedores</h2>
        <table>
            <tr>
                <th>Nombre</th>
            </tr>
            <?php foreach ($proveedores as $proveedor): ?>
            <tr>
                <td><?= htmlspecialchars($proveedor['nombre']) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <br>
    </div>
</body>
</html>
