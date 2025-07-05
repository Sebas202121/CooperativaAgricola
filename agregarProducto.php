<?php
    require_once "layouts/header.php";
    require_once "controladores/Controller.php";
    if(!empty($_GET)){
        $pedido_id = $_GET["pedido_id"];
    }else{
        $pedido_id = $_POST["pedido_id"];
    }
    $pc = new ProductoController();
    $productos = $pc->mostrarProd();
?>
<h1>Agregar Productos</h1>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
    <input type="hidden" name="pedido_id" value="<?php echo $pedido_id;?>">
    <label>Producto:</label>
    <select name="producto_id">
        <?php
        foreach($productos as $producto){
            echo "<option value='".$producto["id"]."'>".$producto["nombre"]."</option>";
        }
        ?>
    </select><br><br>
    <label>Cantidad:</label>
    <input type="number" name="cantidad" min="1" required><br><br>
    <a href="infoPedido.php?id=<?php echo $pedido_id?>" class="btn btn-secondary">Atras</a>
    <input type="submit" class="btn btn-primary" value="Agregar">
</form>
<?php
    if (!empty($_POST)) {
        $dc = new DetalleController();
        $dc->guardarDet($_POST);
    }
    require_once "layouts/footer.php";
?>