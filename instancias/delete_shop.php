<?php
if (!isset($_POST['bookId'])) {
    header("Location: ../index.php");
} else {

    require_once '../class/shop.class.php';

    $delshop = Shopp::singleton();

    $id = $_POST['bookId'];
    $delshop->delete_shop($id);
}
?>
