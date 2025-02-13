
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
    <form method="POST" action="index.php?action=registrar">
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