<?php

  /****************************************
   * CONTROLADORES
   * **************************************/
  use App\Controlador\PersonaController;
  use App\Controlador\DepartamentoController;
  use App\Controlador\MunicipioController;

  /****************************************
   * ENTIDADES
   * **************************************/
  use App\Entidades\Persona;
  use App\Entidades\Departamento;
  use App\Entidades\Municipio;

  $persoCtrl = new PersonaController();
  $personas = $persoCtrl->obtenerTodosPersonas();

  $departamentoCtrl = new DepartamentoController();
  $departamentos = $departamentoCtrl->getDepartamentos();

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
                <b>Listado de Personas</b>
              </h3>
            </div>

            <div class="box-body">

              <table id="tListarPersonas" class="table table-striped table-bordered" style="width:100%">

                <thead>
                  <tr>
                    <th>Tipo Documento</th>
                    <th>Identificacion</th>
                    <th>Primer Nombre</th>
                    <th>Segundo Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Departamento</th>
                    <th>Municipio</th>
                    <th>Estado</th>
                    <th>Fecha Creaci&oacute;n</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach ($personas as $persona) {
                      $departamentoCtrl = new DepartamentoController();
                      $municipioCtrl = new MunicipioController();
                      $departamento = $departamentoCtrl->getDepartamento($persona->getDepartamento_id());
                      $municipio = $municipioCtrl->getMunicipio($persona->getMunicipio_id(), $persona->getDepartamento_id());
                  ?>
                    <tr>
                      <td><?php echo $persona->getId_tipo_doc(); ?></td>
                      <td><?php echo $persona->getIdentificacion(); ?></td>
                      <td><?php echo $persona->getPrimer_nombre(); ?></td>
                      <td><?php echo $persona->getSegundo_nombre(); ?></td>
                      <td><?php echo $persona->getPrimer_apellido(); ?></td>
                      <td><?php echo $persona->getSegundo_apellido(); ?></td>
                      <td><?php echo $persona->getDireccion(); ?></td>
                      <td><?php echo $persona->getTelefono(); ?></td>
                      <td><?php echo $departamento->getNombre(); ?></td>
                      <td><?php echo $municipio->getNombre(); ?></td>
                      <td><span class="label label-<?php echo ($persona->getEnabled() == 1) ? "success" : "danger"; ?>"><?php echo ($persona->getEnabled() == 1) ? "Activo" : "Inactivo"; ?></span></td>
                      <td><?php echo $persona->getCreateAt(); ?></td>
                      <td><a class="btn btn-warning" href="<?php echo $rutaServer ?>/editar-persona/<?php echo $persona->getId(); ?>"><i class="fa fa-edit"></i></a></td>
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