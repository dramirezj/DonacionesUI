<?php

  /******************************************
   ENTIDADES
 ****************************************/
  use App\Entidades\Departamento;
  use App\Entidades\Municipio;
  use App\Entidades\Persona;

  /******************************************
   CONTROLADORES
 ****************************************/
  use App\Controlador\DepartamentoController;
  use App\Controlador\MunicipioController;
  use App\Controlador\PersonaController;
  use App\Controlador\DocumentoEmpresaController;
  use App\Controlador\TipoDocumentoController;


  $departmentoCtrl = new DepartamentoController();
  $departamentos = $departmentoCtrl->getDepartamentos();

  /******************************************
   CAPTURAMOS PARAMETROS DE LA URL
 ****************************************/
  if(isset($_GET['ruta'])) {
    $url = explode("/", $_GET['ruta']);
    $persona_id = $url[1];
  }

  $personaCtrl = new PersonaController();
  $persona = $personaCtrl->obtenerPersona($persona_id);

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
              <b>Editar Persona</b>
            </h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" id="formEditPerson" method="POST">
            <div class="box-body">
              <input type="hidden" id="id" name="id" />
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="id_tipo_doc">Tipo Documento</label>
                  <select class="form-control" id="id_tipo_doc" name="id_tipo_doc" readonly="true">
                    <option value="NULL">..:: Seleccione ::..</option>
                    <option value="CC" <?php echo $persona->getId_tipo_doc() === "CC" ? "selected" : ""; ?>>CC (CEDULA DE CIUDADANIA)</option>
                    <option value="CE" <?php echo $persona->getId_tipo_doc() === "CE" ? "selected" : ""; ?>>CE (CEDULA DE EXTRANJERIA)</option>
                    <option value="PA" <?php echo $persona->getId_tipo_doc() === "PA" ? "selected" : ""; ?>>PA (PASAPORTE)</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="identificacion">Identificacion</label>
                  <input type="hidden" name="persona_id" id="persona_id" value="<?php echo $persona->getId(); ?>">
                  <input type="text" class="form-control" id="identificacion" name="identificacion" readonly="true" value="<?php echo $persona->getIdentificacion(); ?>">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="primer_nombre">Primer Nombre</label>
                  <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" value="<?php echo $persona->getPrimer_nombre(); ?>">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="segundo_nombre">Segundo Nombre</label>
                  <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre" value="<?php echo $persona->getSegundo_nombre(); ?>">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="primer_apellido">Primer Apellido</label>
                  <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" value="<?php echo $persona->getPrimer_apellido(); ?>">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="segundo_apellido">Segundo Apellido</label>
                  <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" value="<?php echo $persona->getSegundo_apellido(); ?>">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="direccion">Direccion</label>
                  <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $persona->getDireccion(); ?>">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="departamento_id">Departamento</label>
                  <select class="form-control" id="departamento_id" name="departamento_id" required>
                    <option value="NULL">..::Seleccione::..</option>
                      <?php
                        foreach ($departamentos as $departamento) {
                      ?>
                        <option value="<?php echo $departamento->getId(); ?>" <?php echo $departamento->getId() == $persona->getDepartamento_id() ? "selected" : ""; ?>><?php echo $departamento->getNombre(); ?></option>
                      <?php
                        }
                      ?>
                    </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="municipio_id">Municipio</label>
                  <select class="form-control" id="municipio_id" name="municipio_id" required>
                    <option value="NULL">..::Seleccione::..</option>
                      <?php
                        $municipioCtrl = new MunicipioController();
                        $municipio = $municipioCtrl->getMunicipio($persona->getMunicipio_id(),$persona->getDepartamento_id());
                      ?>
                      <option value="<?php echo $municipio->getId(); ?>" selected><?php echo $municipio->getNombre(); ?></option>
                    </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="telefono">Telefono</label>
                  <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $persona->getTelefono(); ?>">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" value="<?php echo $persona->getEmail(); ?>">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="enabled">Estado</label><br>
                  <select class="form-control" id="enabled" name="enabled">
                      <option value="NULL">..::Seleccione::..</option>
                      <option value="1" <?php echo $persona->getEnabled() == 1 ? "selected" : ""; ?>>Activo</option>
                      <option value="0" <?php echo $persona->getEnabled() == 0 ? "selected" : ""; ?>>Inactivo</option>
                    </select>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="col-sm-4">
                <button type="submit" class="btn btn-primary" id="save" name="save" value="editPerson"><i class="fa fa-save"></i> Guardar</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.box -->
      </div>
  </section>
</div>