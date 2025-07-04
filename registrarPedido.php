<?php
    require_once "layouts/header.php";
?>
<h1>Registrar Pedido</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input class="form-control" type="text" name="cliente" placeholder="Cliente"><br>
    <input class="form-control" type="text" name="producto" placeholder="Producto"><br>
    <input class="form-control" type="number" name="cantidad" placeholder="Cantidad"><br>
    <input type="submit" value="Guardar" class="btn btn-primary"><br>
</form>
<?php
    require_once "controladores/PedidoController.php";
    require_once "layouts/footer.php";
    if(!empty($_POST)){
        $pc = new PedidoController();
        echo $pc->guardar($_POST);
        header("Location: verPedido.php");
    }
?>