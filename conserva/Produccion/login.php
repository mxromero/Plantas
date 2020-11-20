<?php
session_start();
error_reporting(0);


require_once('ws_cl_servicio_crud.php');

extract($_POST);


if(isset($email) and isset($password)){

  include "lib/ldap.php";
  
  
$ldap = new ldap();
$ldap->setEmail($email);
$ldap->setClave($password);
$ldap->login();


if($ldap->estado_login){ //bolean
  
  
  $_SESSION['usuario']=$ldap->usuario;                        //ldap
  $_SESSION['nombre_completo']=$ldap->nombre_completo;        //ldap
  $_SESSION['email']=$ldap->email;                            //ldap

  header("location:index.php");
  }
  
require_once("lib/config.php");
$no_main_header = true;
$page_html_prop = array("id"=>"extr-page", "class"=>"animated fadeInDown");
include("inc/header.php");

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Acceso Solicitudes Transacciones</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <center>
    <img src="../dist/img/logoAconcagua.png" style="display: block; height: auto; width: 12.1rem;" alt="User Image">
    </center>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Ingresa tus Credenciales</p>

      <form action="" id="login-form" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Recordarme              
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

<script>
      runAllForms();

      $(function() {
        // Validation
        $("#login-form").validate({
          // Rules for form validation
          rules : {
            email : {
              required : true,
              email : true
            },
            password : {
              required : true,
              minlength : 3,
              maxlength : 20
            }
          },

          // Messages for form validation
          messages : {
            email : {
              required : 'Please enter your email address',
              email : 'Please enter a VALID email address'
            },
            password : {
              required : 'Please enter your password'
            }
          },

          // Do not change code below
          errorPlacement : function(error, element) {
            error.insertAfter(element.parent());
          }
        });
      });
    </script>

</body>
</html>
