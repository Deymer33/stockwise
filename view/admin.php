<?php
session_start();
require_once '../auth/permisos.php';
ControlAcceso::verificarAcceso('admin');
?>

<div class="admin-menu">
        <h2>Menú de Administración</h2>
        <ul>
            <li><a href="registro.php">Registrar Usuarios</a></li>
            <li><a href="eliminarUsuarios.php">Eliminar Usuarios</a></li>
            <li><a href="#eliminar-proveedor">Eliminar Proveedor</a></li>
            <li><a href="#cambiar-clave">Cambiar Clave de Usuario</a></li>
        </ul>
    </div>