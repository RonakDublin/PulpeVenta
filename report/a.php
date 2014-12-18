<?php
include ("../conexion/conectar.php");
error_reporting(E_ALL);
ini_set('display_errors', '1');
$consuldos = mysqli_query($con,"SELECT YEAR( fecha ) AS an, MONTH( fecha ) AS mes, SUM( total ) AS total FROM venta GROUP BY YEAR( fecha ) , MONTH( fecha ) ORDER BY YEAR( fecha ) , MONTH( fecha ) DESC LIMIT 5 ");
$aru = array(); //creamos un array
$ard=array();
    //guardamos en un array multidimensional todos los datos de la consulta
    $i=0;
 
    while($row = mysqli_fetch_array($consuldos))
    {
        $aru[$i] = $row['an']."-".$row['mes'];
		$ard[$i]=$row['total'];
        $i++;
    } 
//      $myArray = getArraySQL($consulta);
        echo json_encode($aru);
		echo json_encode($ard);
//print_r($rawdata);
mysqli_close($con);
?>
