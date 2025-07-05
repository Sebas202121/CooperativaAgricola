<?php

require_once "modelos/cliente.php";
require_once "modelos/usuario.php";
require_once "modelos/pedido.php";
require_once "modelos/producto.php";
require_once "modelos/distribucion.php";
require_once "modelos/detallesPed.php";

class UsuarioController{
    public function guardarUs(array $datos){
        $usuario = new Usuario();
        $resultado = $usuario->guardarUs($datos["username"], $password = password_hash($datos["password"], PASSWORD_DEFAULT), $datos["email"]);
        if($resultado!=0){
            header("location: verClientes.php");
        }else{
            return "Error: usuario no registrado".$resultado;
        }
    }

    public function mostrarUs(){
        $usuario = new Usuario();
        return $usuario->mostrarUs();
    }

    public function login(string $username,string $password){
        $usuario = new Usuario();
        $resultado = $usuario->buscarPorUsername($username);
        $passwordDB = "";
        $nombre = "";
        $contador = 0;
        foreach($resultado as $userLogin){
            $passwordDB = $userLogin["password"];
            $nombre = $userLogin["username"];
            $id = $userLogin["id"];
            $contador++;
        }
        if($contador!=0){
            if(password_verify($password, $passwordDB)){
                session_start();
                $_SESSION["username"] = $username;
                $_SESSION["id"] = $id;
                header("location: verClientes.php");
            }else{
                return "Usuario y/o contraseña incorrectos";
            }
        }else{
            return "Usuario y/o contraseña incorrectos";
        }
    }
}

class ClienteController{
    public function guardarCli(array $datos){
        $cliente = new Cliente();
        $resultado = $cliente->guardarCli($datos["nombre"], $datos["telefono"]);
        if($resultado!=0){
            header("location: verClientes.php");
        }else{
            return "Error: Cliente no registrado".$resultado;
        }
    }

    public function mostrarCli(){
        $cliente = new Cliente();
        return $cliente->mostrarCli();
    }

    public function eliminar(int $id){
        $cliente = new Cliente();
        $resultado = $cliente->eliminar($id);
        if($resultado!=0){
            header("location: verClientes.php");
        }else{
            return "Error: no se elimino el cliente".$resultado;
        }
    }

    public function buscarCli(int $id){
        $cliente = new Cliente();
        return $cliente->buscarCli($id);
    }

    public function actualizarCli(array $datos){
        $cliente = new Cliente();
        $resultado = $cliente->actualizarCli($datos["nombre"], $datos["telefono"], $datos["id"]);
        if($resultado!=0){
            header("location: verClientes.php");
        }else{
            return "Error: usuario no actualizado".$resultado;
        }
    }
}

class PedidoController{
    public function guardarPed(array $datos){
        $pedido = new Pedido();
        $resultado = $pedido->guardarPed($datos["fecha"], $datos["estado"], $datos["cliente_id"]);
        if($resultado!=0){
            header("location: verPedidos.php");
            exit;
        }else{
            echo "<a>Error: Pedido no registrado</a>";
        }
    }

    public function actualizarPed(array $datos){
        $pedido = new Pedido();
        $resultado = $pedido->actualizarPed($datos["estado"], $datos["id"]);
        if($resultado!=0){
            header("location: verPedidos.php");
        }else{
            return "Error: pedido no actualizado".$resultado;
        }
    }

    public function mostrarPed(){
        $pedido = new Pedido();
        return $pedido->mostrarPed();
    }

    public function buscarPed(int $id){
        $pedido = new Pedido();
        return $pedido->buscarPed($id);
    }
}

class DetalleController{

    public function buscarDet(int $pedido_id){
        $detalle = new DetallesPedido();
        return $detalle->buscarDet($pedido_id);
    }

    public function guardarDet(array $datos){
        $detalle = new DetallesPedido();
        $resultado = $detalle->guardarDet($datos["producto_id"], $datos["cantidad"], $datos["pedido_id"]);
        if($resultado!=0){
            header("location: infoPedido.php?id=".$datos["pedido_id"]);
        }else{
            echo "<a>Error: Ejemplar no registrado</a>";
        }
    }

    public function eliminarDet(int $id, int $pedido_id){
        $detalle = new DetallesPedido();
        $resultado = $detalle->eliminarDet($id);
        if($resultado!=0){
            header("location: infoPedido.php?id=$pedido_id");
        }else{
            return "Error: no se elimino".$resultado;
        }
    }
}

class ProductoController{
    public function mostrarProd(){
        $producto = new Producto();
        return $producto->mostrarProd();
    }

    public function guardarProd(array $datos){
        $producto = new Producto();
        $resultado = $producto->guardarProd($datos["stock"], $datos["nombre"], $datos["categoria"], $datos["precio"]);
        if($resultado!=0){
            header("location: verProductos.php");
        }else{
            echo "<a>Error: No se pudo registrar</a>";
        }
    }

    public function actualizarProd(array $datos){
        $producto = new Producto();
        $resultado = $producto->actualizarProd($datos["stock"], $datos["precio"], $datos["id"]);
        if($resultado!=0){
            header("location: verProductos.php");
        }else{
            echo "<a>Error: Datos iguales</a>";
        }
    }

    public function buscarProd(int $id){
        $producto = new Producto();
        return $producto->buscarProd($id);
    }
}

class DistribucionController{
    public function mostrarDist(){
        $distribucion = new Distribucion();
        return $distribucion->mostrarDist();
    }

    public function guardarDist(array $datos){
        $distribucion = new Distribucion();
        $resultado = $distribucion->guardarDist($datos["nomMerc"], $datos["pedido_id"]);
        if($resultado!=0){
            header("location: verDistribucion.php");
        }else{
            echo "<a>Error: No se pudo registrar</a>";
        }
    }

    public function eliminarDist(int $id){
        $distribucion = new Distribucion();
        $resultado = $distribucion->eliminarDist($id);
        if($resultado!=0){
            header("location: verDistribucion.php");
        }else{
            return "Error: no se elimino".$resultado;
        }
    }
}