<?php
echo '<script>
if (sessionStorage.getItem("tipo") === null || sessionStorage.getItem("tipo") === undefined ){
window.location.href = "index.php";
}
</script>'; 
require_once 'class/shop.class.php';
$users = Shopp::singleton();
$data = $users->get_shop();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Káva Express</title>

    <!-- Bootstrap -->
    <script src="js/jquery.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/dashboard.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <link rel="text/javascript" href="js/bootstrap.js">
    

    
<script type="text/javascript">

$(document).on("click", ".open-EditRow", function () {
     var myBookId = $(this).data('id');
     $(".modal-body #bookId").val( myBookId );
     // As pointed out in comments, 
     // it is superfluous to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});
</script>


<script type="text/javascript">

$(document).on("click", ".open-Up", function () {
     var Idup = $(this).data('id');
     $(".modal-body #upId").val( Idup );

     var nombre = $("#u" + Idup).html();
     $(".modal-body #date-picker-6").val( nombre );
	 $(".modal-body #fc").val( nombre );

     var direcci = $("#d" + Idup).html();
     $(".modal-body #de").val( direcci );

     var coto = $("#cto" + Idup).html();
     $(".modal-body #con").val( coto );

     var rucli = $("#t" + Idup).html();
     $(".modal-body #nr").val( rucli );

     var telcli = $("#c" + Idup).html();
     $(".modal-body #mo").val( telcli );


//console.log(nombre);
//console.log(Idup);
     // As pointed out in comments, 
     // it is superfluous to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});
</script>


<script type="text/javascript">
$(document).ready(function() {
$("#formedit").submit(function(event) {

    /* Stop form from submitting normally */
    event.preventDefault();

    /* Clear result div*/
    $("#result").html('');

    /* Get some values from elements on the page: */
    var values = $(this).serialize();

    /* Send the data using post and put the results in a div */
    $.ajax({
        url: 'instancias/delete_shop.php',
        type: 'post',
        data: values,
        success: function(){
	$('#myModal').modal('hide');
	$('#myMens').modal('show');
        setTimeout(function() {
        window.location.href = "compras.php";
        }, 2000);


        },
        error:function(){
            alert("Error en el procesamiento de datos!");
            $("#resultado").html('Error en el procesamiento de datos!');
        }
    });
});
});
</script>


<script type="text/javascript">
$(document).ready(function() {
$("#formUp").submit(function(event) {

    /* Stop form from submitting normally */
    event.preventDefault();

    /* Clear result div*/
    $("#result").html('');

    /* Get some values from elements on the page: */
    var valup = $(this).serialize();

    /* Send the data using post and put the results in a div */
    $.ajax({
        url: 'instancias/edit_shop.php',
        type: 'post',
        data: valup,
        success: function(){
	$('#myUp').modal('hide');
	$('#myMens').modal('show');
        setTimeout(function() {
        window.location.href = "compras.php";
        }, 2000);


        },
        error:function(){
            alert("Error en el procesamiento de datos!");
            $("#resultado").html('Error en el procesamiento de datos!');
        }
    });
});
});
</script>

<script type="text/javascript">
$(document).ready(function() {
$("#formNew").submit(function(event) {

    /* Stop form from submitting normally */
    event.preventDefault();

    /* Clear result div*/
    $("#result").html('');

    /* Get some values from elements on the page: */
    var valNew = $(this).serialize();

    /* Send the data using post and put the results in a div */
    $.ajax({
        url: 'instancias/insert_shop.php',
        type: 'post',
        data: valNew,
        success: function(){
	$('#myNew').modal('hide');
	$('#myMens').modal('show');
        setTimeout(function() {
        window.location.href = "compras.php";
        }, 2000);


        },
        error:function(){
            alert("Error en el procesamiento de datos!");
            $("#resultado").html('There is error while submit');
        }
    });
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
  <div class="col-md-4"><h4>LISTADO DE EGRESOS</h4></div>
  <div class="col-md-4"></div>
  <div class="col-md-4"><a class="btn btn-success btn-sm" data-toggle="modal" data-target="#myNew">
  <span class="glyphicon glyphicon-plus"></span> Nuevo Egreso
</a> <a class="btn btn-info btn-sm" href="report/shopex.php">
  <span class="glyphicon glyphicon-export"></span> Excel
</a> <a class="btn btn-info btn-sm" href="report/listadshop.php" target="_blank">
  <span class="glyphicon glyphicon-floppy-save"></span> PDF
</a></div>
</div>

          <br>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Fecha</th>
                  <th>Descripcion</th>
                  <th>Concepto</th>
                  <th>Nro.</th>
                  <th>Monto</th>
                  <th>Eliminar</th>
                  <th>Editar</th>
                </tr>
              </thead>
              <tbody>
            <?php
            foreach($data as $fila):
            ?>
	        <tr>
									<td id="u<?=$fila['idcom']?>"><?=$fila['fecha']?></td>
									<td id="d<?=$fila['idcom']?>"><?=$fila['descripcion']?></td>
									<td id="cto<?=$fila['idcom']?>"><?=$fila['concepto']?></td>
									<td id="t<?=$fila['idcom']?>"><?=$fila['nro']?></td>
									<td id="c<?=$fila['idcom']?>"><?=$fila['monto']?></td>
									<td id="eliminar"><a class="open-EditRow btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal" data-id="<?=$fila['idcom']?>">
  <span class="glyphicon glyphicon-remove"></span> Eliminar
</a></td>
									 
									<td id="editar"><button class="open-Up btn btn-warning btn-xs" data-toggle="modal" data-target="#myUp" data-id="<?=$fila['idcom']?>">
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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Mensaje</h4>
      </div>
      <div class="modal-body">
        Desea eliminar la compra?
	 <form name="formedit" id="formedit">
          <input type="hidden" name="bookId" id="bookId" value="" >
         	<div id="resultado"></div>   
             <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
               <button type="submit" class="btn btn-primary">Aceptar</button>
             </div>        
	 </form>
      </div>    
    </div>
  </div>
</div>



<div class="modal fade" id="myUp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Editar</h4>
      </div>
      <div class="modal-body">
	 <form name="formUp" id="formUp" role="form">
           <div class="form-group">
             <label for="nombrecliente">Fecha</label>
			 <input id="date-picker-6" type="text" class="date-pickerw form-control" required>
           </div>
		  <script type="text/javascript">
			$(".date-pickerw").datepicker({ dateFormat: "yy-mm-dd", altField: '#fc', altFormat: 'yy-mm-dd'});
		
						var monthNames = $( ".date-pickerw" ).datepicker( "option", "monthNames" );
						// setter
						$( ".date-pickerw" ).datepicker( "option", "monthNames", [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ] );		
						// getter
						var dayNamesMin = $( ".date-pickerw" ).datepicker( "option", "dayNamesMin" );
						// setter
						$( ".date-pickerw" ).datepicker( "option", "dayNamesMin", [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ] );
			</script>
           <div class="form-group">
             <label for="dircliente">Descripcion</label>
             <input class="form-control" type="text" name="de" id="de" value="" required>		
           </div>
           <div class="form-group">
             <label for="ruccliente">Concepto</label>
             <input class="form-control" type="text" name="con" id="con" value="" required>		
           </div>
           <div class="form-group">
             <label for="tecliente">Nro</label>
             <input class="form-control" type="text" name="nr" id="nr" value="" required>		
           </div>
           <div class="form-group">
             <label for="tecliente">Monto</label>
             <input class="form-control" type="text" name="mo" id="mo" value="" required>		
           </div>
           <div id="resultado"></div>   
             <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
               <button type="submit" class="btn btn-primary">Aceptar</button>
             </div>      
             <input type="hidden" name="upId" id="upId" value="" > 
			<input type="hidden" name="fc" id="fc" value="" >   
	 </form>
      </div>    
    </div>
  </div>
</div>


<div class="modal fade" id="myNew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Nuevo</h4>
      </div>
      <div class="modal-body">
	 <form name="formNew" id="formNew" role="form">
           <div class="form-group">
             <label for="nombrecliente">Fecha</label>
				<input id="date-picker-5" type="text" class="date-pickerc form-control" required>
           </div>
			<script type="text/javascript">
			$(".date-pickerc").datepicker({ dateFormat: "yy-mm-dd", altField: '#fcc', altFormat: 'yy-mm-dd'});
		
						var monthNames = $( ".date-pickerc" ).datepicker( "option", "monthNames" );
						// setter
						$( ".date-pickerc" ).datepicker( "option", "monthNames", [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ] );		
						// getter
						var dayNamesMin = $( ".date-pickerc" ).datepicker( "option", "dayNamesMin" );
						// setter
						$( ".date-pickerc" ).datepicker( "option", "dayNamesMin", [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ] );
			</script>
           <div class="form-group">
             <label for="dircliente">Descripcion</label>
             <input class="form-control" type="text" name="des" id="des" placeholder="Descripcion" required>		
           </div>
           <div class="form-group">
             <label for="dircliente">Concepto</label>
             <input class="form-control" type="text" name="conce" id="conce" placeholder="Concepto" required>		
           </div>
	       <div class="form-group">
             <label for="dircliente">Nro.</label>
             <input class="form-control" type="text" name="nr" id="nr" placeholder="Nro" required>		
           </div>
		   <div class="form-group">
             <label for="dircliente">Monto</label>
             <input class="form-control" type="text" name="mon" id="mon" placeholder="Monto" required>		
           </div>
           <div id="resultado"></div>   
			<input type="hidden" name="fcc" id="fcc" value="" >  
             <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
               <button type="submit" class="btn btn-primary">Aceptar</button>
             </div> 
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

