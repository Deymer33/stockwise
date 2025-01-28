<?php
require_once 'C:\xampp\htdocs\pdo\prueba\auth\permisos.php';
require_once 'C:\xampp\htdocs\pdo\prueba\model\model.notificaciones.php';

ControlAcceso::verificarAcceso('tendero');


$database = new Database();
$db = $database->getConnection();

$productos = new Notificacion($db);
$total_vencidos = $productos->numeroProductosVencidos();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/PDO/prueba/view/css/notificaciones.css">
    <title>Document</title>
</head>
<body>

<header>

<div class="dropdown">
    <button>Opciones</button>
    <div class="dropdown-options">
        <a href="logout.php">Cerrar Sesión</a>
    </div>
</div>
   
</header>
<div id="container">
    <ul>
        <li><a href="http://localhost/PDO/prueba/view/productosVencidos.php">productos vencidos (<?php echo $total_vencidos; ?>)</a></li>
        <li><a href="#">productos dañados</a>
        <li><a href="#">productos agotados</a>
    </ul>

    <div id="report-buttons">
        <form action="http://localhost/PDO/prueba/view/reporteVencido.php" method="post">
            <input type="submit" value="Generar reporte vencidos">
        </form>

        <form action="http://localhost/PDO/prueba/generarReporteDanados.php" method="post">
            <input type="submit" value="Generar reporte dañados">
        </form>

        <form action="http://localhost/PDO/prueba/generarReporteAgotados.php" method="post">
            <input type="submit" value="Generar reporte agotados">
        </form>
    </div>

</div>
</body>
</html>