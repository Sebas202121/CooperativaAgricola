<h1>Ingresar al Sistema</h1>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
    <input type="text" name="username" placeholder="Usuario"/><br>
    <input type="password" name="password" placeholder="Contraseña"/><br>
    <input type="submit" value="login"/> 
</form>
<?php

if(!empty($_POST)){
    $username  = $_POST["username"];
    $password = $_POST["password"];

    require_once "controladores/UsuarioController.php";
    $uc = new UsuarioController();
    $uc->login($username, $password);
}