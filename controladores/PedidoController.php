<?php

require_once "modelos/Pedido.php";

class PedidoController{
    public function guardar(array $datos){
        $pedido = new Pedido();
        $resultado = $pedido->guardar(
            $datos["cliente"], 
            $datos["producto"], 
            $datos["cantidad"]
        );
        if($resultado!=0){
            return "Pedido guardado correctamente";
        }else{
            return "Error al guardar el pedido";
        }
    }

    public function buscar($id){
        $pedido = new Pedido();
        return $pedido->buscar($id);
    }

    public function mostrar(){
        $pedido = new Pedido();
        return $pedido->mostrar();
    }

    public function eliminar($id){
        $pedido = new Pedido();
        $resultado = $pedido->eliminar($id);
        if($resultado!=0){
            return "location: verPedido.php";
        }else{
            return "Error: no se eliminó el pedido";
        }
    }

    public function actualizar(array $datos){
        $pedido = new Pedido();
        $resultado = $pedido->actualizar(
            $datos["cliente"],
            $datos["producto"],
            $datos["cantidad"],
            $datos["id"]
        );
        if($resultado!=0){
            header("location: verPedido.php");
        }else{
            return "Error al actualizar el pedido";
        }
    }
}