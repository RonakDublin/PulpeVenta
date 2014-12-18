<?php

if (!isset($_POST['upId'])) {
    header("Location: ../");
} else {

    require_once '../class/shop.class.php';

    $upshop = Shopp::singleton();

    $id = $_POST['upId'];
    $u = $_POST['fc'];
    $d = $_POST['de'];
    $t = $_POST['con'];
    $c = $_POST['nr'];
    $ci = $_POST['mo'];
    $upshop->update_shop($id,$u,$d,$t,$c,$ci);
}
?>
