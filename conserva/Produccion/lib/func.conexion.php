<?php
//Driver a Utilizar conexion a Base de Datos 
$dsn = "Driver={SQL Server};Server=10.1.10.84\MARCACIONES;Database=Aconcagua;Integrated Security=SSPI;Persist Security Info=False;";

$con = db_logon( 'sa', 'aconcagua',$dsn);

global $con;

function db_logon($usuario,$clave,$db_conexion){
	
	$con =  odbc_connect($db_conexion, $usuario, $clave) or die ("<br>No Se Conecto a la Base De Datos con los siguientes credenciales ".$usuario."-".$clave."--".$db_conexion."<br>");
	




	
	if(!$con){$con="No Se Realizo la Conexion";var_dump(sqlsrv_errors());}
	return($con);
}

function db_exec($con,$query){
    $result=odbc_exec($con,$query);	

	if(!$result){die("<br>No se Ejecuto el Query ".$query." en la conexion ".$con." <br>");}
	return($result);
}

function db_stored($con,$query){
	$result= mssql_init($query,$con);

	if(!$result){die("<br>No ejecuto procedimiento Almacendado<br>");}
	return($result);
}

//Devuelve una fila en un arreglo
function db_fetch_array($result){
	return (odbc_fetch_array($result));
}

//Desconectarse de la base de datos
function db_logoff($con){
	odbc_close($con);
}

function db_num_fields($result){
	return(odbc_num_rows($result));
}

function db_field_name($result,$n){
	return(odbc_field_name($result,$n));
}

//avanza un registro en result_set
function db_fetch_go($result,$n){
	return(odbc_fetch_row($result,$n));
}

function db_fetch_next($result){
	return(odbc_fetch_row($result));
}

function db_result($result,$n){
	return(odbc_result($result,$n));
}

function db_field_size($result,$n){
	return(odbc_field_len($result,$n));
}





?>