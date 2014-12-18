<?php
session_start();
echo '<script>
if (sessionStorage.getItem("tipo") === null || sessionStorage.getItem("tipo") === undefined ){
window.location.href = "index.php";
}
</script>';
$id=$_POST['del'];
unset ($_SESSION['cesta'][$id]); //datos personalizados
$_SESSION['cesta']=array_values($_SESSION['cesta']);
header ("Location: ../ventas.php"); 
?>
