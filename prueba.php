<?php
$p='o';
$n="'%".$p."%'";

    $conn = new PDO('mysql:host=localhost;dbname=ventas', 'root', 'samu1X7');
 
	$sql = 'SELECT * FROM cliente where nombre like'.$n.'';
	 
	$q      = $conn->query($sql) or die("failed!");
	 
	while($r = $q->fetch(PDO::FETCH_ASSOC)){
	 
	echo $r['nombre'];
	 
	}
$u=-3;
if($u <= 0){
	echo "0";
	}

?>
