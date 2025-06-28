<?php
require_once 'Conn.php';

class Inventario {
    private $conn;

    public function __construct() {
        $this->conn = (new Conn())->getConexion();
    }

    public function obtenerInventario() {
        $stmt = $this->conn->prepare("SELECT * FROM productos");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actualizarStock($id_producto, $nuevo_stock) {
        $stmt = $this->conn->prepare("UPDATE productos SET stock = :stock WHERE id = :id");
        $stmt->bindParam(':stock', $nuevo_stock);
        $stmt->bindParam(':id', $id_producto);
        return $stmt->execute();
    }
}
