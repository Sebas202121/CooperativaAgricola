<?php
    require_once "controladores/Controller.php";
    require_once "layouts/header.php";

    $uc = new ProductoController();
    $productos = $uc->mostrarProd();

    session_start();
    if(!isset($_SESSION["id"])){
        header("location: login.php");
    }
?>
<h1 class="mt-4">Inventario</h1>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Stock</th>
            <th>Nombre</th>
            <th>Categoria</th>
            <th>Precio</th>
            <th>&nbsp</th>
        </tr>
    </thead>
    <tbody>
<?php
foreach($productos as $producto){
    echo "<tr>
            <td>".$producto["id"]."</td>
            <td>".$producto["stock"]."</td>
            <td>".$producto["nombre"]."</td>
            <td>".$producto["categoria"]."</td>
            <td>".$producto["precio"]."</td>
            <td><a href='actualizarProducto.php?id=".$producto["id"]."' class='btn btn-outline-info'>Actualizar</a></td>
        </tr>";
}
?>
        <a class="me-2 btn btn-danger" href="logout.php">Salir</a>
        <a href="verClientes.php" class="me-2 btn btn-secondary">Clientes</a>
        <a href="verPedidos.php" class="me-2 btn btn-secondary">Pedidos</a>
        <a href="verDistribucion.php" class="me-2 btn btn-secondary">Distribucion</a>
    </tbody>
</table>
<a href="registrarProducto.php" class="btn btn-primary">Registrar Producto</a>