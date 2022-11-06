<?php

  use App\Modelo\Config;
  use App\Controlador\UserController;

  $config = new Config();
  $rutaServer = $config->ctrRutaServidor();

  /*if(isset($_SESSION["urlPermitidas"])) {
    $url = $_SERVER["REQUEST_URI"];
    $url = explode("/", $url);
    if(!in_array($url[1], $_SESSION["urlPermitidas"])) {
      $url = $rutaServer.'/error-403';
      echo "<script> window.location='".$url."'</script>";
    }
  }*/

  if(!($_SESSION["role_id"] != 2) || !($_SESSION["role_id"] != 3)) {
    $url = $rutaServer.'/error-403';
    echo "<script> window.location='".$url."'</script>";
  }

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
    <div class="row">
      <div class="col-md-12">
        <div class="col-sm-12">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">
                  <b>Listado de Usuarios</b>
                </h3>
              </div>
              <div class="box-body">
                <table id="tListarUsuarios" class="table table-striped table-hover text-center">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Correo</th>
                      <th>Nombres</th>
                      <th>Apellidos</th>
                      <th>Rol</th>
                      <th>Bloqueo</th>
                      <th>Estado</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach ($listado as $key => $value) {

                    ?>
                      <tr>
                        <td><img src="<?php echo $rutaServer; ?>/vista/dist/img/userPhotos/user_blank.png" width="48px" height="48px" class="img-circle"></td>
                        <td><?php echo $value["email"]; ?></td>
                        <td><?php echo $value["firstname"]; ?></td>
                        <td><?php echo $value["lastname"]; ?></td>
                        <td><small class="label label-primary"><?php echo $value["role_name"]; ?></small></td>
                        <td><small class="label <?php echo $value["account_locked"] === 1 ? 'label-danger' : 'label-success'; ?>"><?php echo $value["account_locked"] === 1 ? "Bloqueada" : "";  ?></small></td>
                        <td><small class="label <?php echo $value["enabled"] === 1 ? 'label-success' : 'label-danger'; ?>"><?php echo $value["enabled"] === 1 ? "Activo" : "Inactivo";  ?></small></td>
                        <td><a class="btn btn-primary" href="<?php echo $rutaServer.'/editar-usuario/'.$value["id"]; ?>"><i class="fa fa-edit"></i></a></td>
                        <td><a class="btn btn-danger" onclick="deleteUser(<?php echo $value["id"]; ?>)"><i class="fa fa-remove"></i></a></td>
                      </tr>
                    <?php
                      }
                    ?>
                  </tbody>
                </table>
                <?php
                  if($totalPages > 1) {
                ?>
                <div class="col-md-12 text-center">
                  <nav aria-label="Page navigation example mt-5">
                    <ul class="pagination justify-content-center">
                      <li class="page-item">
                        <?php
                          if($totalPages > 1) {
                        ?>
                          <a class="btn btn-light" <?php if($page <= 1) echo 'disabled'; ?> href="<?php echo  $page <= 1 ? '#' : $rutaServer.'/listar-usuarios/'.($page - 1) ?>"><</a>
                        <?php
                          }
                        ?>
                      </li>
                      <?php
                        for ($i=1; $i <= $totalPages; $i++) { 
                      ?>
                        <li class="page-item <?php if($page == $i) echo 'active'; ?>">
                          <a class="btn btn-light" href="<?php echo $rutaServer; ?>/listar-usuarios/<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                      <?php
                        }
                      ?>
                      <li class="page-item">
                        <?php
                          if($totalPages > 1) {
                        ?>
                          <a class="btn  btn-light" <?php if($page >= $totalPages) echo 'disabled'; ?> href="<?php echo  $page >= $totalPages ? '#' : $rutaServer.'/listar-usuarios/'.($page + 1) ?>">></a>
                        <?php
                          }
                        ?>
                      </li>
                    </ul>
                  </nav>
                </div>
                <?php
                  }
                ?>
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>
</div>