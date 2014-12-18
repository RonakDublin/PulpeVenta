<?php
if (!isset($_POST['Newcli'])) {
    header("Location: ../");
} else {

    require_once '../class/shop.class.php';

    $nushop = Shopp::singleton();

    $un = $_POST['fcc'];
    $do = $_POST['des'];
    $tr = $_POST['conce'];
    $cu = $_POST['nr'];
    $ci = $_POST['mon'];

    $nushop->insert_shop($un,$do,$tr,$cu,$ci);
}
?>
