<?php
session_start();
require_once __DIR__ . '/../../controller/menuTendero.controller.php';

$controlador = new MenuTenderoController();
$vista = $controlador->mostrarVista();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/menuTendero.css">
    <title>menu tendenero</title>
</head>
<body>
<header>
    <div class="dropdown">
        <button>menu</button>
            <div class="dropdown-options">
                <a href="../logout.php">Cerrar Sesión</a>
            </div>
    </div>
</header>

<div>
    <?php include $vista; ?>
</div>


</body>
</html>