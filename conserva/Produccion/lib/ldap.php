<?php


class ldap{

public $clave;
public $email;
public $usuario;
public $estado_login;
public $ldapconn;
public $nombre_completo;

function ldap(){

}

function setEmail($email){
$this->email=$email;
list($usuario,$dominio) = explode("@",$this->email);
$this->usuario=$usuario;
}

function setClave($clave){
$this->clave=$clave;
}

function login(){

// ejemplo de autenticación
$ldaprdn  = "BUIN\\".$this->usuario;     // ldap rdn or dn
$ldappass = $this->clave;  //associated password



// conexión al servidor LDAP
$ldapconn = ldap_connect("10.1.10.150") or die("Could not connect to LDAP server.");

ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);


$this->$ldapconn = $ldapconn;

if ($ldapconn) {

    // realizando la autenticación
    $ldapbind = @ldap_bind($ldapconn, $ldaprdn, $ldappass);

    // verificación del enlace
    if ($ldapbind) {


    $this->estado_login=true;
  


    $dn = "OU=AREAS,DC=buin,DC=cl";
  
    // Especifico los parámetros que quiero que me regrese la consulta
//    $attrs = array("displayname","mail","samaccountname","telephonenumber","givenname");
    $attrs = array("displayname","mail","samaccountname","telephonenumber","givenname");


    // Creo el filtro para la busqueda
    $filter = "(samaccountname=".$this->usuario.")";
 
    $search = ldap_search($ldapconn, $dn, $filter, $attrs)
    or die ("");
 
    $entries = ldap_get_entries($ldapconn, $search);
 
    if ($entries["count"] > 0)
        {
        for ($i=0; $i<$entries["count"]; $i++)
                {
             $this->nombre_completo = $entries[$i]["displayname"][0];
            }

     }       



    } else {


    $this->estado_login=false;

    }

}




}





}



 

?>