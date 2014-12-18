<?php
session_start();
echo '<script>
if (sessionStorage.getItem("tipo") == "1" ){

}else {
window.location.href = "index.php";
}
</script>';

error_reporting(E_ALL);
ini_set('display_errors', '1');


    require_once '../class/ventas.class.php';

	//recoge el max
	$bid = Ventas::singleton();
	$data = $bid->get_maxid();
    
    //echo $data;

	//suma en la tabla
    $vent = Ventas::singleton();
    $vent->update_ventas();

	//guarda en la tabla venta
	require_once '../class/nv.class.php';
	$gvent = Nuevov::singleton();
	$codigo = $data;
	$fecventa = $_POST['fecha'];
	$cliventa = $_POST['ticId'];
	$totventa = $_POST['valor1'];
	$_SESSION['ccli'] = $cliventa;
	//echo $id.'<br>'.$fec.'<br>'.$cli.'<br>'.$tot;

	$gvent->insert_nuevaventa($codigo,$fecventa,$cliventa,$totventa);

	//guarda los items
	require_once '../class/item.class.php';
		$registropro = Articulos::singleton();
		$cod = $data;
		$registropro->new_articulos($cod);


?>
