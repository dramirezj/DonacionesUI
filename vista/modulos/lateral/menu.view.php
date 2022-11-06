<?php

  use App\Controlador\MenuController;
  use App\Modelo\Config;

  $config = new Config();
  $rutaServer = $config->ctrRutaServidor();

  $menuController = new MenuController();
  $menu = $menuController->findMenuByUser($_SESSION["email"]);

?>
<!-- sidebar menu: : style can be found in sidebar.less -->
<hr style="border-color: white;">
<nav class="mt-2">
  <ul class="sidebar-menu" data-widget="tree">
    <?php

      foreach ($menu as $key => $value) {
        $id = $value["id"];
        if($value["class"] == NULL && $value["parent_id"] == NULL) {
          echo '<li><a href="'.$rutaServer.'/'.$value["url"].'"><i class="'.$value["icon"].'"></i><span>'.$value["name"].'</span></a></li>';
        }

        //submenus
        $subMenu = $menuController->findSubMenuById($id,$_SESSION['role_id']);
        if($value["class"] == "treeview") {
            echo '<li class="treeview">
                      <a href="#">
                          <i class="'.$value["icon"].'"></i>
                          <span>'.$value["name"].'</span>
                          <span class="pull-right-container">
                            <i class="fa fa-angle-down pull-right"></i>
                          </span>
                      </a>';
          echo '<ul class="treeview-menu">';
          foreach ($subMenu as $key1 => $value1) {
            if($id == $value1["parent_id"]) {
              echo     '<li>
                          <a href="'.$rutaServer.'/'.$value1["url"].'">
                            <i class="'.$value1["icon"].'"></i>'.
                            '<small>'.$value1["name"].'</small>'
                          .'</a>
                        </li>';
            }
          }
          echo '</ul></li>';
        }
      }

    ?>
  </ul>
</nav>