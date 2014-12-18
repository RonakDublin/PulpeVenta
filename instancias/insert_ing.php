<?php
if (!isset($_POST['Newcli'])) {
    header("Location: ../");
} else {

    require_once '../class/ing.class.php';

    $ning = Ing::singleton();

    $un = $_POST['fcc'];
    $do = $_POST['des'];
    $tr = $_POST['conce'];
    $cu = $_POST['nr'];
    $ci = $_POST['mon'];

    $ning->insert_ing($un,$do,$tr,$cu,$ci);
}
?>
