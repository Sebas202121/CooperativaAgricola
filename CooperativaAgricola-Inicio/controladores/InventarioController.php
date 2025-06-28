<?php
require_once '../modelos/Inventario.php';

class InventarioController {
    private $inventario;

    public function __construct() {
        $this->inventario = new Inventario();
    }

    public function mostrarInventario() {
        $productos = $this->inventario->obtenerInventario();
        include '../vistas/inventario.php'; // Vista que debes crear
    }

    public function actualizarStock($id_producto, $nuevo_stock) {
        $resultado = $this->inventario->actualizarStock($id_producto, $nuevo_stock);
        if ($resultado) {
            header("Location: ../vistas/inventario.php?success=1");
        } else {
            header("Location: ../vistas/inventario.php?error=1");
        }
    }
}
