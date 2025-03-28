<?php
session_start();
require_once __DIR__ . '/../../controller/productosVencidos.controller.php';



$productos = new ProductosVencidosController();

$productos_vencidos = $productos->reporteVencido();


$fecha_creacion = date("d/m/Y"); 
$nombre_usuario = $_SESSION['email'];


ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reporteVencido.css">
    <title>Reporte de Productos Vencidos</title>
</head>
<body>
<header>
        <h1>Stockwise <br> Reporte de productos vencidos </h1>
    </header>

    <div class="report-info">
        <p><strong>Fecha de creación:</strong> <?php echo $fecha_creacion; ?></p>
        <p><strong>Generado por:</strong> <?php echo htmlspecialchars($nombre_usuario); ?></p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nombre del Producto</th>
                <th>Cantidad vencida</th>
                <th>Valor Unitario</th>
                <th>Fecha de Vencimiento</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach($productos_vencidos as $producto): ?>
                <tr>
                <td><?php echo htmlspecialchars($producto['nombre_producto']); ?></td>
                <td><?php echo htmlspecialchars($producto['cantidad']).''.htmlspecialchars($producto['tipo']); ?></td>
                <td><?php echo htmlspecialchars($producto['valor_unt']); ?></td>
                <td><?php echo htmlspecialchars($producto['fecha_v']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

<?php
$html = ob_get_clean();
//echo $html;
 
require_once __DIR__ . '/../../lib/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);

$dompdf->setPaper('letter');
$dompdf->render();

$dompdf->stream("archivo_.pdf", array("Attachment"=> false));
?>
