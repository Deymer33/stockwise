<?php

require_once 'C:\xampp\htdocs\pdo\prueba\auth\permisos.php';

ControlAcceso::verificarAcceso('tendero');
?>

    <div id="container">
        <ul>
            <li><a href="http://localhost/PDO/prueba/view/stock.php">inventario</a></li>
            <li><a href="">entrada de mercancia</a>
            <li><a href="http://localhost/PDO/prueba/view/notificaciones.php">notificaciones</a>
        </ul>
    </div>

