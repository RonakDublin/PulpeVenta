<?php
if (!isset($_POST['bookId'])) {
    header("Location: ../index.php");
} else {

    require_once '../class/users.class.php';

    $usuarios = Users::singleton();

    $id = $_POST['bookId'];
    $usuarios->delete_usuario($id);
}
?>
