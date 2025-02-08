<?php
require_once '../auth/permisos.php';
ControlAcceso::verificarAcceso('tendero');

?>

<div id="container">
    <ul>
        <li><a href="/stockwise/view/stock.php">inventario</a></li>
        <li><a href="">entrada de mercancia</a>
        <li><a href="/stockwise/view/notificaciones.php">notificaciones</a>
    </ul>
</div>



