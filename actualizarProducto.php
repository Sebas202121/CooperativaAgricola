<?php
    require_once "layouts/header.php";
    require_once "controladores/Controller.php";
    if(!empty($_GET)){
        $id = $_GET["id"];
    }else{
        $id = $_POST["id"];
    }
    $uc = new ProductoController();
    $productos = $uc->buscarProd($id);
    foreach($productos as $producto){
        $stock = $producto["stock"];
        $precio = $producto["precio"];
    }
?>

<h1>Actualizar Producto</h1>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
    <label>Stock:</label>
    <input type="number" name="stock" placeholder="Stock" value="<?=$stock?>"><br><br>
    <label>Precio:</label>
    <input type="number" step="0.1" name="precio" placeholder="Precio" value="<?=$precio?>"><br><br>
    <input type="hidden" name="id" value="<?=$id?>">
    <a href="verProductos.php" class="btn btn-secondary">Atras</a>
    <input type="submit" class="btn btn-primary" value="Guardar"><br>
</form>
<?php
    require_once "controladores/Controller.php";
    require_once "layouts/footer.php";
    if(!empty($_POST)){
        $uc->actualizarProd($_POST);
    }