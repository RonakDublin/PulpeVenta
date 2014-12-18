<?php
$ffecha=date("Y-m-d");
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=ListadoUsuarios".$ffecha.".xls");  //File name extension was wrong
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
<h4>LISTADO DE USUARIOS</h4>
<table style="width:300px">
<tr>
  <th>Codigo</th>
  <th>Nombre</th>		
  <th>Correo</th>
  <th>Usuario</th>
  <th>Nivel</th>
</tr>

<?php


$result = mysqli_query($con,"SELECT * FROM usuario order by codusu");
$tg=0;
while($row = mysqli_fetch_array($result)) {
	echo "<br>";
	echo '<tr>';
	echo '<td>'.$row['codusu'].'</td>';
	echo '<td>'.$row['nombre'].'</td>';
	echo '<td>'.$row['correo'].'</td>';
	echo '<td>'.$row['user'].'</td>';
			if ($row['tipo']==1){
				$ftu="Administrador";
			}else{
				$ftu="Funcionario";									
				}
	
	
	
	echo '<td>'.$ftu.'</td>';
	echo '</tr>';
	$tg++;
}

mysqli_close($con);

?>
</table>
<h4>Cantidad de Usuarios: <?php echo $tg;?></h4>
</body>
</html>

