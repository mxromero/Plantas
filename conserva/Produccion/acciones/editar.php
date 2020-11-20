<?php 
session_start();


//$canU			=	(!isset($_POST['ucantidad']))?trim($_POST['ucantidad']):false; 				
//$expU			=	(!isset($_POST['uexpsap']))?trim($_POST['uexpsap']):false; 
//$fechaU		=	(!isset($_POST['ufecha']))?trim($_POST['ufecha']):false; 					
//$horaU		=	(!isset($_POST['uhora']))?trim($_POST['uhora']):false;



require_once($_SESSION['pathUpdate']);

require_once("../clases/clase_update.php");


/*
*MODIFICACION DE LAS UMAS modificacionUma.php
*/
 $updte = new UPDATE();
 $updte->set_nTabla('PRODUCCION');
 $updte->set_condUp('00000002110011300002');
 $updte->set_npost($_POST);
 $updte->funcionPost();
 //$updte->UpdateUma();
 //print_r($_POST);
 //echo  $update->get_cantUp() . "<br>"; 


/*
*MODIFICACION CONFIGURACION LINEA configuracionLinea.php

 $updte_confLin = new CALIDADLINEA();
 $updte_confLin->set_nTabla('PRODUCCION');
 $updte_confLin->set_condUp(''); //la condicion es la linea 
 $updte_confLin->set_npost($_POST);
 $updte_confLin->UpdteLinea();
*/
 ?>