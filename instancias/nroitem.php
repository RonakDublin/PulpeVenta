<?php
session_start();
echo '<script>
if (sessionStorage.getItem("tipo") === null || sessionStorage.getItem("tipo") === undefined ){
window.location.href = "index.php";
}
</script>';


$oid_prod=$_POST['proId'];
$n_prod=$_POST['proN'];
$p_precio=$_POST['pre_pro'];
$cant = $_POST['can'];
if($cant <= 0){
	$cant=0;
	exit;
	}
/*echo $oid_prod=$_POST['proId'];
echo $n_prod=$_POST['proN'];
echo $p_precio=$_POST['pre_pro'];
echo $cant = $_POST['can'];
echo "skdjks";*/
$Contenido = array("Codigo" => $oid_prod,"Descri" =>$n_prod,"Pre" =>$p_precio,"Ca" =>$cant); 
//print_r($Contenido);        
$i = 0;
while($_SESSION['cesta'][$i] <> '')
$i++;

$_SESSION['cesta'][$i] = $Contenido; 
/*print_r($Contenido);*/ 

?>
