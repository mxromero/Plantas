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
  <title>Config. Linea</title>

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
            <h1 class="m-0 text-dark">Configuración Linea</h1>
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
                <h5 class="card-title">Conectado a Sociedad PRD SCO Buin</h5>
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
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Paletizadora</th>
                      <th>Orden Previcional</th>
                      <th>Fecha Producción</th>
                      <th>Versión Fabricación</th>
                      <th>Centro</th>
                      <th>Almacen</th>
                      <th>Material Orden</th>
                      <th>Editar Linea</th>
                      <th>Desactivar</th>
                    </tr>
                  </thead>
                    <tbody>
                    <?php      
                          require_once("clases/clase_ConfiguracionLinea.php");
                          $conf =  new CALIDADLINEA();
                          $conf->set_nTabla('PALETIZADORAS');
                          $conf->crearTablaConfiguracionLinea();  //ImprimeTabla
                    ?>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-info">Agregar Linea</button>
              </div><!--FIN CLASS 12-->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">SAP Online</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Datos Palet: 
                        <!--Contenido de la Modal-->
                       <table class="table table-bordered table-responsive-sm">
                        <thead>
                          <tr>
                            <th>Elementos</th>
                            <th>Valores</th>
                          </tr>
                        </thead>
                        <form method="POST" id="formulario" enctype="multipart/form-data">
                            <tbody>
                              <tr>
                                <td>Orden Prev</td>
                                <td><input type="text" name="ux_ordprev" id="ax_ordprev" value="" class="form-control" ></td>
                                <td><input type="hidden" name="ux_condicion" id="ax_condicion" value="" class="form-control" ></td>
                              </tr>
                              <tr>
                                <td>Version Fabricación</td>
                                <td><input type="text" name="ux_version" id="ax_version" class="form-control" readonly></td>
                              </tr>
                              <tr>
                                <td>Centro</td>
                                <td><input type="text" name="ux_centro" id="ax_centro" value="" class="form-control" readonly></td>
                              </tr>
                              <tr>
                                <td>Almacen</td>
                                <td><input type="text" name="ux_almacen" id="ax_almacen" value="" class="form-control" readonly></td>
                              </tr>
                              <tr>
                                <td>Material Orden</td>
                                <td><input type="text" name="ux_matorden" id="ax_matorden" value="" class="form-control" readonly></td>
                              </tr>
                              <tr>
                                <td>Cantidad</td>
                                <td><input type="text" name="ux_cant" id="ax_cant" value="" class="form-control" readonly></td>
                              </tr>
                            </tbody>
                        
                      </table>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" id="boton1" class="btn btn-primary" onclick="procesa2()">Importar Datos</button>
                        <button type="submit" id="boton2" class="btn btn-success" onclick="guardar()">Guardar Datos</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!--FIN MODAL EDICION-->

                <!--MODAL ELIMINAR REGISTRO-->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Registro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        ¿Desea Eliminar?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Aceptar</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- FIN MODAL ELIMINAR REGISTRO-->
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
 
    function procesa(id){}  


    function procesa2() {
            var valor = $("#ax_ordprev").val();

    $.getScript( "acciones/loadOP.php?OP="+valor+"", function( data, textStatus, jqxhr ) {
            console.log( data ); // Data returned
            console.log( textStatus ); // Success
            console.log( jqxhr.status ); // 200
        });
    }

    /*   
    $( document ).ready(function() {          
        $("#boton2").on('click', function(){
            $(".modal-content").remove();
        });
    });*/
    
    $('#formulario').submit(function(e){
      e.preventDefault();
              var url = "acciones/editarOP.php";
              var paletizadora = $("#numero").val();
               $.ajax({
                  type:"POST",
                  url: url,
                  data:$("#formulario").serialize(),
                  success:function(r){
                    document.getElementById("formulario").reset();
                    $('#exampleModal').on('hidden.bs.modal', function() {
                          $(this).removeData('bs.modal');
                      });
                    }
                }); 
      });

</script>

</body>
</html>
