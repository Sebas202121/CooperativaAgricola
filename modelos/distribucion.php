<?php

require_once "Conn.php";

class Distribucion{
    private $nomMerc;

    public function __construct(){}

    public function mostrarDist(){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM distribucion";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function guardarDist($nomMerc, $pedido_id){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO distribucion(nomMerc, pedido_id) 
        VALUES('$nomMerc', '$pedido_id')";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function eliminarDist($id){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "DELETE FROM distribucion WHERE id=$id";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }
}