<?php
class Pedido {
    public $id;
    public $clienteId;
    public $fecha;
    public $estado;

    public function __construct($clienteId, $fecha, $estado) {
        $this->clienteId = $clienteId;
        $this->fecha = $fecha;
        $this->estado = $estado;
    }

    public function guardar() {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO pedidos (clienteId, fecha, estado) VALUES (?, ?, ?)");
        $stmt->execute([$this->clienteId, $this->fecha, $this->estado]);
    }


    public static function obtenerTodos() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM pedidos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function encontrarPorId($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM pedidos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
