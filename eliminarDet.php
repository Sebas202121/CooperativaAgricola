<?php
    require_once "controladores/Controller.php";
    $id = $_GET["id"];
    $pedido_id = $_GET["pedido_id"];
    $uc = new DetalleController();
    $uc->eliminarDet($id, $pedido_id);