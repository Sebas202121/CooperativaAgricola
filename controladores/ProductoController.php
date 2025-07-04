<?php

require_once "modelos/Producto.php";

class ProductoController{
    public function guardar(array $datos){
        $producto = new Producto();
        $resultado = $producto->guardar(
            $datos["nombre"], 
            $datos["descripcion"], 
            $datos["precio"]
        );
        if($resultado!=0){
            return "Producto guardado correctamente";
        }else{
            return "Error al guardar el producto";
        }
    }

    public function buscar($id){
        $producto = new Producto();
        return $producto->buscar($id);
    }

    public function mostrar(){
        $producto = new Producto();
        return $producto->mostrar();
    }

    public function eliminar($id){
        $producto = new Producto();
        $resultado = $producto->eliminar($id);
        if($resultado!=0){
            return "location: verProducto.php";
        }else{
            return "Error: no se eliminó el producto";
        }
    }

    public function actualizar(array $datos){
        $producto = new Producto();
        $resultado = $producto->actualizar(
            $datos["nombre"],
            $datos["descripcion"],
            $datos["precio"],
            $datos["id"]
        );
        if($resultado!=0){
            header("location: verProducto.php");
        }else{
            return "Error al actualizar el producto";
        }
    }
}