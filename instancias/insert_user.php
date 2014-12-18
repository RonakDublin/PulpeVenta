<?php
if (!isset($_POST['Newcli'])) {
    header("Location: ../");
} else {

    require_once '../class/users.class.php';

    $usuarios = Users::singleton();

    $nombre = $_POST['nome'];
    $direccion = $_POST['dire'];
    $ruc = $_POST['ruclie'];
    $telefono = $_POST['tclie'];
    $usuarios->insert_usuario($nombre,$direccion,$ruc,$telefono);
}
?>
