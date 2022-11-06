<?php
  
  use App\Modelo\Config;

  $config = new Config();
  $rutaServer = $config->ctrRutaServidor();
?>

<!-- main-header -->
<header class="main-header">
  <!-- Logo -->
  <a href="<?php echo $rutaServer; ?>/inicio" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">
      <img src="<?php echo $rutaServer; ?>/vista/dist/img/icono.png" class="img-responsive" style="padding: 10px; filter: contrast(200%);">
    </span>
    <!-- logo for regular state and mobile devices -->
    <!--<span class="logo-lg">
      <<img src="<?php echo $rutaServer; ?>/vista/dist/img/logo.png" class="img-responsive" style="padding: 10px 30px; filter: contrast(200%);"
    </span>-->
  </a>
  <!-- Logo -->

  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">

      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <!-- navbar-custom-menu -->
      <div class="navbar-custom-menu">
        
        <ul class="nav navbar-nav">

          <?php
              
            /*=============================================
            USUARIO
            =============================================*/ 

            include "cabezote/usuario.php";

          ?>

        </ul>

      </div>
      <!-- navbar-custom-menu -->

  </nav>

</header>
<!-- main-header -->