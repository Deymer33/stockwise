<?php
//archivo al que son redirigidos si su roll no les permite acceder
// algun archivo por ejemplo si es mensajero no puede registrar 
//usuario porque eso es roll del admin por ende les arrojaria este error
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/PDO/prueba/view/css/error.css">
    <title>Document</title>
</head>
<body>

<header>
<h1>ACCESO DENEGADO</h1>
</header>
<main>
    <div>
        <h2>No puede acceder a esta pagina con tu roll</h2>
    </div>
</main>
   
</body>
</html>