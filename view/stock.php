<?php
require_once '../auth/permisos.php';
ControlAcceso::verificarAcceso('admin');
require_once '../model/model.stock.php'; // Incluye el modelo

// Obtener la conexión a la base de datos
$database = new Database();
$db = $database->getConnection();

// Instanciar el modelo Producto
$productoModel = new Producto($db);

// Obtener los productos
$productos = $productoModel->obtenerProductos();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/productosVencidos.css">
    <title>inventario</title>
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

<div id="container">
    <input type="text" class="busqueda" placeholder="buscar" id="busca">
    <button class="button" type="submit" id="" >buscar</button>  
</div>

    <div id="tabla">
        <table id="productos-table">
            <thead>
                <th>nombre</th>
                <th>descripcion</th>
                <th>stock</th>
            </thead>
            <tbody>
                <?php foreach($productos as $item):?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['nombre_producto']); ?></td>
                        <td>precio: <?php echo htmlspecialchars($item['valor_unt']) . '<br> fecha de vencimiento:' . 
                                       htmlspecialchars($item['fecha_v']) . '<br> provedor: ' . 
                                       htmlspecialchars($item['nombre_proveedor']); ?></td>
                        <td class="cantidad"><?php echo htmlspecialchars($item['cantidad']) . ' '.
                                       htmlspecialchars($item['tipo']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>  

    <script src="./script.js"></script>

</body>
</html>                                     