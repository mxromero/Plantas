<?php 

session_start();


echo "<pre>";
var_dump($_POST);
echo "</pre>";


$ipalet_		=	(!isset($_POST['ipalet']))?trim($_POST['ipalet']):false; 				
$ifecha_		=	(!isset($_POST['ifecha']))?trim($_POST['ifecha']):false; 
$ihora_			=	(!isset($_POST['ihora']))?trim($_POST['ihora']):false; 					
$icant_			=	(!isset($_POST['icant']))?trim($_POST['icant']):false;



require_once($_SESSION['pathUpdate']);

require_once("../clases/clase_ImprimirTarja.php");



 $imp = new Imprimir();
 $imp->set_tabla('vw_tarja_muestra_calidad');
 $imp->set_cond('hola');
 $imp->set_ipalet($ipalet_);
 $imp->set_ifecha($ifecha_);
 $imp->set_ihora($ihora_);
 $imp->set_icant($icant_);
 //$imp->ConsultarImp();
 //$imp->Imprimir();







 ?>