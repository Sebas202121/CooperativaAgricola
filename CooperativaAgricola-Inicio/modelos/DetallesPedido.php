<?php
require_once 'Conn.php';

class DetallesPedido {
    private $conn;

    public function __construct() {
        $this->conn = (new Conn())->getConexion();
    }

    public function agregarDetalle($pedido_id, $producto_id, $cantidad, $precio_unitario) {
        $stmt = $this->conn->prepare("INSERT INTO detalles_pedido (pedido_id, producto_id, cantidad, precio_unitario) VALUES (:pedido_id, :producto_id, :cantidad, :precio_unitario)");
        $stmt->bindParam(':pedido_id', $pedido_id);
        $stmt->bindParam(':producto_id', $producto_id);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':precio_unitario', $precio_unitario);
        return $stmt->execute();
    }

    public function obtenerDetallesPorPedido($pedido_id) {
        $stmt = $this->conn->prepare("SELECT * FROM detalles_pedido WHERE pedido_id = :pedido_id");
        $stmt->bindParam(':pedido_id', $pedido_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
