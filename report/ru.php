<?php
if ($_POST["action"] == 'PDF') {

$u = $_POST["fi"];
$ca="'".$u."'";

$d = $_POST["ff"];
$cb= "'".$d."'";

error_reporting(E_ALL);
ini_set('display_errors', '1');

require('fpdf.php');
include ("../conexion/conectar.php");
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetTitle('Reporte');   

//Set font and colors
$pdf->SetFont('Arial','',9);
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(0,0,0);
//Connection and query
$consulta = mysqli_query($con,"SELECT UCASE(descripcion) as descripcion FROM tienda LIMIT 1");
$nom = mysqli_fetch_array($consulta);
$ntenda="VOLUMEN DE VENTAS POR CLIENTE";
//pg_result($rtienda,0,'nombretienda');
//$ndire="Nombre de la tienda";
/*pg_result($rtienda,0,'direccion');*/

/*$verfecha="SELECT LOCALTIMESTAMP(1) AS FECHA";
$rf=pg_query($verfecha) or die (pg_last_error());*/
$ffecha=date("Y-m-d");
//pg_result($rf,0,'FECHA');

$pdf->Cell(135,5,$nom['descripcion'],0,0,'L',0);
$pdf->Cell(30,5,"FECHA: ".$ffecha,0,1,'R',1);
$pdf->Cell(135,5,$ntenda." DEL: ".$u." AL ".$d,0,0,'L',0);
$pdf->Cell(30,5,'',0,1,'R',1);
// Line break


//Table header
$pdf->Cell(15,10,'Codigo',0,0,'L',1);
$pdf->Cell(50,10,'Nombre',0,0,'L',1);
$pdf->Cell(25,10,'Fecha',0,0,'L',1);
$pdf->Cell(25,10,'Monto',0,0,'L',1);
$pdf->Cell(25,10,'Cantidad',0,1,'L',1);
//Restore font and colors
$pdf->SetFont('Arial','',9);
$pdf->SetFillColor(225,255,255);
$pdf->SetTextColor(0);

$result = mysqli_query($con,"SELECT venta.cliente,cliente.nombre ,venta.fecha, sum(venta.total) as total, count(venta.cliente) as cant FROM venta inner join cliente on venta.cliente=cliente.codcli where date(venta.fecha) BETWEEN ".$ca." AND ".$cb." group by fecha,cliente.codcli DESC");
$tg=0;
$tc=0;
while($row = mysqli_fetch_array($result)) {
	$siape=$row['cliente'];
	$nome=$row['nombre'];
	$telef=$row['fecha'];
	$usu=$row['total'];
	$usc=$row['cant'];
	$tg=$tg+$row['total'];
	$tc=$tc+$row['cant'];
	$pdf->Cell(15,5,$siape,0,0,'L');
	$pdf->Cell(50,5,$nome,0,0,'L');
	$pdf->Cell(25,5,$telef,0,0,'L');
	$pdf->Cell(25,5,$usu,0,0,'L');
	$pdf->Cell(25,5,$usc,0,1,'L');
}
$pdf->Ln(5);
$pdf->Cell(115,5,"Total General: ".$tg,0,0,'R',0);
$pdf->Ln(5);
$pdf->Cell(115,5,"Volumen Ventas: ".$tc,0,0,'R',0);
mysqli_close($con);
$pdf->Output('VolumenxCliente.pdf','I');


} else if ($_POST['action'] == 'EX') {
$fe=date("Y-m-d");
$u = $_POST["fi"];
$ca="'".$u."'";

$d = $_POST["ff"];
$cb= "'".$d."'";

header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=VolumenxClientes".$fe.".xls");  //File name extension was wrong
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
//echo "Some Text"; //no ending ; here
echo '<!DOCTYPE html>
<html>
<head>
<style>
table,th,td
{
border:1px solid black;
border-collapse:collapse;
}
th,td
{
padding:5px;
}
</style>
</head>
<body>';
include ("../conexion/conectar.php");
$consulta = mysqli_query($con,"SELECT UCASE(descripcion) as descripcion FROM tienda LIMIT 1");
$nom = mysqli_fetch_array($consulta);
echo '<h4>'.$nom['descripcion'].'</h4>';
echo '<h4>FECHA: '.$fe.'</h4>';
echo '<h4>VOLUMEN DE VENTAS DEL: '.$u.' AL '.$d.'</h4>
<table style="width:300px">
<tr>
  <th>Codigo</th>
  <th>Nombre</th>		
  <th>Fecha</th>
  <th>Monto</th>
  <th>Cantidad</th>
</tr>';



$result = mysqli_query($con,"SELECT venta.cliente,cliente.nombre ,venta.fecha, sum(venta.total) as total, count(venta.cliente) as cant FROM `venta` inner join cliente on venta.cliente=cliente.codcli where date(venta.fecha) BETWEEN ".$ca." AND ".$cb." group by fecha,cliente.codcli DESC");
$tg=0;
$tc=0;
while($row = mysqli_fetch_array($result)) {
	echo "<br>";
	echo '<tr>';
	echo '<td>'.$row['cliente'].'</td>';
	echo '<td>'.$row['nombre'].'</td>';
	echo '<td>'.$row['fecha'].'</td>';
	echo '<td>'.$row['total'].'</td>';
	$tg=$tg+$row['total'];
	echo '<td>'.$row['cant'].'</td>';
	$tc=$tc+$row['cant'];
	echo '</tr>';
}

mysqli_close($con);
echo '</table>';
echo '<h4>Total General: '.$tg.'</h4>';
echo '<h4>Volumen de Ventas: '.$tc.'</h4>';
echo '</body>
</html>';
} else {
    //invalid action!
echo "nada";
}
?>
