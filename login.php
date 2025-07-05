<?php
    require_once "layouts/header.php";
?>
<h1>Acceso al Sistema</h1>
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]?>">
    <input type="text" class="form-control" name="username" placeholder="Ingrese usuario"/><br>
    <input type="password" class="form-control" name="password" placeholder="Ingrese contraseña"/><br>
    <input class="btn btn-primary" type="submit" value="Ingresar"/>
    <a href="registrarse.php" class="btn btn-primary">Registrarse</a>
</form>
<?php
    require_once "controladores/Controller.php";
    if(!empty($_POST)){
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        $errores = 0;
        if($username == ""){
            echo "<div class='alert alert-danger mt-4'>Username vacio</div>";
            $errores++;
        }
        if($password == ""){
            echo "<div class='alert alert-danger mt-4'>Password vacio</div>";
            $errores++;
        }
        if(strlen($username) !=8){
            echo "<div class='alert alert-danger mt-4'>Username incorrecto</div>";
            $errores++;
        }
        if(preg_match('/\d/', $username)==0){
            echo "<div class='alert alert-danger mt-4'>El username solo debe tener numeros</div>";
        };
        if($errores==0){
            $uc = new UsuarioController();
            echo "<div class='alert alert-danger mt-4'>".$uc->login($username, $password)."</div>";
        }
    }
    require_once "layouts/footer.php";
?>