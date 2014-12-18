<?php

if (!isset($_POST['upId'])) {
    header("Location: ../");
} else {

    require_once '../class/panl.class.php';

    $usup = Pan::singleton();

    $id = $_POST['upId'];
    $un = $_POST['nome'];
    $do = $_POST['dire'];
    $tr = $_POST['ruclie'];
    $cu = $_POST['teleclie'];
    $usup->update_pan($id,$un,$do,$tr,$cu);
}
?>
