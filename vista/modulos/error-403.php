<?php

  $config = new Config();
  $rutaServer = $config->ctrRutaServidor();

  $url = $rutaServer.'/inicio';

?>

<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="error-page text-center">
      <div class="error-content">
        <img src="vista/dist/img/denegado.png">
        <h3><i class="fa fa-warning text-red"></i> Acceso Denegado</h3>
        <p>
          No tienes acceso a est&aacute; p&aacute;gina, contacta a su administrador. <br>
          Mientras tanto, puedes <a href="<?php echo $url; ?>"> volver al inicio </a>.
        </p>
      </div>
      <!-- /.error-content -->
    </div>
    <!-- /.error-page -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->