<?php
include ("../conexion/conectar.php");
error_reporting(E_ALL);
ini_set('display_errors', '1');

///codigo
echo 'var barChartData = {';

$consulta = mysqli_query($con,"SELECT codven, fecha, SUM(total) as total FROM venta GROUP BY fecha");
$dos = array();
echo	'	labels : [';
for ($z = 0; $z < mysqli_num_rows($consulta); $z++) {
        $dos[] = mysqli_fetch_assoc($consulta);
        echo '"'.$dos[$z]['fecha'];
        if ($z <= (mysqli_num_rows($consulta)-2) ) {
			echo '",';
		}
    }
    
echo '"]';
echo ',
			datasets : [
				{
					fillColor : "rgba(151,187,205,0.5)",
					strokeColor : "rgba(151,187,205,0.8)",
					highlightFill : "rgba(151,187,205,0.75)",
					highlightStroke : "rgba(151,187,205,1)",
					data : [';
$consulta = mysqli_query($con,"SELECT codven, fecha, SUM(total) as total FROM venta GROUP BY fecha");
$dos = array();
for ($z = 0; $z < mysqli_num_rows($consulta); $z++) {
        $dos[] = mysqli_fetch_assoc($consulta);
        echo $dos[$z]['total'];
        if ($z <= (mysqli_num_rows($consulta)-2) ) {
			echo ",";
		}
    }
    
echo "]";
echo	'}
 			]

		}';
mysqli_close($con);
?>
