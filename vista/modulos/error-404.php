<?php

  $config = new Config();
  $rutaServer = $config->ctrRutaServidor();

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Appointment | Dashboard</title>
    <link rel="stylesheet" href="<?php echo $rutaServer; ?>/vista/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $rutaServer; ?>/vista/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo $rutaServer; ?>/vista/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $rutaServer; ?>/vista/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo $rutaServer; ?>/vista/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo $rutaServer; ?>/vista/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo $rutaServer; ?>/vista/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo $rutaServer; ?>/vista/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo $rutaServer; ?>/vista/bower_components/select2/dist/css/select2.min.css">
    <!-- Password Strength -->
    <link rel="stylesheet" href="<?php echo $rutaServer; ?>/vista/bower_components/Visual-Password-Strength-Indicator/passtrength.css" media="screen" title="no title">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo $rutaServer; ?>/vista/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo $rutaServer; ?>/vista/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo $rutaServer; ?>/vista/plugins/iCheck/square/blue.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo $rutaServer; ?>/vista/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- DataTable boostrap -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?php echo $rutaServer; ?>/vista/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- step by step -->
    <link rel="stylesheet"  href="<?php echo $rutaServer; ?>/vista/dist/css/stepbystep.css">
    <link href="<?php echo $rutaServer; ?>/favicon.png" rel="icon" type="image/png" />
  </head>
  <body class="hold-transition skin-blue-light sidebar-mini sidebar-collapse">
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        <div class="error-page">
          <h2 class="headline text-warning"> 404</h2>

          <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> P&aacute;gina no encontrada.</h3>

            <p>
              No pudimos encontrar la página que buscaba.
              Mientras tanto, puedes <a href="inicio">volver al tablero</a> o intente utilizar el formulario de búsqueda.
            </p>
          </div>
          <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
      </section>
      <!-- /.content -->
    </div>
  </body>
</html>