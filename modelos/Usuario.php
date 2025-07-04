<?php

require_once "Conn.php";

class Usuario{

    public $username;
    public $email;
    public $password;

    public function __construct(){

    }
    
    public function guardar(String $username, String $email, String $password){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO usuario(username, email, password) 
        VALUES('$username', '$email', '$password')";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }


    public function validarUsuario(String $username, String $password){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM usuario WHERE username = '$username'";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }
    
}