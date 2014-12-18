<?php
echo '<script>
if (sessionStorage.getItem("tipo") === null || sessionStorage.getItem("tipo") === undefined ){
window.location.href = "index.php";
}
</script>';
require_once 'class/users.class.php';
$users = users::singleton();
$data = $users->get_usuarios();
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

     var nombre = $("#nombre" + Idup).html();
     $(".modal-body #nome").val( nombre );

     var direcci = $("#direc" + Idup).html();
     $(".modal-body #dire").val( direcci );

     var rucli = $("#ruc" + Idup).html();
     $(".modal-body #ruclie").val( rucli );

     var telcli = $("#tel" + Idup).html();
     $(".modal-body #teleclie").val( telcli );


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
        url: 'instancias/delete_user.php',
        type: 'post',
        data: values,
        success: function(){
	$('#myModal').modal('hide');
	$('#myMens').modal('show');
        setTimeout(function() {
        window.location.href = "clientes.php";
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
        url: 'instancias/edit_user.php',
        type: 'post',
        data: valup,
        success: function(){
	$('#myUp').modal('hide');
	$('#myMens').modal('show');
        setTimeout(function() {
        window.location.href = "clientes.php";
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
        url: 'instancias/insert_user.php',
        type: 'post',
        data: valNew,
        success: function(){
	$('#myNew').modal('hide');
	$('#myMens').modal('show');
        setTimeout(function() {
        window.location.href = "clientes.php";
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

        <li><a id="uno" href="<?php echo $dire;?>">Inicio</a></li>
		

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
  <div class="col-md-4"><h4>LISTADO DE CLIENTES</h4></div>
  <div class="col-md-4"></div>
  <div class="col-md-4"><a class="btn btn-success btn-sm" data-toggle="modal" data-target="#myNew">
  <span class="glyphicon glyphicon-plus"></span> Nuevo Cliente
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
									<td id="nombre<?=$fila['codcli']?>"><?=$fila['nombre']?></td>
									<td id="direc<?=$fila['codcli']?>"><?=$fila['direccion']?></td>
									<td id="ruc<?=$fila['codcli']?>"><?=$fila['ruc']?></td>
									<td id="tel<?=$fila['codcli']?>"><?=$fila['telefono']?></td>
									<td id="eliminar"><a class="open-EditRow btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal" data-id="<?=$fila['codcli']?>">
  <span class="glyphicon glyphicon-remove"></span> Eliminar
</a></td>
									 
									<td id="editar"><button class="open-Up btn btn-warning btn-xs" data-toggle="modal" data-target="#myUp" data-id="<?=$fila['codcli']?>">
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
        Desea eliminar el registro?
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
             <label for="nombrecliente">Nombre</label>
             <input class="form-control" type="text" name="nome" id="nome" value="" required autofocus>		
           </div>
           <div class="form-group">
             <label for="dircliente">Dirección</label>
             <input class="form-control" type="text" name="dire" id="dire" value="" required>		
           </div>
           <div class="form-group">
             <label for="ruccliente">Ruc</label>
             <input class="form-control" type="text" name="ruclie" id="ruclie" value="" required>		
           </div>
           <div class="form-group">
             <label for="tecliente">Ruc</label>
             <input class="form-control" type="text" name="teleclie" id="teleclie" value="" required>		
           </div>
           <div id="resultado"></div>   
             <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
               <button type="submit" class="btn btn-primary">Aceptar</button>
             </div>      
             <input type="hidden" name="upId" id="upId" value="" >  
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
             <label for="nombrecliente">Nombre</label>
             <input class="form-control" type="text" name="nome" id="nome" placeholder="Nombre" required autofocus>		
           </div>
           <div class="form-group">
             <label for="dircliente">Dirección</label>
             <input class="form-control" type="text" name="dire" id="dire" placeholder="Dirección" required>		
           </div>
           <div class="form-group">
             <label for="dircliente">Ruc</label>
             <input class="form-control" type="text" name="ruclie" id="ruclie" placeholder="Ruc" required>		
           </div>
	   <div class="form-group">
             <label for="dircliente">Teléfono</label>
             <input class="form-control" type="text" name="tclie" id="tclie" placeholder="Telefono" required>		
           </div>
           <div id="resultado"></div>   
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

