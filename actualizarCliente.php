<?php
    require_once "layouts/header.php";
    require_once "controladores/Controller.php";
    if(!empty($_GET)){
        $id = $_GET["id"];
    }else{
        $id = $_POST["id"];
    }
    $uc = new ClienteController();
    $clientes = $uc->buscarCli($id);
    foreach($clientes as $cliente){
        $nombre = $cliente["nombre"];
        $telefono = $cliente["telefono"];
    }
?>

<h1>Actualizar Estado del Envio</h1>
<form class="form-label" method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
    <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?=$nombre?>"><br>
    <input type="text" class="form-control" name="telefono" placeholder="Telefono" value="<?=$telefono?>"><br>
    <input type="hidden" name="id" value="<?=$id?>">
    <a href="verClientes.php" class="btn btn-secondary">Atras</a>
    <input type="submit" class="btn btn-primary" value="Guardar"><br>
</form>
<?php
    require_once "controladores/Controller.php";
    require_once "layouts/footer.php";
    if(!empty($_POST)){
        $uc->actualizarCli($_POST);
    }