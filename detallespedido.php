<?php
class DetallesPedido {
    public $pedidoId;
    public $productoId;
    public $cantidad;

    public function __construct($pedidoId, $productoId, $cantidad) {
        $this->pedidoId = $pedidoId;
        $this->productoId = $productoId;
        $this->cantidad = $cantidad;
    }

    public function guardar() {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO detallespedido (pedidoId, productoId, cantidad) VALUES (?, ?, ?)");
        $stmt->execute([$this->pedidoId, $this->productoId, $this->cantidad]);
    }

    public static function obtenerTodos() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM detallespedido");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function encontrarPorId($pedidoId, $productoId) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM detallespedido WHERE pedidoId = ? AND productoId = ?");
        $stmt->execute([$pedidoId, $productoId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
