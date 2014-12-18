<?php
if ($_POST["action"] == 'PDF') {
$u = $_POST["vuno"];
$d = $_POST["ciuno"];
$t="'".$u."'";
$c="'".$d."'";
//Example FPDF script with PostgreSQL
//Ribamar FS - ribafs@dnocs.gov.br
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
//$ntenda="Reporte de Ventas";
//pg_result($rtienda,0,'nombretienda');
//$ndire="Nombre de la tienda";
/*pg_result($rtienda,0,'direccion');*/

/*$verfecha="SELECT LOCALTIMESTAMP(1) AS FECHA";
$rf=pg_query($verfecha) or die (pg_last_error());*/
$ffecha=date("Y-m-d");
//pg_result($rf,0,'FECHA');

$pdf->Cell(135,5,$nom['descripcion'],0,0,'L',0);
$pdf->Cell(30,5,"FECHA: ".$ffecha,0,1,'R',1);
$pdf->Cell(135,5,"INGRESOS DEL: ".$u." AL ".$d,0,0,'L',0);
$pdf->Cell(30,5,'',0,1,'R',1);
// Line break

//$pdf->Cell(135,5,'VENTA POR FECHAS',0,0,'L',0);
// Line break

//Table header
$pdf->Cell(25,10,'Fecha',0,0,'L',1);
$pdf->Cell(40,10,'Descripcion',0,0,'L',1);
$pdf->Cell(35,10,'Nro.',0,0,'L',1);
$pdf->Cell(25,10,'Monto.',0,1,'L',1);


//Restore font and colors
$pdf->SetFont('Arial','',9);
$pdf->SetFillColor(225,255,255);
$pdf->SetTextColor(0);

$result = mysqli_query($con,"SELECT idcom,fecha,descripcion,nro,monto FROM ingresos where date(fecha) BETWEEN ".$t." AND ".$c." order by idcom DESC");
$tg=0;
while($row = mysqli_fetch_array($result)) {
	$siape=$row['fecha'];
	$nome=$row['descripcion'];
	$telef=$row['nro'];
	$tm=$row['monto'];
	$tg=$tg+$tm;
	$pdf->Cell(25,5,$siape,0,0,'L');
	$pdf->Cell(40,5,$nome,0,0,'L');
	$pdf->Cell(35,5,$telef,0,0,'L');
	$pdf->Cell(25,5,$tm,0,1,'L');
	
}
$pdf->Ln(5);
$pdf->Cell(135,5,"Total General: ".$tg,0,0,'L',0);
mysqli_close($con);
$pdf->Output('Listado_ventasfechas.pdf','I');
} else if ($_POST['action'] == 'EX') {
$fe=date("Y-m-d");
$u = $_POST["vuno"];
$d = $_POST["ciuno"];
$t="'".$u."'";
$c="'".$d."'";


header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=ListadoIngresosxFecha".$fe.".xls");  //File name extension was wrong
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
echo '<h4>INGRESOS DEL: '.$u.' AL '.$d.'</h4>
<table style="width:300px">
<tr>
  <th>Fecha</th>
  <th>Descripcion</th>		
  <th>Nro.</th>
  <th>Monto</th>
</tr>';




$result = mysqli_query($con,"SELECT idcom,fecha,descripcion,nro,monto FROM ingresos where date(fecha) BETWEEN ".$t." AND ".$c." order by idcom DESC");
$tg=0;
while($row = mysqli_fetch_array($result)) {
	echo "<br>";
	echo '<tr>';
	echo '<td>'.$row['fecha'].'</td>';
	echo '<td>'.$row['descripcion'].'</td>';
	echo '<td>'.$row['nro'].'</td>';
	echo '<td>'.$row['monto'].'</td>';
	$tg++;
	echo '</tr>';
}

mysqli_close($con);
echo '</table>';
echo '<h4>Total General: '.$tg.'</h4>';
echo'</body>
</html>';




} else {
    //invalid action!
echo "nada";
}
?>
