<?php
    require_once "layouts/header.php";
    require_once "controladores/Controller.php";
    if(!empty($_GET)){
        $id = $_GET["id"];
    }else{
        $id = $_POST["id"];
    }
    $uc = new PedidoController();
    $pedidos = $uc->buscarPed($id);
    foreach($pedidos as $pedido){
        $tipo = $pedido["estado"];
    }
?>

<h1>Actualizar Estado del Envio</h1>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
    <select name="estado" id="" class="form-select">
        <option value="pendiente" <?php if($pedido=="pendiente"){echo "pendiente";} ?>>pendiente</option>
        <option value="enviado" <?php if($pedido=="enviado"){echo "enviado";} ?>>enviado</option>
        <option value="entregado" <?php if($pedido=="entregado"){echo "entregado";} ?>>entregado</option>
        <option value="cancelado" <?php if($pedido=="cancelado"){echo "cancelado";} ?>>cancelado</option>
    </select><br>
    <input type="hidden" name="id" value="<?=$id?>">
    <a href="verPedidos.php" class="btn btn-secondary">Atras</a>
    <input type="submit" class="btn btn-primary" value="Guardar"><br>
</form>
<?php
    require_once "controladores/Controller.php";
    require_once "layouts/footer.php";
    if(!empty($_POST)){
        $uc->actualizarPed($_POST);
    }