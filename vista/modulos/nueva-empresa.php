<?php

  $config = new Config();
  $rutaServer = $config->ctrRutaServidor();

  if($_SESSION["role_id"] != 4) {
    $url = $rutaServer.'/error-403';
    echo "<script> window.location='".$url."'</script>";
  }

  $roleCtrl = new RoleController();
  $roles = $roleCtrl->getRoles();

  $appCtrl = new ApplicationController();
  $apps = $appCtrl->getApplication();

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
                <b>Nueva Empresa</b>
              </h3>
            </div>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" id="formNewEnterprise" enctype="multipart/form-data">
            <div class="box-body">
              <!-- Datos de la empresa -->
              <fieldset id="step1">
                <div class="col-sm-12">
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h4 class="box-title" style="font-weight: bold;">Datos B&aacute;sicos</h4>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="identificacion">Identificaci&oacute;n</label>
                    <input type="text" class="form-control" id="identificacion" name="identificacion" placeholder="Enter Identificacion" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="razonSocial">Raz&oacute;n Social</label>
                    <input type="text" class="form-control" id="razonSocial" name="razonSocial" placeholder="Enter Razon Social" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="Email">Correo Electr&oacute;nico</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="address">Direcci&oacute;n</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Direccion" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="phone">Tel&eacute;fono Empresa</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Telefono Empresa" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="contactPeople">Persona Contacto</label><br>
                    <input type="text" class="form-control" id="contactPeople" name="contactPeople" placeholder="Enter Persona de Contacto" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="contactPhone">Tel&eacute;fono Contacto</label><br>
                    <input type="text" class="form-control" id="contactPhone" name="contactPhone" placeholder="Enter Telefono Contacto" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="contactExtension">Extensi&oacute;n Contacto</label><br>
                    <input type="text" class="form-control" id="contactExtension" name="contactExtension" placeholder="Enter Extension de Contacto">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="logo">Logo Empresa</label>
                    <input type="file" class="form-control" id="logo" name="logo" accept="image/png, image/gif, image/jpeg">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="enabled">Estado</label><br>
                    <select class="form-control" id="enabled" name="enabled" required>
                      <option value="1">Activa</option>
                      <option value="0">Inactiva</option>
                    </select>
                  </div>
                </div>
              </fieldset>

              <!-- Usuario Administrador -->
              <fieldset id="step2">
                <div class="col-sm-12">
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h4 class="box-title" style="font-weight: bold;">Usuario Administrador</h4>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="firstName">Nombres</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter Firstname" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="fastname">Apellidos</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Lastname" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="Email">Correo Electr&oacute;nico</label>
                    <input type="text" class="form-control" id="emailAdmin" name="emailAdmin" placeholder="Enter Email" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="firstName">Contrase&ntilde;a</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="rol">Rol</label>
                    <select class="form-control" id="role_id" name="role_id" required>
                      <?php
                        foreach ($roles as $key => $value) {
                      ?>
                      <option value="<?php echo $value["id"]; ?>"><?php echo $value["name"]; ?></option>
                      <?php

                        }

                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="enabled">Estado</label><br>
                    <select class="form-control" id="enabledUser" name="enabledUser" required>
                      <option value="1">Activo</option>
                      <option value="0">Inactivo</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <label for="change"><small>Requerir cambio de contrase&ntilde;a</small></label><br>
                    <input type="checkbox" id="change" name="change" >
                  </div>
                </div>
              </div>
              </fieldset>

              <!-- Fieldset 3 - Modulos por empresa -->
              <fieldset id="step3">
                <div class="col-sm-12">
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h4 class="box-title" style="font-weight: bold;">M&oacute;dulos Habilitados</h4>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="modules">M&oacute;dulos</label>
                    <select multiple="multiple" class="form-control select2" id="modules" name="modules[]" required >
                      <?php
                        foreach ($apps as $key => $value) {
                      ?>
                        <option value="<?php echo $value["id"]; ?>"><?php echo $value["name"]; ?></option>
                      <?php
                        }
                      ?>
                    </select>
                  </div>
                </div>
              </fieldset>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-primary" id="save" name="save" value="saveEnterprise">Crear Empresa</button>
              </div>
            </div>
          </form>
      </div>

  </section>
</div>