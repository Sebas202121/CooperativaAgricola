<?php
    require_once "controladores/ProductoController.php";
    require_once "layouts/header.php";

    $pc = new ProductoController();
    $productos = $pc->mostrar();
?>
<a class="btn btn-danger" href="logout.php">Salir</a>
<h1 class="mt-4"> Productos del Sistema</h1>
<table class="table">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>&nbsp</th>
        <th>&nbsp</th>
    </tr>
    </thead>
    <tbody>
<?php
    foreach($productos as $producto){
    echo "<tr>
            <td>" .$producto["nombre"]. "</td>
            <td>" .$producto["descripcion"]. "</td>
            <td>" .$producto["precio"]. "</td>
            <td><a href='eliminarProducto.php?id=".$producto["id"]."' class='btn btn-sm btn-outline-danger'>Eliminar</a></td>
            <td><a href='actualizarProducto.php?id=".$producto["id"]."' class='btn btn-sm btn-outline-warning'>Actualizar</a></td>
        </tr>";
    }
?>
    </tbody>
</table>
<a href="registrarProducto.php" class="btn btn-primary">Registrar Producto</a>
<?php
require_once "layouts/footer.php";