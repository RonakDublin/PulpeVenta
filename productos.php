<?php 
echo '<script>
if (sessionStorage.getItem("tipo") === null || sessionStorage.getItem("tipo") === undefined ){
window.location.href = "index.php";
}
</script>';
require_once 'class/produc.class.php';
$produc = Producs::singleton();
$data = $produc->get_productos();
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
     var myId = $(this).data('id');
     $(".modal-body #delId").val( myId );
     // As pointed out in comments, 
     // it is superfluous to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});
</script>


<script type="text/javascript">

$(document).on("click", ".open-Up", function () {
     var Idup = $(this).data('id');
     $(".modal-body #upId").val( Idup );

     var nombre = $("#descri" + Idup).html();
     $(".modal-body #desc").val( nombre );

     var direcci = $("#preci" + Idup).html();
     $(".modal-body #prev").val( direcci );

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
        url: 'instancias/delete_prod.php',
        type: 'post',
        data: values,
        success: function(){
	$('#myModal').modal('hide');
	$('#myMens').modal('show');
        setTimeout(function() {
        window.location.href = "productos.php";
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
        url: 'instancias/edit_prod.php',
        type: 'post',
        data: valup,
        success: function(){
	$('#myUp').modal('hide');
	$('#myMens').modal('show');
        setTimeout(function() {
        window.location.href = "productos.php";
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
        url: 'instancias/insert_prod.php',
        type: 'post',
        data: valNew,
        success: function(){
	$('#myNew').modal('hide');
	$('#myMens').modal('show');
        setTimeout(function() {
        window.location.href = "productos.php";
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
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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

<div class="row">
  <div class="col-md-4"><h4>LISTADO DE ARTICULOS</h4></div>
  <div class="col-md-4"></div>
  <div class="col-md-4"><a class="btn btn-success btn-sm" data-toggle="modal" data-target="#myNew">
  <span class="glyphicon glyphicon-plus"></span> Nuevo Articulo
</a> <a class="btn btn-info btn-sm" href="report/listproex.php">
  <span class="glyphicon glyphicon-export"></span> Excel
</a> <a class="btn btn-info btn-sm" href="report/listaprod.php" target="_blank">
  <span class="glyphicon glyphicon-floppy-save"></span> PDF
</a></div>
</div>

          <br>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Descripción</th>                
                  <th>Precio Venta</th>
                  <th>Eliminar</th>
                  <th>Editar</th>
                </tr>
              </thead>
              <tbody>
            <?php
            foreach($data as $fila):
            ?>
	        <tr>
									<td id="descri<?=$fila['codpro']?>"><?=$fila['descripcion']?></td>									
									<td id="preci<?=$fila['codpro']?>"><?=$fila['precio']?></td>
									<td id="eliminar"><a class="open-EditRow btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal" data-id="<?=$fila['codpro']?>">
  <span class="glyphicon glyphicon-remove"></span> Eliminar
</a></td>
									 
									<td id="editar"><button class="open-Up btn btn-warning btn-xs" data-toggle="modal" data-target="#myUp" data-id="<?=$fila['codpro']?>">
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
        Desea eliminar el artículo?
	 <form name="formedit" id="formedit">
          <input type="hidden" name="delId" id="delId" value="" >
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
             <label for="nombrecliente">Descripción</label>
             <input class="form-control" type="text" name="desc" id="desc" value="" required autofocus>		
           </div>
           <div class="form-group">
             <label for="dircliente">Precio</label>
             <input class="form-control" type="text" name="prev" id="prev" value="" required>		
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
             <label for="nombrecliente">Descripción</label>
             <input class="form-control" type="text" name="descrinew" id="descrinew" placeholder="Descripcion" required autofocus>		
           </div>
           <div class="form-group">
             <label for="dircliente">Precio</label>
             <input class="form-control" type="text" name="precinew" id="precinew" placeholder="Precio" required>		
           </div>
           <div id="resultado"></div>   
             <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
               <button type="submit" class="btn btn-primary">Aceptar</button>
             </div> 
             <input type="hidden" name="Newpro" id="Newpro" value="Newpro" >       
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




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/modal.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

