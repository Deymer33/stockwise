<?php

require_once '../config/conexion.php';

Class ListaUsuarios {

    private $conn;

    public function __construct($db){
        $this->conn = $db;

        
    }
    public function lista(){
        $usuarios = " SELECT id, nombre_usuario, email, roll FROM usuarios";
        $stmt_usuarios = $this->conn->prepare($usuarios);
        $stmt_usuarios->execute();
        return $stmt_usuarios->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminar($idUsuario){
        $borrar = "DELETE FROM usuarios WHERE id = :id";
    
        $stmt_borrar = $this->conn->prepare($borrar);
        $stmt_borrar->bindParam(':id', $idUsuario, PDO::PARAM_INT);
        $stmt_borrar->execute();
    }

}


?>