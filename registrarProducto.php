<?php
    require_once "layouts/header.php";
?>
<h1>Registrar Producto</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input class="form-control" type="text" name="nombre" placeholder="Nombre"><br>
    <input class="form-control" type="text" name="descripcion" placeholder="Descripción"><br>
    <input class="form-control" type="number" step="0.01" name="precio" placeholder="Precio"><br>
    <input type="submit" value="Guardar" class="btn btn-primary"><br>
</form>
<?php
    require_once "controladores/ProductoController.php";
    require_once "layouts/footer.php";
    if(!empty($_POST)){
        $pc = new ProductoController();
        echo $pc->guardar($_POST);
        header("Location: verProducto.php");
    }
?>