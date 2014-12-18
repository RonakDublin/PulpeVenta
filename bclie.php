<!DOCTYPE html>
<html>

<body>

</body>
<script type="text/javascript">

function myFunction(cid) {
	var idp=cid;
  

	document.getElementById("ticId").setAttribute('value',idp);

	var nombre = $("#no" + idp).html();
	document.getElementById("clie").setAttribute('value',nombre);
	$("#myUp").modal('hide');
}

</script>
</html>


<?php
$re=$_POST['valorCaja3'];
$nom = "'%".$re."%'";
//echo $nom;
$conn = new PDO('mysql:host=localhost;dbname=ventas', 'root', 'samu1X7');
 
	$sql = 'SELECT * FROM cliente where nombre like'.$nom.' or ruc like '.$nom.'';
	 
	$q      = $conn->query($sql) or die("No se encuentra resultados");
	

	while($r = $q->fetch(PDO::FETCH_ASSOC)){
	/*echo"<br id=no".$r['codcli'].">";
    echo"<tr><td>";
	echo $r['nombre']."<br id=".$r['codcli']." value></td>" ;
	echo"<td>".$r['ruc']."<br></td>";
	echo"</tr>";*/


	echo '<li id="no'.$r['codcli'].'">'.$r['nombre'].'</li>';
	echo "<li>".$r['ruc']."</li>";
	echo '<li><a class="open-Up btn btn-success btn-xs" role="button" id="'.$r['codcli'].'" onclick="myFunction(this.id)"><span class="glyphicon glyphicon-ok"></span> Seleccionar</a><input type="hidden" name="secId" id="secId" value="'.$r['codcli'].'" ></li><br>';
	}

	
?>

