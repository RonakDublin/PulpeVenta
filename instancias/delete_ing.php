<?php
if (!isset($_POST['bookId'])) {
    header("Location: ../index.php");
} else {

    require_once '../class/ing.class.php';

    $delshop = Ing::singleton();

    $id = $_POST['bookId'];
    $delshop->delete_shop($id);
}
?>
