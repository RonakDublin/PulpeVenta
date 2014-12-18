<?php
echo '<script>
if (sessionStorage.getItem("tipo") === null || sessionStorage.getItem("tipo") === undefined ){
window.location.href = "index.php";
}
</script>';
include ("conexion/conectar.php");
error_reporting(E_ALL);
ini_set('display_errors', '1');
$consulta = mysqli_query($con,"SELECT fecha, SUM(total) as total FROM venta GROUP BY fecha order by fecha desc limit 6");
$rawdata = array(); //creamos un array
$va=array();
    //guardamos en un array multidimensional todos los datos de la consulta
    $i=0;
 
    while($row = mysqli_fetch_array($consulta))
    {
        $rawdata[$i] = $row['fecha'];
		$va[$i]=$row['total'];
        $i++;
    }

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

?>
<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <title>Káva Express</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/dashboard.css">

	<script src="report/Chart.js"></script>





    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Káva Express</a>
        </div>
        <div class="navbar-collapse collapse">
          
	  <ul class="nav navbar-nav navbar-right">

     <li><a href="adm.php">Inicio</a></li>       
            <li><a href="conexion/logout.php">Salir</a></li>
          </ul>
        </div>
      </div>
    </div>
    <br>
    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main">
	<!-- inicio -->        
        <h3>Ventas acumuladas</h3>
  		<div style="width: 50%" >
			<canvas id="canvas" height="450" width="600"></canvas>
		</div>

		<script type="text/javascript">
var barChartData = {
		labels : <?php echo json_encode($rawdata); ?> ,
		datasets : [
			
			{
				fillColor : "rgba(151,187,205,0.5)",
				strokeColor : "rgba(151,187,205,0.8)",
				highlightFill : "rgba(151,187,205,0.75)",
				highlightStroke : "rgba(151,187,205,1)",
				data : <?php echo json_encode($va); ?>
			}
		]

	}


var ChartData = {
		labels : <?php echo json_encode($aru); ?> ,
		datasets : [
			
			{
				fillColor : "rgba(151,187,205,0.5)",
				strokeColor : "rgba(151,187,205,0.8)",
				highlightFill : "rgba(151,187,205,0.75)",
				highlightStroke : "rgba(151,187,205,1)",
				data : <?php echo json_encode($ard); ?>
			}
		]

	}




		window.onload = function(){

				var ctx = document.getElementById("canvas").getContext("2d");
				window.myBar = new Chart(ctx).Bar(barChartData, {
					responsive : true
				});

				var ctz = document.getElementById("candos").getContext("2d");
				window.myBar = new Chart(ctz).Bar(ChartData, {
					responsive : true
				});



			}
			</script>
	<!-- fin -->

        <h3>Ventas mensuales</h3>
		<div style="width: 50%" >
			<canvas id="candos" height="450" width="600"></canvas>
		</div>

		
      	</div>

	</div>

   </div>
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

