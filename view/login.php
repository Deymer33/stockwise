<?php
session_start();

require_once './auth/autenticacion.php';


if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $database = new Database();
    $db = $database->getConnection();

    $user = new Usuarios($db);
    $user->email = $_POST['email'];
    $user->clave = $_POST['clave'];

    if ($user->login()) {
        $_SESSION['email'] = $user->email;
        $_SESSION['roll'] = $user->rol;  // Añadir el rol a la sesión
        
        if ($_SESSION['roll'] == 'admin') {
            header("Location: view/adminMenu.php");//  aqui se debe conectar al archivo adminmenu.php pero aun no he trabajado ese modulo
        } elseif ($_SESSION['roll'] == 'tendero') {
            header("Location: view/menuTendero");
        } else {
            header("Location: view/menuMensajero.php");
        }
        exit();
    } else {
        $error_message = "Nombre de usuario o clave incorrectos.";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="./view/css/login.css">
</head>
<body>

<header>
    <h1>Stock wise</h1>
</header>
    <div>
        <form method="post" action="">
            <label for="email">email:</label><br>
            <input type="text" id="email" name="email" required><br>
            <br>
            <label for="clave">Clave:</label><br>
            <input type="password" id="clave" name="clave" required><br>
            <br>
            <input type="submit" value="Iniciar Sesión">
        </form>
        <?php
            if (!empty($error_message)) {
                echo "<p>$error_message</p>";
            }
         ?>
    </div>
</body>
</html>