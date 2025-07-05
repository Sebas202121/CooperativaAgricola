<?php
    require_once "layouts/header.php";
?>
<h1>Agregar Cliente</h1>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
    <input type="text" class="form-control" name="nombre" placeholder="Nombre" required><br>
    <input type="text" class="form-control" name="telefono" placeholder="Telefono" required><br>
    <a href="verClientes.php" class="btn btn-secondary">Atras</a>
    <input type="submit" class="btn btn-primary" value="Guardar"><br>
</form>
<?php
    require_once "controladores/Controller.php";
    require_once "layouts/footer.php";
    if(!empty($_POST)){
        $uc = new ClienteController();
        $uc->guardarCli($_POST);
    }