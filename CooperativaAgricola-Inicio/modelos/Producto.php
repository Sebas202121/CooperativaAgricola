<?php
class Producto {
    public $id;
    public $nombre;
    public $categoria;
    public $precio;

    // Constructor para inicializar un producto
    public function __construct($nombre, $categoria, $precio) {
        $this->nombre = $nombre;
        $this->categoria = $categoria;
        $this->precio = $precio;
    }

  
    public function guardar() {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO productos (nombre, categoria, precio) VALUES (?, ?, ?)");
        $stmt->execute([$this->nombre, $this->categoria, $this->precio]);
    }
    public static function obtenerTodos() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM productos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function encontrarPorId($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM productos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE productos SET nombre = ?, categoria = ?, precio = ? WHERE id = ?");
        $stmt->execute([$this->nombre, $this->categoria, $this->precio, $id]);
    }

    public static function eliminar($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM productos WHERE id = ?");
        $stmt->execute([$id]);
    }
}
?>
