<?php
require_once 'C:\xampp\htdocs\pdo\prueba\auth\permisos.php';
ControlAcceso::verificarAcceso('tendero');

$database = new Database();
$db = $database->getConnection();
?>
    
<div class="row">
    <div class="btn-container">
        <button type="button" class="btn-accept" onclick="mostrarLista()">Lista</button>    
        <div class="col-md-12" id="product-list" style="display:none;">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nombre del Producto</th>
                        <th>Unidad de Medida</th>
                        <th>Precio</th>
                        <th>Fecha Límite</th>
                        <th>Categoría</th> 
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $stmt = $db->query('SELECT p.id_product, p.nombre_producto, p.tipo, p.valor_unt, p.fecha_v, c.nombre_categoria 
                                                   FROM productos p 
                                                   JOIN categorias c ON p.id_categoria = c.id_categoria;');
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['nombre_producto']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['tipo']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['valor_unt']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['fecha_v']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['nombre_categoria']) . "</td>"; 
                            echo "<td>
                                    <a href='update.php?id_product=" . $row['id_product'] . "' class='btn btn-danger'>Editar</a>
                                    <a href='delete.php?id_product=" . $row["id_product"] . "' class='btn btn-danger' onclick=\"return confirm('¿Estás seguro de que deseas eliminar este producto?');\">Eliminar</a>
                                  </td>";
                            echo "</tr>";
                        }
                    } catch (PDOException $e) {
                        echo "<tr><td colspan='6'>Error: " . $e->getMessage() . "</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


