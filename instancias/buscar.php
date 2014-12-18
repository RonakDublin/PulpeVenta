<?php

if (!isset($_POST['upId'])) {
    header("Location: ../");
} else {

    require_once '../class/users.class.php';

    $buscarcliente = Users::singleton();

    $id = $_POST['valor1'];
   
    $buscarcliente->get_busca($nom);
}
?>
