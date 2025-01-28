<?php 
require_once 'C:\xampp\htdocs\pdo\prueba\model\model.eliminarUsuarios.php';
require_once 'C:\xampp\htdocs\pdo\prueba\auth\permisos.php';

ControlAcceso::verificarAcceso('admin');

$database = new Database();
$db = $database->getConnection();

$eliminar = new ListaUsuarios($db);

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar_usuario'])) {
    $idUsuario = $_POST['id_usuario'];
    $eliminar->eliminar($idUsuario); // Llama al método eliminar pasando el ID
    // Redirige para actualizar la lista y evitar reenvíos del formulario
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

$lista = $eliminar->lista();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/PDO/prueba/view/css/eliminarUsuarios.css">
    <title>eliminar usuarios</title>
</head>
<body>

<header>
    <h1>Stock wise </h1>
</header>

<table>
   <thead>
    <tr>
        <th>ID  nombre</th>
        <th>correo</th>
        <th>roll</th>
        <th>opciones</th>
    </tr>
    <tbody>
    <?php foreach($lista as $eliminar): ?>
    <tr>
        <td><?php echo htmlspecialchars($eliminar['id']) ." " . htmlspecialchars($eliminar['nombre_usuario']); ?></td>
        <td><?php echo htmlspecialchars($eliminar['email']);?></td>
        <td><?php echo htmlspecialchars($eliminar['roll']);?></td>
        <td>
            <form method="POST" action="">
                <input type="hidden" name="id_usuario" value="<?php echo htmlspecialchars($eliminar['id']); ?>">
                <input type="submit" name="eliminar_usuario" value="Eliminar Usuario">
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</tbody>

   </thead>
</table>

    
</body>
</html>

