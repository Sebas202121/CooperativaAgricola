<?php
require_once '../modelos/DetallesPedido.php';

class DetallesPedidoController {
    private $detalle;

    public function __construct() {
        $this->detalle = new DetallesPedido();
    }

    public function agregarDetalle($pedido_id, $producto_id, $cantidad, $precio_unitario) {
        $resultado = $this->detalle->agregarDetalle($pedido_id, $producto_id, $cantidad, $precio_unitario);
        if ($resultado) {
            header("Location: ../vistas/detallesPedido.php?success=1");
        } else {
            header("Location: ../vistas/detallesPedido.php?error=1");
        }
    }

    public function mostrarDetalles($pedido_id) {
        $detalles = $this->detalle->obtenerDetallesPorPedido($pedido_id);
        include '../vistas/detallesPedido.php'; // Vista que debes crear
    }
}
