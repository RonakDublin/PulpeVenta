<?php session_start() ?>
<?php
echo '<script>
if (sessionStorage.getItem("tipo") === null || sessionStorage.getItem("tipo") === undefined ){
window.location.href = "index.php";
}
</script>';
	/* echo $_SESSION['nombre'];**/
	$hoy = date("Y-m-d");

	$arrayt = $_SESSION['cesta'];
	$tot=0;
	foreach($arrayt as $id => $producto)
	{
	//echo '<b>Total '.$tot=$tot+$producto['Pre'];
	$tot=$tot+$producto['Pre'] *$producto['Ca'];
	}
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
    <script src="js/jquery.min.js"></script> 
   
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

     <li><a id="uno" href="adm.php">Inicio</a></li>        

            <li><a href="conexion/logout.php">Salir</a></li>
          </ul>
        </div>
      </div>
    </div>
    <br>
    <div class="container-fluid">
      <div class="row">


	<!-- inicio -->        

  	<div class="col-md-12">

			
		<div class="row">
			<div class="col-md-12">
		<iframe id="PDFtoPrint" src="report/imtic.php" border="0" width="100%"  height="500px"></iframe>
		</div>
					 

		</div>
<br>

		<div class="row">
		
		 <div class="col-md-4">
			  <br>
			<a class="btn btn-success" href="conexion/delitem.php" role="button">Volver</a>
			  </div>
			   <br>
		</div>

	

    </div>



	<!-- fin -->
      </div>
    </div>



	<!-- inicio modal -->
<div class="modal fade" id="myUp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Mensaje</h4>
      </div>
      <div class="modal-body">
	 <form name="formedit" id="formedit">

		<div class="row">
	
		       <div class="col-md-8">
			     <label for="formGroupInputSmall">Cliente</label>
				 <div class="input-group">
				 <input type="text" class="form-control" id="valorCaja3" name="valorCaja3" required>
				 <span class="input-group-btn">
				   <button class="btn btn-success" type="button" onclick="realizaProceso($('#valorCaja3').val());return false;">Buscar</button>
				 </span>
		         </div>
			  </div>

		</div>

				<div id="resultado">No existen registros</div>
    

          <input type="hidden" name="bookId" id="bookId" value="" >
 
             <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
               <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
             </div>        
	 </form>
      </div>    
    </div>
  </div>
</div>




<div class="modal fade" id="myMens" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Mensaje</h4>
      </div>
      <div class="modal-body">
        Cambios Realizados.
	 <form name="formedit" id="formedit">
          <input type="hidden" name="bookId" id="bookId" value="" >
         	<div id="resultado"></div>   
             <div class="modal-footer">
               <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
             </div>        
	 </form>
      </div>    
    </div>
  </div>
</div>

<script type="text/javascript">
if (sessionStorage.getItem("tipo") == "1" ){
  var elemento = document.getElementById("uno");
   elemento.innerHTML = 'Inicio';
   elemento.href = "adm.php"
}else if(sessionStorage.getItem("tipo") == "2" ) {
  var elemento = document.getElementById("uno");
   elemento.innerHTML = 'Inicio';
   elemento.href = "func.php"
}   
</script>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

