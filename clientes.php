<?php
class Cliente {
    public $id;
    public $nombre;
    public $telefono;

    public function __construct($nombre, $telefono) {
        $this->nombre = $nombre;
        $this->telefono = $telefono;
    }

    public function guardar() {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO cliente (nombre, telefono) VALUES (?, ?)");
        $stmt->execute([$this->nombre, $this->telefono]);
    }

    public static function obtenerTodos() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM cliente");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function encontrarPorId($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM cliente WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
