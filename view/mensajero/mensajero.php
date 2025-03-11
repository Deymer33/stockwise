<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control de Entregas</title>
    <link rel="stylesheet" href="../css/mensajero.css">
</head>
<body>
    <header>
        <h1>Panel de Control de Entregas</h1>
        <a href="../../logout.php" class="logout-btn">Cerrar sesión</a>
    </header>
    <nav>
        <ul>
            <li><a href="#entregas">Entregas</a></li>
            <li><a href="#finanzas">Finanzas</a></li>
            <li><a href="#configuracion">Configuración</a></li>
        </ul>
    </nav>
    <main>
        <section id="entregas">
            <h2>Entregas</h2>
            <div>
                <h3>Entregas Realizadas</h3>
                <ul>
                    <?php foreach ($entregasRealizadas as $entrega): ?>
                        <li><?= htmlspecialchars($entrega['descripcion']) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div>
                <h3>Entregas Pendientes</h3>
                <ul>
                    <?php foreach ($entregasPendientes as $entrega): ?>
                        <li><?= htmlspecialchars($entrega['descripcion']) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div>
                <h3>Entregas No Completadas</h3>
                <ul>
                    <?php foreach ($entregasNoCompletadas as $entrega): ?>
                        <li><?= htmlspecialchars($entrega['descripcion']) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>

        <section id="finanzas">
            <h2>Finanzas</h2>
            <p>Dinero de Base: <span><?= htmlspecialchars($finanzas['dinero_base'] ?? '0.00') ?></span></p>
            <p>Dinero Recibido: <span><?= htmlspecialchars($finanzas['dinero_recibido'] ?? '0.00') ?></span></p>
            <p>Dinero Devuelto: <span><?= htmlspecialchars($finanzas['dinero_devuelto'] ?? '0.00') ?></span></p>
            <p>Ganancias Totales: <span><?= htmlspecialchars($finanzas['ganancias_totales'] ?? '0.00') ?></span></p>
        </section>

        <section id="configuracion">
            <h2>Configuración</h2>
            <a href="../../editar_perfil.php" class="btn-editar">Editar Perfil</a>
        </section>
    </main>
    <footer>
        <p>&copy; <?= date("Y") ?> Panel de Control de Entregas</p>
    </footer>
</body>
</html>
