<?php 
session_start();


require_once($_SESSION['pathUpdate']);

require_once("../clases/clase_update.php");


 $updte = new MODUMAS();
 $updte->set_nTabla('PRODUCCION');
 $updte->set_condUp('00000002110011300002');
 $updte->set_npost($_POST);
 $updte->funcionEliminar();


 ?>