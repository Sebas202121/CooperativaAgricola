<?php
    require_once "layouts/header.php";
?>
<h1>Distribuir</h1>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
    <input type="text" class="form-control" name="nomMerc" placeholder="Mercado" required><br>
    <input type="text" class="form-control" name="pedido_id" placeholder="Pedido" required><br>
    <a href="verDistribucion.php" class="btn btn-secondary">Atras</a>
    <input type="submit" class="btn btn-primary" value="Guardar"><br>
</form>
<?php
    require_once "controladores/Controller.php";
    require_once "layouts/footer.php";
    if(!empty($_POST)){
        $uc = new DistribucionController();
        $uc->guardarDist($_POST);
    }