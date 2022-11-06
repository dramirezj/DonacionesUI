<?php
  
  $config = new Config();
  $rutaServer = $config->ctrRutaServidor();

?>
<div class="login-box">
  <div class="login-box-body">

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">
          <b>Cambio de Contraseña</b>
        </h3>
      </div>
    </div>

    <div class="box-body">
      <form method="post" id="formPasswordChange">
        <div class="row">
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" id="password" name="password" minlength="8" required title="¡La contraseña no cumple con las politicas de seguridad!">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password Confirmation" id="confirmation" name="confirmation"minlength="8" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div id="errores" class="alert alert-danger" style="display: none;"></div>
          <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat" id="save" name="save" value="changePassowrd">Cambiar Contrase&ntilde;a</button>
            <a class="btn btn-primary btn-block btn-flat" href="<?php echo $rutaServer; ?>/salir">Salir</a>
          </div>
        </div>
      </form>

      <div class="social-auth-links text-center">
        <a href="#"><img src="vista/dist/img/cortelco.png" style="width: 160px; height: 40px;"></a>
      </div>

    </div>

  </div>
</div>
<!-- /.login-box -->
<!--<script src="<?php echo $rutaServer; ?>/vista/dist/bower_components/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?php echo $rutaServer; ?>/vista/dist/bower_components/jquery-validation/dist/additional-methods.min.js"></script>-->