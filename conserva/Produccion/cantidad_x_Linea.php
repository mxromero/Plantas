<?php 
session_start();
if(!isset($_SESSION['usuario'])){

  header("Location: login.php");

}


$fcha = date("Y-m-d");


extract($_SESSION);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cant. Linea</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <!--ESTILOS PROPIOS
  <link rel="stylesheet" href="estilos.css">-->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script >
    $.ajax({
      url: "listadoTransacciones/archivo.txt",
      dataType: "text",
      success: function(data) {

          //console.log(data);
        
        var autoCompleteData = data.split("','");

        
        $("#nTransaccion").autocomplete({
          source: function(request, response) {
            var results = $.ui.autocomplete.filter(autoCompleteData, request.term);
			console.log('-- autocomplete -- inside');
            response(results.slice(0, 15)); // Display the first 15 results
          }
        });
      }
    });
  </script>

</head>


<style type="text/css">
  ion-icon {
  font-size: 24px;
}
</style>


<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-success">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt- pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/logoAconcagua.png" style="display: block; height: auto; width: 12.1rem;" alt="User Image">
        </div>
        <div class="info">
          
        </div>
      </div>

      <!-- Sidebar Menu -->
     <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">INICIO</li>
          <li class="nav-item">
            <a href="./index.php" class="nav-link">
              <ion-icon name="home-outline"></ion-icon>
              <p>  Inicio</p>
            </a>
          </li>
      </ul>
    </nav><br>
      <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">UTILIDADES</li>
          <li class="nav-item">
            <a href="./configuracionLinea.php" class="nav-link">
              <ion-icon name="document-text-outline"></ion-icon>
              <p>
                 Configuración Linea
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="./modificacionUmas.php" class="nav-link">
              <ion-icon name="create-outline"></ion-icon>
              <p>
                 Modificación Humas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./muestraTarja.php" class="nav-link">
              <ion-icon name="print-outline"></ion-icon>
              <p>
                 Imp. Tarja Manual
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./cantidad_x_Linea.php" class="nav-link">
              <ion-icon name="add-outline"></ion-icon>
              <p>
                Agrega Cant Mat x Linea
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./calidadLinea.php" class="nav-link">
              <ion-icon name="git-pull-request-outline"></ion-icon>
              <p>
                Calidad Linea
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <br>
      <!--CERRAR SESION-->
      <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">SALIR</li>
          <li class="nav-item">
            <a href="./logout.php" class="nav-link">
              <ion-icon name="log-out"></ion-icon>
              <p>  Cerrar Sesión</p>
            </a>
          </li>
      </ul>
    </nav>
    </div>

  </aside>

<div class="content-wrapper" style="min-height: 322.233px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Cantidad</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Linea 0 = en todas las lineas</h5>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              
                  <!--FORMULARIO DE INGRESO DE CALIDAD EN LINEA-->
              <div class="col-md-12">


                <div class="row">
                <div class="col-md-6">
                                  <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Material</th>
                      <th>Linea</th>
                      <th>Cantidad</th>
                      <th>X</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><input type="text" name="calices" id="" value="" class="form-control"></td>
                      <td><input type="text" name="calices" id="" value="" class="form-control"></td>
                      <td><input type="text" name="calices" id="" value="" class="form-control"></td>
                      <td><a href=""><ion-icon name="close-circle-outline"></ion-icon></a></td>
                    </tr>
                    <tr>
                      <td><input type="text" name="calices" id="" value="" class="form-control"></td>
                      <td><input type="text" name="calices" id="" value="" class="form-control"></td>
                      <td><input type="text" name="calices" id="" value="" class="form-control"></td>
                      <td><button type="" id="btn_ingresar" class="btn btn-success" >Grabar</button></td>
                    </tr>
                  </tbody>
                </table>
                </div>
                 <div class="col-md-6">
                </div>
                </div>

              </div><!--FIN CLASS 12-->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <footer class="main-footer">
    <strong>Aconcagua Foods SA. &copy; 2020</strong>
    Todos los Derechos Reservados
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-pre
    </div>
  </footer>
</div>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!--<link rel="stylesheet" href="../resources/demos/style.css">-->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../dist/js/adminlte.js"></script>
<!--<script src="dist/js/demo.js"></script>-->
<script src="../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../plugins/raphael/raphael.min.js"></script>
<script src="../plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../plugins/jquery-mapael/maps/usa_states.min.js"></script>

      <script type="text/javascript">
  $('#formulario').submit(function(e){
    e.preventDefault();
              var url = "instancias/procesaSolicitud.php";
               $.ajax({
                  type:"POST",
                  url: url,
                  data:$("#formulario").serialize(),
                  success:function(r){
              document.getElementById("formulario").reset();
              document.getElementById('sl_creada').style.display = 'block';
            $("#sl_creada").fadeOut(15000,function(){
               window.location.href=('histTransaccion.php');
            });
            
                  }
              });
            
            
         });
   </script>
</body>
</html>
