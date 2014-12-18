<?php
session_start();
unset( $_SESSION['cesta']);

echo	' <script>	
		if (sessionStorage.getItem("tipo") == "1" ){
//console.log("si");
window.location.href = "../adm.php";
}else if(sessionStorage.getItem("tipo") == "2" ) {
//console.log("no");
window.location.href = "../func.php";
}
</script>';

//header("Location: ../adm.php");
?>
