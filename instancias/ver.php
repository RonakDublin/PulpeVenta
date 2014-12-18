<?php
session_start();
if (!isset($_SESSION['nombre'])) {
    header("Location: ../");
} else {

$array = $_SESSION['cesta'];


foreach($array as $id => $producto)
{
echo '<b>Producto numero '.$id.'</b><br/>Código: '.$producto['Codigo'].'<br>Descri: '.$producto['Descri'].'<br>Precio: '.$producto['Pre'].'<br>Cantidad: '.$producto['Ca'];



}

//unset( $_SESSION['cesta']);


}
?>
