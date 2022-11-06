<?php

  use App\Modelo\Config;

  $config = new Config();
  $rutaServer = $config->ctrRutaServidor();

  if(isset($_GET['ruta'])) {
    $url = explode("/", $_GET['ruta']);
    $user_id = $url[1];
  }

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">
              <b>Modificar Usuario</b>
            </h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
            <form role="form" id="formEditUser" method="POST">
              <div class="box-body">
                <input type="hidden" id="user_id" name="user_id" value="" />
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="firstName">Nombres <span class="req">*</span></label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="fastname">Apellidos <span class="req">*</span></label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div id="divEmail" class="form-group">
                    <label for="Email">Correo Electr&oacute;nico <span class="req">*</span></label>
                    <input type="text" class="form-control" id="email" name="email" value="" required>
                    <div style="height: 0px;"><span id="resultado"></span></div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="firstName">Contrase&ntilde;a <span class="req">*</span></label>
                    <input type="password" class="form-control" id="password" name="password" value="" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="rol">Rol <span class="req">*</span></label>
                    <select class="form-control select2" id="role_id" name="role_id" required>
                      <option value="NULL">..::Seleccione::..</option>
                      <?php
                        foreach ($roles as $key => $value) {
                      ?>
                            <option value=""></option>
                      <?php

                        }

                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                      <label for="enabled">Estado <span class="req">*</span></label><br>
                      <select class="form-control select2" id="enabled" name="enabled" required>
                        <option value="NULL">..::Seleccione::..</option>
                      </select>
                  </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="col-sm-6">
                <button type="submit" class="btn btn-primary" id="save" name="save" value="editUser"><i class="fa fa-save"></i> Guardar</button>
                <a class="btn btn-primary" href="<?php echo $rutaServer; ?>/listar-usuarios">Cancelar</a>
              </div>
            </div>
          </form>
        </div>
      </div>
  </section>
</div>