<?php

require_once "Conn.php";

class Usuario{
    private $username;
    private $password;
    private $email;

    public function __construct(){}

    public function guardarUs($username, $password, $email){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO usuario(username, password, email) 
        VALUES('$username', '$password', '$email')";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function buscarPorUsername(int $username){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM usuario WHERE username=$username";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }
}