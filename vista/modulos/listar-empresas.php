<?php

  use App\Modelo\Config;

  use App\Controlador\EmpresaController;
  use App\Entidades\Empresa;

  $config = new Config();
  $rutaServer = $config->ctrRutaServidor();

  $empresaCtrl = new EmpresaController();
  $empresas = $empresaCtrl->obtenerEmpresas();

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
                <b>Listado de Empresas</b>
              </h3>
            </div>

            <div class="box-body">

              <table id="tListarEmpresas" class="table table-striped table-bordered" style="width:100%">

                <thead>
                  <tr>
                    <th>Identificaci&oacute;n</th>
                    <th>Raz&oacute;n Social</th>
                    <th>Correo</th>
                    <th>Estado</th>
                    <th>Editar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach ($empresas as $empresa) {
                      //print("<pre>".print_r($empresa,true)."</pre>");
                  ?>
                    <tr>
                      <td><?php echo $empresa->getIdentificacion(); ?></td>
                      <td><?php echo $empresa->getRazon_social(); ?></td>
                      <td><?php echo $empresa->getEmail(); ?></td>
                      <td><small class="label <?php echo $empresa->getEnabled() == 1 ? 'label-success' : 'label-danger'; ?>">
                        <?php echo $empresa->getEnabled() == 1 ? "Activo" : "Inactivo";  ?></small></td>
                      <td><a class="btn btn-primary" href="<?php echo $rutaServer ?>/editar-empresa/<?php echo $empresa->getId(); ?>"><i class="fa fa-edit"></i></a></td>
                    </tr>
                  <?php
                    }
                  ?>

                </tbody>

              </table>

          </div>

        </div>

      </div>

    </div>

  </section>

</div>