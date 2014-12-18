<?php
if (!isset($_POST['delId'])) {
    header("Location: ../index.php");
} else {

    require_once '../class/produc.class.php';

    $prodel = Producs::singleton();

    $id = $_POST['delId'];
    $prodel->delete_producto($id);
}
?>
