<?php
session_start();
//Example FPDF script with PostgreSQL
//Ribamar FS - ribafs@dnocs.gov.br
error_reporting(E_ALL);
ini_set('display_errors', '1');
if (empty($_SESSION['cesta'])) {
   //Not granting access for users with empty carts or when the session has expired
    echo "No existe resultados.!";
    exit;
}
require('fpdf.php');
include ("../conexion/conectar.php");
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetTitle('Reporte');   

//Set font and colors
$pdf->SetFont('Arial','',8);
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(0,0,0);
//Connection and query
$consulta = mysqli_query($con,"SELECT descripcion,direccion,telefono FROM tienda LIMIT 1");
$nom = mysqli_fetch_array($consulta);
$ntenda="Reporte de Compras";
//pg_result($rtienda,0,'nombretienda');
//$ndire="Nombre de la tienda";
/*pg_result($rtienda,0,'direccion');*/

/*$verfecha="SELECT LOCALTIMESTAMP(1) AS FECHA";
$rf=pg_query($verfecha) or die (pg_last_error());*/
$ffecha=date("Y-m-d");
//pg_result($rf,0,'FECHA');

$pdf->Cell(75,5,$nom['descripcion'],0,0,'C',0);
$pdf->Ln(4); 	
$pdf->Cell(75,5,$nom['direccion'],0,0,'C',0);
$pdf->Ln(4);
$pdf->Cell(75,5,$nom['telefono'],0,0,'C',0);
$pdf->Ln(4);
$pdf->Cell(26,5,"Fecha:"." ".$ffecha,0,0,'R',0);
//$pdf->Cell(135,5,$ntenda,0,0,'L',0);
$pdf->Cell(30,5,'',0,1,'R',1);
// Line break
//$pdf->Ln(5);
//$pdf->Cell(135,5,'LISTADO DE COMPRAS',0,0,'L',0);
// Line break
//$pdf->Ln(5);

//Table header
//$pdf->Cell(15,10,'Codigo',0,0,'L',1);
$pdf->Cell(35,5,'Descripcion',0,0,'L',1);
$pdf->Cell(10,5,'Cant.',0,0,'L',1);
$pdf->Cell(15,5,'Precio',0,0,'L',1);
$pdf->Cell(15,5,'Subt.',0,1,'L',1);

//Restore font and colors
$pdf->SetFont('Arial','',8);
$pdf->SetFillColor(225,255,255);
$pdf->SetTextColor(0);

//$result = mysqli_query($con,"select * from compra ORDER BY idcom");

$tot=0;
		$carrito = $_SESSION['cesta'];
		foreach($carrito as $id => $producto)
{	
	
	$itempro = $producto['Descri'];
	//$npro = $producto['Codigo'];
	$cantpro = $producto['Ca'];
	$prepro = $producto['Pre'];
	
	
	//$pdf->Cell(15,5,$npro,0,0,'L');
	$pdf->Cell(35,3,$itempro,0,0,'L');
	$pdf->Cell(10,3,$cantpro,0,0,'L');
	$pdf->Cell(15,3,$prepro,0,0,'L');
	$pdf->Cell(15,3,$cantpro * $prepro,0,1,'L');
	$tot=$tot+$producto['Pre'] *$producto['Ca'];
	unset( $_SESSION['cesta']);
	}
$pdf->Ln(3);
$pdf->Cell(110,5,"TOTAL: ".$tot,0,0,'C',0);
$pdf->Ln(4);
$client=$_SESSION['ccli'];
$consulta = mysqli_query($con,"SELECT nombre FROM cliente where codcli=".$client." LIMIT 1");
$nomcli = mysqli_fetch_array($consulta);

$pdf->Cell(35,5,"Cliente:"." ".$nomcli['nombre'],0,0,'L',0);
$pdf->Ln(4);
$pdf->Cell(47,5,"Nota valido solo para control interno",0,0,'C',0);
unset($_SESSION['ccli']);
mysqli_close($con);
$pdf->Output('ImpresionTicket.pdf','I');

?>
