<?php session_start() ?>
<?php echo '<script>
if (sessionStorage.getItem("tipo") === null || sessionStorage.getItem("tipo") === undefined ){
window.location.href = "index.php";
}
</script>';
require_once 'class/listado.class.php';
$listas = Lista::singleton();
$data = $listas->get_listado();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Káva Express</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link href="css/dashboard.css" rel="stylesheet">
    <link rel="text/javascript" href="js/bootstrap.js">
    
    <script src="js/jquery.min.js"></script>

<script>
function myFunction() {
    window.parent.open("ticket.php","_self");
}
</script>
<script type="text/javascript">

$(document).on("click", ".open-EditRow", function () {
     var Idproduct = $(this).data('id');
     $(".modal-body #del").val( Idproduct );

    // var nombre = $("#descri" + Idproduct).html();
     //$(".modal-body #proN").val( nombre );

});
</script>
<script type="text/javascript">
$(document).ready(function() {
$("#formBorra").submit(function(event) {

    /* Stop form from submitting normally */
    event.preventDefault();

    /* Clear result div*/
    $("#result").html('');

    /* Get some values from elements on the page: */
    var valin = $(this).serialize();

    /* Send the data using post and put the results in a div */
    $.ajax({
        url: 'instancias/borraitem.php',
        type: 'post',
        data: valin,
        success: function(){
	$('#myIt').modal('hide');
	//$('#myMens').modal('show');
       /* setTimeout(function() {
        window.location.href = "clientes.php";
        }, 2000); */
	 //window.parent.tot.location.reload();
		window.location.href = "total.php";
        },
        error:function(){
            alert("Error en el procesamiento de datos!");
            //$("#resultado").html('There is error while submit');
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
    <div class="container-fluid">
<?php
            $arrayt = $_SESSION['cesta'];
$tot=0;
foreach($arrayt as $id => $producto)
{
//echo '<b>Total '.$tot=$tot+$producto['Pre'];
$tot=$tot+$producto['Pre'] *$producto['Ca'];
}
?>
	<button type="button" onclick="myFunction()" class="btn btn-success btn-lg btn-block">TOTAL: <?=$tot?></button>
  	<br>
	<ul class="list-group">

<?php
            $array = $_SESSION['cesta'];

$v=0;
foreach($array as $id => $producto)
{
      echo'    
		<li class="list-group-item">
<button type="button" class="open-EditRow btn btn-warning btn-xs" data-toggle="modal" data-target="#myIt" data-id="'.$v.'">-</button>
          <span class="badge">'.$producto['Ca'].'</span>'.$producto['Descri'].'
          
		</li>';
$v++;
}
            ?>
	</ul>

      	


   
	</div>

<!-- Button trigger modal -->
<div class="modal fade" id="myIt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Mensaje</h4>
      </div>
      <div class="modal-body">
        Desea eliminar el articulo?
	 <form class="form-inline" name="formBorra" id="formBorra">
	<br>   

      
  
          <input type="hidden" name="del" id="del" value="">
          <input type="hidden" name="NewPro" id="NewPro" value="NewPro" >
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



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/modal.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

