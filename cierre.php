<?php
echo '<script>
if (sessionStorage.getItem("tipo") === null || sessionStorage.getItem("tipo") === undefined ){
window.location.href = "index.php";
}
</script>';
require_once 'class/cierre.class.php';
$users = Caja::singleton();
$data = $users->get_cierre();

$entr=Caja::singleton();
$dent=$entr->get_entradas();

$sa=Caja::singleton();
$sald=$sa->get_cambio();

$com=Caja::singleton();
$compr=$com->get_compras();

$ven=Caja::singleton();
$vents=$ven->get_ventas();
if($vents==""){
	$vents=0;
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
    <link rel="text/javascript" href="js/bootstrap.js">
    
    <script src="js/jquery.min.js"></script>
    



<script type="text/javascript">
$(document).ready(function() {
$("#formNew").submit(function(event) {
	var v1=document.getElementById("cb").value;
	var v2=document.getElementById("sal").value;
	var re=document.getElementById("reti").value;
	console.log(v1);
	console.log(v2);
	
	if(re < 0 || cb < 0 ){
	   alert("Verifique los datos");
	   document.getElementById('reti').value="";
	}else{
    /* Stop form from submitting normally */
    event.preventDefault();

    /* Clear result div*/
    $("#result").html('');

    /* Get some values from elements on the page: */
    var valNew = $(this).serialize();

    /* Send the data using post and put the results in a div */
    $.ajax({
        url: 'instancias/insert_cierre.php',
        type: 'post',
        data: valNew,
        success: function(){
	$('#myNew').modal('hide');
	$('#myMens').modal('show');
        setTimeout(function() {
        window.location.href = "cierre.php";
        }, 2000);


        },
        error:function(){
            alert("Error en el procesamiento de datos!");
            $("#resultado").html('There is error while submit');
        }
    });
    }
});
});
</script>

<script type="text/javascript">
	function retirar() { 
	var valor2=verificar("sal");  
    var valor1=verificar("reti");
	// realizamos la suma de los valores y los ponemos en la casilla del 
	// formulario que contiene el total
	document.getElementById("cb").value=parseInt(valor2)-parseInt(valor1); }
	
	
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
          <a class="navbar-brand" href="adm.php">Káva Express</a>
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
        
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main">

<div class="row">
  <div class="col-md-4"><h4>CIERRE DE CAJA</h4></div>
  <div class="col-md-4"></div>
  <div class="col-md-4"><a class="openN btn btn-success btn-sm" data-toggle="modal" data-target="#myNew">
  <span class="glyphicon glyphicon-plus"></span> Cerrar Caja
</a> <a class="btn btn-info btn-sm" href="report/clieex.php">
  <span class="glyphicon glyphicon-export"></span> Excel
</a> <a class="btn btn-info btn-sm" href="report/listadclie.php" target="_blank">
  <span class="glyphicon glyphicon-floppy-save"></span> PDF
</a></div>
</div>

          <br>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Dirección</th>
                  <th>Ruc</th>
                  <th>Teléfono</th>
                  <th>Eliminar</th>
                  <th>Editar</th>
                </tr>
              </thead>
              <tbody>
            <?php
            foreach($data as $fila):
            ?>
	        <tr>
									<td id="nombre<?=$fila['idcierre']?>"><?=$fila['descri']?></td>
									<td id="direc<?=$fila['idcierre']?>"><?=$fila['saldoanterior']?></td>
									<td id="ruc<?=$fila['idcierre']?>"><?=$fila['fechain']?></td>
									<td id="tel<?=$fila['idcierre']?>"><?=$fila['fechafin']?></td>
									<td id="eliminar"><a class="open-EditRow btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal" data-id="<?=$fila['idcierre']?>">
  <span class="glyphicon glyphicon-remove"></span> Eliminar
</a></td>
									 
									<td id="editar"><button class="open-Up btn btn-warning btn-xs" data-toggle="modal" data-target="#myUp" data-id="<?=$fila['idcierre']?>">
  <span class="glyphicon glyphicon-pencil"></span> Editar
</button></td>
									</tr>
						
					
					
					<?php
            endforeach;
            ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

<!-- Button trigger modal -->


<!-- Modal -->


<?php
  foreach($sald as $fila):
    $ant=$fila['cambio'];
    $antfe=$fila['fechafin'];
  endforeach;
  
  if($dent==""){
	  $dent="0";
	  }
   $actual=$ant+$vents+$dent;
   if($actual==""){
	   $actual=0;
	   }
   if($compr==""){
	   $compr="0";
	   }
	   $actual=$actual-$compr;
?>

<div class="modal fade" id="myNew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Cerrar Caja</h4>
      </div>
      <div class="modal-body">
	 <form name="formNew" id="formNew" role="form">
           <div class="form-group">
             <label for="nombrecliente">Saldo Anterior</label>
             <input class="form-control" type="text" name="san" id="san" value="<?php echo $ant?>" readonly>		
           </div>
           <div class="form-group">
             <label for="dircliente">Entradas</label>
             <input class="form-control" type="text" name="en" id="en" value="<?php echo $dent;?>" readonly>		
           </div>
           <div class="form-group">
             <label for="dircliente">Salidas</label>
             <input class="form-control" type="text" name="saida" id="saida" value="<?php echo $compr?>" readonly>		
           </div>
	   <div class="form-group">
             <label for="dircliente">Caja</label>
             <input class="form-control" type="text" name="ca" id="ca" value="<?php echo $vents?>" readonly>		
           </div>
           <div class="form-group">
             <label for="dircliente">Saldo actual</label>
             <input class="form-control" type="text" name="sal" id="sal" value="<?php echo $actual?>" readonly>		
           </div>
           <div class="form-group">
             <label for="dircliente">Importe a retirar</label>
             <input class="form-control" type="text" name="reti" id="reti" onkeyup="retirar()" required>		
           </div>
           <div id="resultado"></
             <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
               <button type="submit" class="btn btn-primary">Aceptar</button>
             </div> 
             <input type="hidden" name="cb" id="cb" >
             <input type="hidden" name="data" id="data" value="<?php echo $antfe?>">
             <input type="hidden" name="Newcli" id="Newcli" value="Newcli" >       
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
    <script src="js/modal.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

