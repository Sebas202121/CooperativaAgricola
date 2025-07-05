<?php
    require_once "layouts/header.php";
?>
<h1>Registrar Usuario</h1>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
    <input type="text" class="form-control" name="username" placeholder="Usuario"><br>
    <input type="password" class="form-control" name="password" placeholder="Contraseña"><br>
    <input type="text" class="form-control" name="email" placeholder="Email"><br>
    <a href="login.php" class="btn btn-secondary">Atras</a>
    <input type="submit" class="btn btn-primary" value="Guardar"><br>
</form>
<?php
    require_once "controladores/Controller.php";
    require_once "layouts/footer.php";
    if(!empty($_POST)){
        $uc = new UsuarioController();
        $uc->guardarUs($_POST);
    }