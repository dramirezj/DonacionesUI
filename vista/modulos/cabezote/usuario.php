<?php

    use App\Modelo\Config;
    
    $config = new Config();
    $rutaServer = $config->ctrRutaServidor();
?>

<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <img src="<?php echo $rutaServer; ?>/vista/dist/img/userPhotos/user_blank.png" class="user-image" alt="User Image">
    <span class="hidden-xs"><?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']; ?></span>
  </a>
  <ul class="dropdown-menu">
    <!-- User image -->
    <li class="user-header">
      <img src="<?php echo $rutaServer; ?>/vista/dist/img/userPhotos/user_blank.png" class="img-circle" alt="User Image">
      <p>
        <?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']; ?>
      </p>
    </li>
    <!-- Menu Footer-->
    <li class="user-footer">
      <div class="pull-right">
        <a href="<?php echo $rutaServer; ?>/salir" class="btn btn-default btn-flat">Salir</a>
      </div>
    </li>
  </ul>
</li>