<?php

require_once "Conn.php";

class Inventario{
    private $stock;

    public function __construct(){}

    public function mostrarInv(){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM inventario";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function buscarInv(int $id){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM inventario WHERE id=$id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }
}