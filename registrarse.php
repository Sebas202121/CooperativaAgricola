<?php
    require_once "layouts/header.php";
?>
<h1>Registrar Usuario</h1>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
    <input type="text" name="username" placeholder="Usuario"><br>
    <input type="password" name="password" placeholder="Contraseña"><br>
    <input type="text" name="email" placeholder="Email"><br>
    <input type="submit" value="Guardar"><br>
</form>
<?php
    require_once "controladores/Controller.php";
    require_once "layouts/footer.php";
    if(!empty($_POST)){
        $uc = new UsuarioController();
        $uc->guardarUs($_POST);
    }