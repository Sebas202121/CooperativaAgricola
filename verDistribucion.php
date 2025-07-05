<?php
    require_once "controladores/Controller.php";
    require_once "layouts/header.php";

    $uc = new DistribucionController();
    $distribuciones = $uc->mostrarDist();

    session_start();
    if(!isset($_SESSION["id"])){
        header("location: login.php");
    }
?>
<h1 class="mt-4">Distribuciones</h1>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre de Mercado</th>
            <th>Pedido</th>
            <th>&nbsp</th>
        </tr>
    </thead>
    <tbody>
<?php
foreach($distribuciones as $distribucion){
    echo "<tr>
            <td>".$distribucion["id"]."</td>
            <td>".$distribucion["nomMerc"]."</td>
            <td>".$distribucion["pedido_id"]."</td>
            <td><a href='eliminarDist.php?id=".$distribucion["id"]."' class='btn btn-outline-danger'>Cancelar</a></td>
        </tr>";
}
?>
        <a class="me-2 btn btn-danger" href="logout.php">Salir</a>
        <a href="verClientes.php" class="me-2 btn btn-secondary">Clientes</a>
        <a href="verProductos.php" class="me-2 btn btn-secondary">Inventario</a>
        <a href="verPedidos.php" class="me-2 btn btn-secondary">Pedidos</a>
    </tbody>
</table>
<a href="agregarDistribucion.php" class="btn btn-primary">Distribuir</a>