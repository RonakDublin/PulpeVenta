<?php session_start() ?>
<?php echo '<script>
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
    <script type="text/javascript">
	function sumar() { 
	var valor2=verificar("valor2");  
    var valor1=verificar("valor1");
	// realizamos la suma de los valores y los ponemos en la casilla del 
	// formulario que contiene el total
	document.getElementById("valor3").value=parseInt(valor2)-parseInt(valor1); }

	//verificar los valores
	function verificar(id) { 
	var obj=document.getElementById(id);
 	if(obj.value=="") 
		value="0";
    else 
		value=obj.value;
	if(validate_importe(value)) 
	{ // marcamos como erroneo obj.style.borderColor="#808080";
	return value;
	}else{
	// marcamos como erroneo
	obj.style.borderColor="#f00";
	return 0;
	}
	}





	function validate_importe(value,decimal)
	{
	if(decimal==undefined)
	decimal=0;
	if(decimal==1)
	{
	// Permite decimales tanto por . como por ,
	var patron=new RegExp("^[0-9]+((,|\.)[0-9]{1,2})?$");
	}else{
	 // Numero entero normal 
	var patron=new RegExp("^([0-9])*$")
	} 
	if(value && value.search(patron)==0)
	{
	return true;
	}
	return false;
}



    </script>




 <script type="text/javascript">
function realizaProceso(valorCaja3){
        var parametros = {
                "valorCaja3" : valorCaja3
        };
        $.ajax({
                data:  parametros,
                url:   'bclie.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#resultado").html(response);
                }
        });
}

  </script>


<script type="text/javascript">
$(document).ready(function() {
$("#formtic").submit(function(event) {

	var mo=document.getElementById("valor2").value;
	var tp=document.getElementById("valor1").value;
	//console.log(tp);
	//console.log(mo);
	
	if(mo < tp || tp<=0){
	   alert("El monto es menor");
	}else{

	/* Stop form from submitting normally */
    event.preventDefault();

    /* Clear result div*/
    $("#result").html('');

    /* Get some values from elements on the page: */
    var valNew = $(this).serialize();

    /* Send the data using post and put the results in a div */
    $.ajax({
        url: 'instancias/insert_ventas.php',
        type: 'post',
        data: valNew,
        success: function(){
	$('#myMens').modal('show');
        setTimeout(function() {
        window.location.href = "impticket.php";
        }, 2000);


        },
        error:function(){
            alert("Error en el procesamiento de datos!");
            //$("#resultado").html('There is error while submit');

        }
    });

	}


    
});
});
</script>



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

	<form name="formtic" id="formtic" >  

		  <div class="col-md-4">
			<label for="formGroupInputSmall">Fecha</label>
			<input type="text" class="form-control" name="fecha" id="fecha" placeholder="" value="<?php echo $hoy;?>">
		  </div>

		  <div class="col-md-4">
			<label for="formGroupInputSmall">Cliente</label>
		     <div class="input-group">
			 <input type="text" id="clie" name="clie" class="form-control" value="" required>
			 <span class="input-group-btn">
			   <button class="open-Up btn btn-success" type="button" data-toggle="modal" data-target="#myUp">Buscar</button>
			 </span>
		     </div>
	      </div>

		 

	</div>
<br>

	<div class="row">
	
           <div class="col-md-4">
			<label for="formGroupInputSmall">Total a Pagar</label>
		     <input type="text" class="form-control" placeholder="" name="valor1" id="valor1" value="<?=$tot?>" required> 
		  </div>


           <div class="col-md-4">
			<label for="formGroupInputSmall">Monto</label>
		     <input type="text" class="form-control" placeholder="" id="valor2" onkeyup="sumar()" value="" required> 
		  </div>


           <div class="col-md-4">
			<label for="formGroupInputSmall">A devolver</label>
		     <input type="text" class="form-control" placeholder="" id="valor3" value="" required> 
		  </div>

	</div>

	<div class="row">
		<input type="hidden" name="ticId" id="ticId" value="" >
		       <div class="col-md-4">
			  <br>
				<a class="btn btn-danger" href="conexion/delitem.php" role="button">Cancelar</a> <button type="submit" class="btn btn-success">Cobrar</button> 
			  </div>

	</div>

    </div>

</form>

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
               <button type="button" class="btn btn-primary" data-dismiss="modal" >Aceptar</button>
             </div>        
	 </form>
      </div>    
    </div>
  </div>
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
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
   
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

