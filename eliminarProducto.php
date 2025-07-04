<?php
require_once "controladores/ProductoController.php";

if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $pc = new ProductoController();
    $pc->eliminar($id);
    header("Location: verProducto.php");
}