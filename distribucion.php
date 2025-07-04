<?php
class Distribucion {
    public $id;
    public $pedidoId;
    public $nomMerc;

    public function __construct($pedidoId, $nomMerc) {
        $this->pedidoId = $pedidoId;
        $this->nomMerc = $nomMerc;
    }

    public function guardar() {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO distribucion (pedidoId, nomMerc) VALUES (?, ?)");
        $stmt->execute([$this->pedidoId, $this->nomMerc]);
    }

    public static function obtenerTodos() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM distribucion");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function encontrarPorId($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM distribucion WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
