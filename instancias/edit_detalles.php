<?php

if (!isset($_POST['upId'])) {
    header("Location: ../");
} else {

    require_once '../class/det.class.php';

    $usup = Deta::singleton();

    $id = $_POST['upId'];
    $un = $_POST['nome'];
    $do = $_POST['dire'];
    $tr = $_POST['ruclie'];
    $usup->update_detalles($id,$un,$do,$tr);
}
?>
