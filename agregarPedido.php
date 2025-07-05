<?php
    require_once "layouts/header.php";
?>
<h1>Agregar Pedido</h1>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
    <label>Fecha de Pedido:</label>
    <input type="date" name="fecha" placeholder="Fecha" required><br>
    <label>Estado inicial:</label>
    <select name="estado" id="">
        <option value="pendiente">pendiente</option>
        <option value="enviado">enviado</option>
        <option value="entregado">entregado</option>
        <option value="cancelado">cancelado</option>
    </select><br>
    <input type="text" class="form-control" name="cliente_id" placeholder="Cliente" required><br>
    <a href="verPedidos.php" class="btn btn-secondary">Atras</a>
    <input type="submit" class="btn btn-primary" value="Guardar"><br>
</form>
<?php
    require_once "controladores/Controller.php";
    require_once "layouts/footer.php";
    if(!empty($_POST)){
        $uc = new PedidoController();
        $uc->guardarPed($_POST);
    }