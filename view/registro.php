<?php 
session_start();
require_once '../auth/permisos.php';
ControlAcceso::verificarAcceso('admin');
require_once '../auth/autenticacion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $database = new Database();
    $db = $database->getConnection();

$usuario = new Usuarios($db);

    if (isset($usuario)) {
        if (!empty($_POST['nombre_usuario']) && !empty($_POST['email']) && !empty($_POST['clave']) && !empty($_POST['rol'])) {
            $usuario->nombre_usuario = $_POST['nombre_usuario'];
            $usuario->email = $_POST['email'];
            $usuario->clave = password_hash($_POST['clave'], PASSWORD_BCRYPT); // Encriptar la contraseña
            $usuario->rol = $_POST['rol'];

            if ($usuario->registrar()) {
                echo "Usuario registrado correctamente.";
            } else {
                echo "Error al registrar el usuario.";
            }
        } else {
            echo "Todos los campos son obligatorios.";
        }
    } else {
        echo "Error: No se pudo crear la instancia de usuario.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Registro</title>
</head>
<body>

    <header>
        <h1>registro</h1>
    </header>

    <div>
    <form method="POST" action="">
        <label for="nombre_usuario">Nombre de Usuario</label><br>
        <input type="text" id="nombre_usuario" name="nombre_usuario" required>
        <br>
        <label for="email">correo</label><br>
            <input type="email" id="correo" name="email" required>
        <br>
        <label for="contrasena">contraseña</label><br>
            <input type="password" id="clave" name="clave" require>
        <br>
        <label for="rol">Rol</label>
        <select name="rol" id="rol">
            <option value="admin">admin</option>
            <option value="tendero">tendero</option>
            <option value="mensajero">mensajero</option>
        </select>
    <br>
    <input type="submit" value="Registrar Usuario">
    </form>
    </div>

</body>
</html>