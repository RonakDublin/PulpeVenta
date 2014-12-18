<?php
if (!isset($_POST['Newcli'])) {
    header("Location: ../");
} else {

    require_once '../class/panl.class.php';

    $uspan = Pan::singleton();

    $un = $_POST['a'];
    $do = $_POST['b'];
    $tr = $_POST['c'];
    $cu = $_POST['d'];
    $ci = $_POST['e'];
    $uspan->insert_pan($un,$do,$tr,$cu,$ci);
}
?>
