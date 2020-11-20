<?php 
 
//require_once("../directorio.php");
//require_once(CLASES_PATH."CL_Calidad.php");

//$COP= (CONSULTA ORDEN PREVICIONAL)

require_once("../ws_orden_prev.php");
 
$OP	=/*(!isset($_GET['OP']))?*/trim($_GET['OP']);/*:false;*/
 
$COP = new Ws_OP();
$COP->set_ordenPrevicional($OP);
$COP->retorna_WS();
$COP->getValOrdPrev();
 




 ?>