<?php
    require_once "controladores/Controller.php";
    require_once "layouts/header.php";

    $uc = new ClienteController();
    $clientes = $uc->mostrarCli();

    session_start();
    if(!isset($_SESSION["id"])){
        header("location: login.php");
    }
?>
<h1 class="mt-4">Clientes Registrados</h1>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Telefono</th>
            <th>&nbsp</th>
            <th>&nbsp</th>
        </tr>
    </thead>
    <tbody>
<?php
foreach($clientes as $cliente){
    echo "<tr>
            <td>".$cliente["id"]."</td>
            <td>".$cliente["nombre"]."</td>
            <td>".$cliente["telefono"]."</td>
            <td><a href='actualizarCliente.php?id=".$cliente["id"]."' class='btn btn-outline-info'>Actualizar</a></td>
            <td><a href='eliminarCliente.php?id=".$cliente["id"]."' class='btn btn-outline-danger'>Eliminar</a></td>
        </tr>";
}
?>
        <a class="me-2 btn btn-danger" href="logout.php">Salir</a>
        <a href="verPedidos.php" class="me-2 btn btn-secondary">Pedidos</a>
        <a href="verProductos.php" class="me-2 btn btn-secondary">Inventario</a>
        <a href="verDistribucion.php" class="me-2 btn btn-secondary">Distribucion</a>
    </tbody>
</table>
<a href="agregarCliente.php" class="btn btn-primary">Agregar Cliente</a>