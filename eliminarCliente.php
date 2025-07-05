<?php
    require_once "controladores/Controller.php";
    $id = $_GET["id"];
    $uc = new ClienteController();
    $uc->eliminar($id);