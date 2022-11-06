<?php

  use App\Modelo\Config;
  use App\Controlador\UserController;

  $config = new Config();
  $rutaServer = $config->ctrRutaServidor();


  $roleCtrl = new RoleController();
  $roles = $roleCtrl->getRoles1();

  $config = new Config();
  $rutaServer = $config->ctrRutaServidor();

  $userCtrl = new UserController();

  $totalRecords = $userCtrl->getTotalRecords();
  $recordsPerPage = 10;
  $totalPages = ceil($totalRecords/$recordsPerPage);

  if(isset($_GET['ruta'])) {
    $url = explode("/", $_GET['ruta']);
    if(sizeof($url) == 2)
      $page = $url[1];
    else
      $page=1;
  }

  $paginationStart = ($page - 1) * $recordsPerPage;

  $listado = $userCtrl->listarUsuarios($paginationStart,$recordsPerPage);

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div id="errores"></div>
    <div class="row">
      <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">
            <b>Nuevo Usuario</b>
          </h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" id="formNewUser" method="POST">
          <div class="box-body">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="firstName">Nombres <span class="req">*</span></label>
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter Firstname" required>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="fastname">Apellidos <span class="req">*</span></label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Lastname" required>
              </div>
            </div>
            <div class="col-sm-6">
              <div id="divEmail" class="form-group">
                <label for="Email">Correo Electr&oacute;nico <span class="req">*</span></label>
                <div class="input-group">
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                  <span class="input-group-addon">@</span>
                  <input type="text" class="form-control" style="background-color: white;" disabled value="institutodelacaridaduniversal.org" >
                </div>
                <div style="height: 0px;"><span id="resultado"></span></div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="firstName">Contrase&ntilde;a <span class="req">*</span></label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="photo">Foto</label>
                <input type="file" class="form-control" id="photo" name="photo">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="rol">Rol <span class="req">*</span></label>
                <select class="form-control" id="role_id" name="role_id" required>
                  <option value="NULL">..::Seleccione::..</option>
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
                <label for="enabled">Estado <span class="req">*</span></label><br>
                  <select class="form-control" id="enabled" name="enabled" required>
                    <option value="NULL">..::Seleccione::..</option>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                  </select>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="change"><small>Requerir cambio de contrase&ntilde;a <span class="req">*</span></small></label><br>
                <input type="checkbox" id="change" name="change" required>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <div class="col-sm-6">
              <button type="submit" class="btn btn-primary" id="save" name="save" value="saveUser">Crear Usuario</button>
            </div>
          </div>
      </form>
    <!-- /.box -->
    </div>
  </section>
</div>