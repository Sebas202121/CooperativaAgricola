<?php
    require_once "layouts/header.php";
    require_once "controladores/Controller.php";
    if(!empty($_GET)){
        $pedido_id = $_GET["id"];
    }else{
        $pedido_id = $_POST["id"];
    }
    $uc = new DetalleController();
    $detalles = $uc->buscarDet($pedido_id);
?>
<h1 class="mt-4">Informacion del Pedido</h1>
<table class="table">
    <a href="agregarProducto.php?pedido_id=<?php echo $pedido_id ?>" class="btn btn-primary">Agregar Producto</a>
    <thead>
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>&nbsp</th>
        </tr>
    </thead>
    <tbody>
<?php
foreach($detalles as $detalle){
    echo "<tr>
            <td>".$detalle["id"]."</td>
            <td>".$detalle["nomProd"]."</td>
            <td>".$detalle["cantidad"]."</td>
            <td><a href='eliminarDet.php?id=".$detalle["id"]."&pedido_id=".$pedido_id."' class='btn btn-outline-danger'>Eliminar</a></td>
        </tr>";
}
?>
    </tbody>
</table>
<a href="verPedidos.php" class="btn btn-secondary">Atras</a>
<?php
    require_once "layouts/footer.php";
?>