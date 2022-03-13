<?php
    ini_set('display_errors', 'On');
    ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Benemerito Cuerpo de Bomberos del Cantón Pedernales | Dashboard</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="views/assets/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="views/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="views/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- JQVMap -->
        <link rel="stylesheet" href="views/assets/plugins/jqvmap/jqvmap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="views/assets/dist/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="views/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="views/assets/plugins/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="views/assets/plugins/summernote/summernote-bs4.min.css">

        <link rel="icon" href="views/assets/dist/img/logoBomb.jpeg">
        <!-- jQuery -->
        <script src="views/assets/plugins/jquery/jquery.min.js"></script>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Preloader -->
            <!--<div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="views/assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
            </div>-->
    <?php
        include 'modulos/menu.php';
echo '
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">';

        include 'modulos/nav.php';
        echo '
          <!-- Begin Page Content -->
          <div class="container-fluid">';

        if(isset($_GET['ruta'])){
            switch ($_GET['ruta']) {
                case 'dashboard':
                    include "modulos/dashboard/index.php";
                    echo "<script>$('#inicio').addClass('active');</script>";
                    break;

                case 'users':
                    include "modulos/usuarios/usuarios.php";
                    echo "<script>$('#users').addClass('active');</script>";
                    break;

                case 'perfiles':
                    include "modulos/perfiles/perfiles.php";
                    echo "<script>$('#perfiles').addClass('active');</script>";
                    break;
                

                case 'salir':
                    include "modulos/salir.php";
                    break;
            }
        }else{
            include "modulos/dashboard/index.php";
            echo "<script>$('#inicio').addClass('active');</script>";
        }

        include 'modulos/footer.php';
    ?>
         
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- hASTA Aqui -->
    
        
        <!-- jQuery UI 1.11.4 -->
        <script src="views/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
          $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="views/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- JQVMap -->
        <script src="views/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="views/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="views/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="views/assets/plugins/moment/moment.min.js"></script>
        <script src="views/assets/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="views/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="views/assets/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="views/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="views/assets/dist/js/adminlte.js"></script>

    </body>
</html>