<?php

require_once 'C:\xampp\htdocs\pdo\prueba\auth\permisos.php';

ControlAcceso::verificarAcceso('tendero');
?>
<div id="container">
        <ul>
            <li><a href="ventas.php"><p>vender</p></a></li>
            <li><a href="#"><p>provedores</p></a></li>
            <li><a href="menuTendero.php?ruta=inventario">inventario</a></li>
            <li><a href="#"><p>recordatorios</p></a></li>
        </ul>
    </div>