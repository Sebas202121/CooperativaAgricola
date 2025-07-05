<?php
    require_once "layouts/header.php";
?>
<h1>Registrar Producto</h1>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
    <input type="number" name="stock" placeholder="Stock"><br>
    <input type="text" name="nombre" placeholder="Producto"><br>
    <select name="categoria" id="">
        <option value="cereales">Cereales</option>
        <option value="frutas">Frutas</option>
        <option value="verduras">Verduras</option>
        <option value="legumbres">Legumbres</option>
        <option value="tuberculos">Tubérculos</option>
    </select><br>
    <input type="number" step="0.1" name="precio" placeholder="Precio"><br>
    <input type="submit" value="Guardar"><br>
</form>
<?php
require_once "controladores/Controller.php";
require_once "layouts/footer.php";
if(!empty($_POST)){
    $uc = new ProductoController();
    $uc->guardarProd($_POST);
}