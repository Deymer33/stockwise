<?php
session_start();
require_once __DIR__ . '/../../controller/menuTendero.controller.php';

?>
<div id="container">
        <ul>
            <li><a href="ventas.php"><p>vender</p></a></li>
            <li><a href="#"><p>provedores</p></a></li>
            <li><a href="menuTendero.php?ruta=inventarioMenu">inventario</a></li>
            <li><a href="#"><p>recordatorios</p></a></li>
        </ul>
    </div>
