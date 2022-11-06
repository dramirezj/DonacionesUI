<div class="login-box">
  <div class="login-logo">
    <div class="col-sm-12">
      <img src="vista/dist/img/logo.png" class="img-responsive" style="padding: 10px 50px; margin: 0 auto; width: 200px;">
    </div>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">

    <p class="login-box-msg">Ingrese sus datos para iniciar sesi&oacute;n</p>

    <form method="post" enctype="multipart/form-data">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Correo" id="email" name="email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Contraseña" id="password" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar Ses&oacute;n</button>
        </div>
        <!-- /.col -->
      </div>
      <?php
        use App\Servicios\SecurityService;
        $antiCSRF = new SecurityService();
        $antiCSRF->insertHiddenToken();
      ?>
    </form>

    <div class="social-auth-links text-center">
      <a href="#"><img src="vista/dist/img/ucentral.png" style="width: 260px; height: 60px;"></a>
    </div>

    <?php

      use App\Controlador\LoginController;

      $login = new LoginController();
      $login->findByEmail();

    ?>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.login-box -->