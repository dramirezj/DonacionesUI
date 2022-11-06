<?php
  
  $config = new Config();
  $rutaServer = $config->ctrRutaServidor();

  $url = $rutaServer.'/ingreso';

?>
<div class="container-fluid" style="width: 100%; height: 100%;">
  <div class="error-page text-center">
    <div style="width: 100%; height: 100%; margin: 0 auto;">
      <img src="vista/dist/img/denegado.png">
      <h3><i class="fa fa-warning text-red"></i> Acceso Denegado</h3>
        <p>
          La IP desde la que esta intentando acceder no esta autorizada, contacta a su administrador. <br>
          Mientras tanto, puedes <a href="<?php echo $url; ?>"> volver al inicio </a>.
        </p>
    </div>
    <!-- /.error-content -->
  </div>
  <!-- /.error-page -->
</div>

<!-- /.login-box -->
<!--<script src="<?php echo $rutaServer; ?>/vista/dist/bower_components/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?php echo $rutaServer; ?>/vista/dist/bower_components/jquery-validation/dist/additional-methods.min.js"></script>-->