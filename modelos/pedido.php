<?php

require_once "Conn.php";

class Pedido{
    private $fecha;
    private $estado;

    public function __construct(){}

    public function mostrarPed(){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM pedido";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function guardarPed($nombre, $estado, $cliente_id){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO pedido(fecha, estado, cliente_id) 
        VALUES('$nombre', '$estado', '$cliente_id')";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function buscarPed(int $id){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM pedido WHERE id=$id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function actualizarPed($estado, $id){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "UPDATE pedido SET estado='$estado' WHERE id=$id";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }
}