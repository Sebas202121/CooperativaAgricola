<?php

require_once "Conn.php";

class Producto{
    private $stock;
    private $nombre;
    private $categoria;
    private $precio;

    public function __construct(){}

    public function mostrarProd(){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM producto";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function guardarProd($stock, $nombre, $categoria, $precio){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO producto(stock, nombre, categoria, precio) 
        VALUES('$stock', '$nombre', '$categoria', '$precio')";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function buscarProd(int $id){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM producto WHERE id=$id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function actualizarProd($stock, $precio, $id){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "UPDATE producto SET precio='$precio' WHERE id=$id";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }
}   