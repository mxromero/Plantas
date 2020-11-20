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
  <title>Inicio</title>

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
</head>


<style type="text/css">
  ion-icon {
  font-size: 28px;
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
      <section class="py-5">
        <div class="container">
          <h2 class="text-left">Modulo de Acceso a Sistemas Planta Conservas</h2>
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
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../plugins/raphael/raphael.min.js"></script>
<script src="../plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="../dist/js/pages/dashboard2.js"></script>
<script src="/jsHorometro/HG.js"></script>
<script language="JavaScript">
//
//
	
</script>
</body>
</html>


