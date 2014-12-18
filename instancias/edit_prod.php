<?php

if (!isset($_POST['upId'])) {
    header("Location: ../");
} else {

    require_once '../class/produc.class.php';

    $productoedit = Producs::singleton();

    $id = $_POST['upId'];
    $descripcion = $_POST['desc'];
    $precio = $_POST['prev'];
    $productoedit->update_producto($id,$descripcion,$precio);
}
?>
