<?php
if (!isset($_POST['Newpro'])) {
    header("Location: ../");
} else {

    require_once '../class/produc.class.php';

    $productsin = Producs::singleton();

    $descripcion = $_POST['descrinew'];
    $cantidad = "1";
    $precio = $_POST['precinew'];
    $productsin->insert_producto($descripcion,$cantidad,$precio);
}
?>
