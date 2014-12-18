<?php

if (!isset($_POST['upId'])) {
    header("Location: ../");
} else {

    require_once '../class/users.class.php';

    $usuarios = Users::singleton();

    $id = $_POST['upId'];
    $nombre = $_POST['nome'];
    $direccion = $_POST['dire'];
    $ruc = $_POST['ruclie'];
    $telefono = $_POST['teleclie'];
    $usuarios->update_usuario($id,$nombre,$direccion,$ruc,$telefono);
}
?>
