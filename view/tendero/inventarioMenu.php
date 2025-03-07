<?php
require_once __DIR__ . '/../../controller/inventario.controller.php';

$controlador = new MenuInventarioController();
$vista = $controlador->mostrarVista();
?>

<div>
    <?php include $vista; ?>
</div>




