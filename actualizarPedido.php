<?php
    require_once "controladores/PedidoController.php";
    require_once "layouts/header.php";
    if(!empty($_GET)){
        $id = $_GET["id"];
    }else{
        $id = $_POST["id"];
    }
    $pc = new PedidoController();
    $pedidos = $pc->buscar($id);
    foreach ($pedidos as $pedido){
        $cliente = $pedido["cliente"];
        $producto = $pedido["producto"];
        $cantidad = $pedido["cantidad"];
    }
?>
<h1 class="mt-4">Actualizar Pedido</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input class="form-control" type="text" name="cliente" placeholder="Cliente" value="<?=$cliente; ?>"><br>
    <input class="form-control" type="text" name="producto" placeholder="Producto" value="<?=$producto; ?>"><br>
    <input class="form-control" type="number" name="cantidad" placeholder="Cantidad" value="<?=$cantidad; ?>"><br>
    <input type="hidden" name="id" value="<?=$id?>">
    <input type="submit" value="Actualizar" class="btn btn-primary"><br>
</form>
<?php
    require_once "layouts/footer.php";
    if(!empty($_POST)){
        $pc->actualizar($_POST);
        header("Location: verPedido.php");
    }
?>