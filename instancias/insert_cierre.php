<?php
if (!isset($_POST['Newcli'])) {
    header("Location: ../");
} else {

    require_once '../class/cierre.class.php';

    $cerrando = Caja::singleton();

    $descrip = gethostname();
    $saldoant = $_POST['san'];
    $entra = $_POST['en'];
    $sali = $_POST['saida'];
    $ca = $_POST['ca'];
    $salact = $_POST['sal'];
    $impreti = $_POST['reti'];
    if($impreti==""){
		$impreti="0";
	}
    $cbs=$_POST['cb'];
    $fin = $_POST['data'];
    $ffin = date("Y-m-d");
    $sta="1";
    
    $cerrando->insert_cierre($descrip,$saldoant,$entra,$sali,$ca,$salact,$impreti,$cbs,$fin,$ffin,$sta);
    
    
    //$eu="1";
    //$ed="0";
    /*$actven=Caja::singleton();
    $actven->update_cierre();*/
    
}
?>
