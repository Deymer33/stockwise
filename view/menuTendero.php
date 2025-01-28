<?php
require_once 'C:\xampp\htdocs\pdo\prueba\auth\permisos.php';
// Verificar acceso de tendero
ControlAcceso::verificarAcceso('tendero');
?>
<!--- en este archivo se conecta el modulo de proveedores y el de salida de mercancias-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/PDO/prueba/view/css/menutendero.css">
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
    
    if($url == '/PDO/prueba/view/menuTendero.php'){
        include "tendero.php";

        }if (isset($_GET['ruta']) && ($_GET['ruta'] == 'inventario' || $_GET['ruta'] == 'vender')) {
        include $_GET['ruta'] . ".php";
            
     }
 }


vistaMenu();

?>
</body>
</html>