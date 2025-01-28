
<?php
require_once 'C:\xampp\htdocs\pdo\prueba\auth\permisos.php';

ControlAcceso::verificarAcceso('admin');

?>
<!--aun me falta desarrollar la logica de negocio del admin solo tengo resgistro de usuarios -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/PDO/prueba/view/css/menutendero.css">
    <title>admin menu</title>
</head>
<body>
    <header>
    <h1>admin menu</h1>
    </header>
    
<?php
   function vistaAdmin(){
        $url =  $_SERVER['REQUEST_URI'];

     if($url == '/PDO/prueba/view/adminMenu.php'){
        include 'admin.php';

        

    }
   }
   vistaAdmin();
?>


</body>
</html>