<?php
include ("../conexion/conectar.php");
error_reporting(E_ALL);
ini_set('display_errors', '1');
$consulta = mysqli_query($con,"SELECT codven, fecha, SUM(total) as total FROM venta GROUP BY fecha");
$rawdata = array(); //creamos un array
 
    //guardamos en un array multidimensional todos los datos de la consulta
    $i=0;
 
    while($row = mysqli_fetch_array($consulta))
    {
        $rawdata[$i] = $row;
        $i++;
    }
 
    disconnectDB($con); //desconectamos la base de datos
 
    return $rawdata; //devolvemos el array
}
 
        $myArray = getArraySQL($consulta);
        echo json_encode($myArray);

//mysqli_close($con);
?>
