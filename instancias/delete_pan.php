<?php
if (!isset($_POST['bookId'])) {
    header("Location: ../index.php");
} else {

    require_once '../class/panl.class.php';

    $usuarios = Pan::singleton();

    $id = $_POST['bookId'];
    $usuarios->delete_pan($id);
}
?>
