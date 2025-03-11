<?php
session_start();

require_once './auth/autenticacion.php'; // Asegúrate de requerir el modelo correspondiente
require_once './config/conexion.php'; // Incluye la conexión a la base de datos

class UsuariosController {
    private $model;

    public function __construct() {
        $db = new Database(); // Supongo que tienes una clase llamada "Conexion"
        $this->model = new Usuarios($db->getConnection());
    }

    // Método para registrar un usuario
    public function registrarUsuario() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validar los datos recibidos desde el formulario
            if (isset($_POST['nombre_usuario'], $_POST['email'], $_POST['clave'], $_POST['rol'])) {
                $nombre_usuario = htmlspecialchars($_POST['nombre_usuario']);
                $email = htmlspecialchars($_POST['email']);
                $clave = password_hash($_POST['clave'], PASSWORD_DEFAULT); // Encriptamos la clave
                $rol = htmlspecialchars($_POST['rol']);

                // Pasar los valores al modelo
                $this->model->nombre_usuario = $nombre_usuario;
                $this->model->email = $email;
                $this->model->clave = $clave;
                $this->model->rol = $rol;

                // Intentar registrar al usuario
                if ($this->model->registrar()) {
                    echo "Usuario registrado exitosamente.";
                } else {
                    echo "Error al registrar el usuario.";
                }
            } else {
                echo "Todos los campos son obligatorios.";
            }
        } else {
            echo "Método no permitido.";
        }
    }

    // Método para iniciar sesión
    public function loginUsuario() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['email'], $_POST['clave'])) {
                $email = htmlspecialchars($_POST['email']);
                $clave = $_POST['clave'];

                // Pasar los valores al modelo
                $this->model->email = $email;
                $this->model->clave = $clave;

                // Intentar iniciar sesión
                if ($this->model->login()) {
                    session_start();
                    $_SESSION['email'] = $this->model->email;
                    $_SESSION['rol'] = $this->model->rol;

                    if($_SESSION['rol'] == 'admin'){
                        header("location: view/admin/adminMenu.php");
                    } elseif ($_SESSION['rol'] == 'tendero'){
                        header("location: view/mensajero/mensajero.php"); 
                    } elseif ($_SESSION['rol'] == 'mensajero'){
                        header("locatio: view/mensajero/.php");
                    } else {
                    header("location: error.php");
                    }
                }
            }
        }
    }
}
