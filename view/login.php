
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
        <form method="POST" action="index.php?action=login">
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