<?php 

require_once '../config/conexion.php';


class Usuarios {

    private $conn;
    private $nombre_tabla = 'usuarios';

    public $nombre_usuario;
    public $clave;
    public $rol;
    public $email;

    public function __construct($db){
        $this->conn = $db;
    }

    public function registrar(){
        $query = "INSERT INTO " . $this->nombre_tabla .  "(nombre_usuario, email, clave, roll) 
          VALUES (:nombre_usuario, :email, :clave, :rol)";

        $stmt = $this->conn->prepare($query);

        $this->nombre_usuario = htmlspecialchars(strip_tags($this->nombre_usuario));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->rol = htmlspecialchars(strip_tags($this->rol));


        $stmt->bindParam(':nombre_usuario', $this->nombre_usuario);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':clave', $this->clave);
        $stmt->bindParam(':rol', $this->rol);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function login() {
        $query = "SELECT email, clave, roll FROM " . $this->nombre_tabla . " WHERE email = :email";
    
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
    

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row && password_verify($this->clave, $row['clave'])) {
                $this->email = $row['email'];
                $this->rol = $row['roll'];
                return true;
            } else {
                echo "Contraseña incorrecta.";
                return false;
            }
        } else {
            echo "No se encontró el usuario.";
            return false;
        }
    }
    
    
}
    