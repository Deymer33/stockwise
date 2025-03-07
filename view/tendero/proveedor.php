<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedor</title>
    <link rel="stylesheet" type="text/css" href="../css/proveedor.css">
</head>
<body>
    <div class="admin-container">
        <img src="../img/proveedor.jpeg" alt="banner de proveedor">
        <form action="proveedor.php" method="post">
        
            <h1>Bienvenido, <?php echo $_SESSION['email']; ?>!</h1>
            <p>Usted acaba de ingresar con funciones de proveedor:</p>

            <div class="options">
    <h2>Opciones para el proveedor</h2>
    <ul>
        <li><a href="../gestiones/ver_pedidos_despacho.php">Ver pedidos para despachar</a></li>
        <li><a href="../gestiones/historal_entregas.php">Historial de Entregas</a></li>
        <li><a href="../gestiones/actualizar_datos.php">Actualizar Mis Datos</a></li>
        </ul>
    <p><a href="logout.php">Cerrar sesión</a></p>
</div>

            <?php
            if (!empty($_SESSION['success'])) {
                echo "<p style='color:green;'>" . htmlspecialchars($_SESSION['success']) . "</p>";
                unset($_SESSION['success']);
            }
            ?>
        </form>
    </div>
</body>
</html>