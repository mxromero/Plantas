<?php 

require_once("../ws_orden_prev.php");

$condicion	=	(!isset($_POST['ux_condicion']))?trim($_POST['ux_condicion']):false; 	

echo $condicion;

var_dump($_POST);

$COP = new Ws_OP();
$COP->set_condUp('');
$COP->set_npost($_POST);
$COP->UpdateConfLin();

 ?>