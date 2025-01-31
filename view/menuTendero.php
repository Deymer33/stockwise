<?php
session_start();
require_once '../auth/permisos.php';
ControlAcceso::verificarAcceso('admin');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/menuTendero.css">
    <title>menu tendenero</title>
</head>
<body>
<header>

    <div class="dropdown">
        <button>menu</button>
            <div class="dropdown-options">
                <a href="logout.php">Cerrar Sesión</a>
            </div>
    </div>
    </header>

<?php
 function vistaMenu(){

    $url = $_SERVER['REQUEST_URI'];
    
    if($url == '/stockwise/view/menuTendero.php'){

        include "./tendero.php";

        }if (isset($_GET['ruta']) && ($_GET['ruta'] == 'inventario' || $_GET['ruta'] == 'vender')) {
        include $_GET['ruta'] . ".php";
            
     }
 }


vistaMenu();

?>
</div>

</body>
</html>