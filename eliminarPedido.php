<?php
require_once "controladores/PedidoController.php";

if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $pc = new PedidoController();
    $pc->eliminar($id);
    header("Location: verPedido.php");
}