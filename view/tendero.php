<?php
require_once '../auth/permisos.php';
ControlAcceso::verificarAcceso('admin');

?>
<div id="container">
        <ul>
            <li><a href="ventas.php"><p>vender</p></a></li>
            <li><a href="#"><p>provedores</p></a></li>
            <li><a href="menuTendero.php?ruta=inventario">inventario</a></li>
            <li><a href="#"><p>recordatorios</p></a></li>
        </ul>
    </div>
