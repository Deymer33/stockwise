<?php
require_once __DIR__ . '/../../controller/Ventas/ventas.Controller.php';

$controller = new ProductoController();
$categorias = $controller->categoria();

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario de Productos</title>
    <link rel="stylesheet" href="../css/ventas.css"> 
</head>

<body>
    <div class="header">
        <h1>Ventas</h1>
    </div>

    <div class="subheader">
        <h4>Seleccione el producto que va a agregar</h4>
    </div>

    <div class="group">
        <div class="col-md-8">
            <div class="form-group" id="fromgroup">
                <form method="post" action="edit.php">
                    <div class="form-group">
                        <label for="id_categoria">Categoría</label>
                        <select id="id_categoria" name="id_categoria" required>      
                            <?php foreach ($categorias as $categoria): ?>
                            <option value="<?= htmlspecialchars($categoria['id_categoria']). htmlspecialchars($categoria['nombre_categoria']) ?>">

                            </option>
                        <?php endforeach; ?>
                        </select>
                    </div>

                    <input type="hidden" name="id_productos" id="id_productos">
                    <input type="hidden" name="accion" id="accion" value="insertar">

                    <div class="form-group">
                        <label for="nombre_producto">Nombre del Producto</label>
                        <input type="text" id="nombre_producto" name="nombre_producto" required placeholder="Ingrese el nombre del producto">
                    </div>
                    <div class="form-group">
                        <label for="tipo">Unidad de Medida</label>
                        <input type="text" id="tipo" name="tipo" required placeholder="Ingrese la unidad de medida">
                    </div>
                    <div class="form-group">
                        <label for="valor_unt">Precio</label>
                        <input type="number" id="valor_unt" name="valor_unt" required placeholder="Ingrese el precio">
                    </div>
                    <div class="form-group">
                        <label for="fecha_v">Fecha Límite</label>
                        <input type="date" id="fecha_v" name="fecha_v" required>
                    </div>

                    <button type="submit" class="btn btn-accept">Aceptar</button>
                </form>
            </div>
        </div>

        <?php require_once "edit.php"; ?>
        <?php require_once "lista.php"; ?>

        <?php if (isset($_GET['message'])): ?>
             <div class="message-container"><?= htmlspecialchars($_GET['message']) ?></div>
        <?php endif; ?>
    </div>

    <script>
    function mostrarLista() {
        const lista = document.getElementById('product-list');
        lista.style.display = lista.style.display === 'none' ? 'block' : 'none';
    }
    </script>

</body>
</html>
