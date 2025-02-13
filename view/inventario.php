<?php
require_once '../controller/inventario.controller.php';

$controlador = new MenuInventarioController();
$vista = $controlador->mostrarVista();
?>

<div>
    <?php include $vista; ?>
</div>




