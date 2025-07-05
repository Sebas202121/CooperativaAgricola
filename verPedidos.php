<?php
    require_once "controladores/Controller.php";
    require_once "layouts/header.php";

    $uc = new PedidoController();
    $pedidos = $uc->mostrarPed();

    session_start();
    if(!isset($_SESSION["id"])){
        header("location: login.php");
    }
?>
<h1 class="mt-4">Pedidos Registrados</h1>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Cliente</th>
            <th>&nbsp</th>
            <th>&nbsp</th>
        </tr>
    </thead>
    <tbody>
<?php
foreach($pedidos as $pedido){
    echo "<tr>
            <td>".$pedido["id"]."</td>
            <td>".$pedido["fecha"]."</td>
            <td>".$pedido["estado"]."</td>
            <td>".$pedido["cliente_id"]."</td>
            <td><a href='actualizarPedido.php?id=".$pedido["id"]."' class='btn btn-outline-info'>Estado</a></td>
            <td><a href='infoPedido.php?id=".$pedido["id"]."' class='btn btn-outline-success'>Agregar</a></td>
        </tr>";
}
?>
        <a class="me-2 btn btn-danger" href="logout.php">Salir</a>
        <a href="verClientes.php" class="me-2 btn btn-secondary">Clientes</a>
        <a href="verProductos.php" class="me-2 btn btn-secondary">Inventario</a>
        <a href="verDistribucion.php" class="me-2 btn btn-secondary">Distribucion</a>
    </tbody>
</table>
<a href="agregarPedido.php" class="btn btn-primary">Agregar Pedido</a>