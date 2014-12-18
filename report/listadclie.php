<?php
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
$ntenda="LISTADO DE CLIENTES";
//pg_result($rtienda,0,'nombretienda');
//$ndire="Nombre de la tienda";
/*pg_result($rtienda,0,'direccion');*/

/*$verfecha="SELECT LOCALTIMESTAMP(1) AS FECHA";
$rf=pg_query($verfecha) or die (pg_last_error());*/
$ffecha=date("Y-m-d");
//pg_result($rf,0,'FECHA');

$pdf->Cell(135,5,$nom['descripcion'],0,0,'L',0);
$pdf->Cell(30,5,"FECHA: ".$ffecha,0,1,'R',1);
$pdf->Cell(135,5,$ntenda,0,0,'L',0);
$pdf->Cell(30,5,'',0,1,'R',1);
// Line break

// Line break
//$pdf->Ln(5);

//Table header
$pdf->Cell(15,10,'Codigo',0,0,'L',1);
$pdf->Cell(50,10,'Nombre',0,0,'L',1);
$pdf->Cell(25,10,'Direccion',0,0,'L',1);
$pdf->Cell(25,10,'Telefono',0,1,'L',1);

//Restore font and colors
$pdf->SetFont('Arial','',9);
$pdf->SetFillColor(225,255,255);
$pdf->SetTextColor(0);

$result = mysqli_query($con,"select codcli,nombre,direccion,telefono from cliente ORDER BY codcli");
$tg=0;
while($row = mysqli_fetch_array($result)) {
	$siape=$row['codcli'];
	$nome=$row['nombre'];
	$telef=$row['direccion'];
	$usu=$row['telefono'];
	$pdf->Cell(15,5,$siape,0,0,'L');
	$pdf->Cell(50,5,$nome,0,0,'L');
	$pdf->Cell(25,5,$telef,0,0,'L');
	$pdf->Cell(25,5,$usu,0,1,'L');
	$tg++;
}
mysqli_close($con);
$pdf->Ln(5);
$pdf->Cell(135,5,"Cantidad de Clientes: ".$tg,0,0,'L',0);
$pdf->Output('Listado_usuarios.pdf','I');
?>
