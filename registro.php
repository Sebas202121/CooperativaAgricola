<h1>Registrar Usuario</h1>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
    <input type="text" name="username" placeholder="Usuario"/><br>
    <input type="email" name="email" placeholder="Email"/><br>
    <input type="password" name="password" placeholder="Contraseña"/><br>
    <input type="submit" value="guardar"/> 
</form>

<?php
if(!empty($_POST)){
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $contadorErrores = 0;

    if ($username == "") {
        echo "Complete el campo Usuario<br>";
        $contadorErrores++;
    }

    if ($email == "") {
        echo "Complete el campo Email<br>";
        $contadorErrores++;
    } else {
        $email = $_POST["email"];
        $patron = "/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/";
        if (!preg_match($patron, $email)) {
            echo "Debe ingresar un email valido";
            $contadorErrores++;
        }
    }

    if ($password == "" || strlen($_POST["password"]) < 6 || strlen($_POST["password"]) > 12) {
        echo "Minimo 6 caracteres";
        $contadorErrores++;
    }

    if($contadorErrores==0){
        require_once "controladores/UsuarioController.php";
        $uc = new UsuarioController();
        $respuesta = $uc->guardar($username, $email, $password);
        if($respuesta){
            echo "Usuario creado";
        }
    }
}
