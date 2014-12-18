<?php
$ffecha=date("Y-m-d");
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=ListadoIngresos".$ffecha.".xls");  //File name extension was wrong
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
//echo "Some Text"; //no ending ; here

 
?>
<!DOCTYPE html>
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
<body>
<?php
include ("../conexion/conectar.php");
$consulta = mysqli_query($con,"SELECT UCASE(descripcion) as descripcion FROM tienda LIMIT 1");
$nom = mysqli_fetch_array($consulta);
echo '<h4>'.$nom['descripcion'].'</h4>';
?>
<h4>FECHA: <?php echo $ffecha;?></h4>
<h4>LISTADO DE INGRESOS</h4>
<table style="width:300px">
<tr>
  <th>Codigo</th>
  <th>Fecha</th>		
  <th>Descripcion</th>
  <th>Concepto</th>
  <th>Nro</th>
  <th>Monto</th>
</tr>

<?php


$result = mysqli_query($con,"SELECT * FROM ingresos order by idcom DESC");
$tg=0;
while($row = mysqli_fetch_array($result)) {
	echo "<br>";
	echo '<tr>';
	echo '<td>'.$row['idcom'].'</td>';
	echo '<td>'.$row['fecha'].'</td>';
	echo '<td>'.$row['descripcion'].'</td>';
	echo '<td>'.$row['concepto'].'</td>';
	echo '<td>'.$row['nro'].'</td>';
	echo '<td>'.$row['monto'].'</td>';
	echo '</tr>';
	$tg++;
}

mysqli_close($con);
?>
</table>
<h4>Cantidad de Compras: <?php echo $tg;?></h4>
</body>
</html>

