<?php
session_start();
require_once __DIR__ . '/../../auth/permisos.php';
ControlAcceso::verificarAcceso('admin');
?>
<!--aun me falta desarrollar la logica de negocio del admin solo tengo resgistro de usuarios -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/menuTendero.css">
    <title>admin menu</title>
</head>
<body>
    <header>
    <h1>admin menu</h1>
    </header>
    
<?php
   function vistaAdmin(){
        $url =  $_SERVER['REQUEST_URI'];

     if($url == '/stockwise/view/admin/adminMenu.php'){
        include 'admin.php';

    }
   }
   vistaAdmin();
?>


</body>
</html>