<?php

require_once "Conn.php";

class DetallesPedido{
    private $cantidad;

    public function __construct(){}

    public function buscarDet(int $pedido_id){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT d.id, d.pedido_id, d.cantidad, p.nombre AS nomProd
        FROM detallespedido AS d JOIN producto AS p ON d.producto_id = p.id
        WHERE d.pedido_id = $pedido_id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function guardarDet($producto_id, $cantidad, $pedido_id){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO detallespedido(cantidad, pedido_id, producto_id)
        VALUES('$cantidad', '$pedido_id', '$producto_id')";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function eliminarDet($id){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "DELETE FROM detallespedido WHERE id=$id";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }
}