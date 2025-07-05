<?php

require_once "Conn.php";

class Cliente{
    private $nombre;
    private $telefono;

    public function __construct(){}

    public function mostrarCli(){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM cliente";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function guardarCli($nombre, $telefono){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO cliente(nombre, telefono) 
        VALUES('$nombre', '$telefono')";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function buscarCli(int $id){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM cliente WHERE id=$id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function eliminar($id){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "DELETE FROM cliente WHERE id=$id";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function actualizarCli($nombre, $telefono, $id){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "UPDATE cliente SET nombre='$nombre', telefono='$telefono' WHERE id=$id";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }
}