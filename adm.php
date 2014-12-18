<?php 
echo '<script>
if (sessionStorage.getItem("tipo") === null || sessionStorage.getItem("tipo") === undefined ){
window.location.href = "index.php";
}

</script>';
require_once 'class/guia.class.php';
$vdia = Guias::singleton();
$uno = $vdia->guia_uno();

$vmes= Guias::singleton();
$dos = $vmes->guia_dos();

$vprod= Guias::singleton();
$cuatro = $vprod->guia_tres();

$vclie=Guias::singleton();
$tres=$vclie->guia_cuatro();

error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Káva Express</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="navbar  navbar-inverse navbar-fixed-top" role="navigation">
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



         <li><a href="ventas.php">Ventas</a></li>
         <li><a href="clientes.php">Clientes</a></li>
         <li><a href="productos.php">Articulos</a></li>
         <li><a href="compras.php">Egresos</a></li>
		 <li><a href="ingresos.php">Ingresos</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Estadísticas <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="graficos.php">Graficos</a></li>
            <li><a href="rep.php">Reportes</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Opciones <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="usuarios.php">Usuarios</a></li>
            <li><a href="detno.php">Detalles</a></li>
            <li><a href="cierre.php">Cierre de caja</a></li>
          </ul>
        </li>

            <li><a href="conexion/logout.php">Salir</a></li>
          </ul>
        </div>
      </div>
    </div>
    <br>
    <div class="container-fluid">
      <div class="row">
        
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main">

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="img/bar.png" class="img-responsive" alt="Generic placeholder thumbnail">

               <h5>Ventas del Día</h5>              
               <h4><span class="label label-primary"><?php echo $uno ?></span></h4>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="img/time.png" class="img-responsive" alt="Generic placeholder thumbnail">
              <h5>Ventas del Mes</h5>              
              <h4><span class="label label-primary"><?php echo $dos ?></span></h4>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="img/run.png" class="img-responsive" alt="Generic placeholder thumbnail">
	      <h5>Clientes</h5>                            
	      <h4><span class="label label-primary"><?php echo $tres ?></span></h4>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="img/produc.png" class="img-responsive" alt="Generic placeholder thumbnail">
              <h5>Articulos</h5>              
              <h4><span class="label label-primary"><?php echo $cuatro ?></span></h4>
            </div>
          </div>      
	<!-- disponilbe -->
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

