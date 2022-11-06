<?php

  use App\Entidades\Departamento;
  use App\Entidades\Municipio;
  use App\Controlador\DepartamentoController;
  use App\Controlador\MunicipioController;

  $departmentoCtrl = new DepartamentoController();
  $departamentos = $departmentoCtrl->getDepartamentos();

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
            <h4 class="box-title">
              <b>Crear Persona</b>
            </h4>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" id="formNewPerson" method="POST">
            <div class="box-body">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="id_tipo_doc">Tipo Documento <span class="req">*</span></label>
                  <select class="form-control" id="documentType" name="id_tipo_doc" required>
                    <option value="NULL">..:: Seleccione ::..</option>
                    <option value="CC">CC (CEDULA DE CIUDADANIA)</option>
                    <option value="CE">CE (CEDULA DE EXTRANJERIA)</option>
                    <option value="PA">PA (PASAPORTE)</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="identificacion">Identificacion <span class="req">*</span></label>
                  <input type="text" class="form-control" id="identificacion" name="identificacion" required>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="primer_nombre">Primer Nombre <span class="req">*</span></label>
                  <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" required>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="segundo_nombre">Segundo Nombre</label>
                  <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="primer_apellido">Primer Apellido <span class="req">*</span></label>
                  <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" required>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="segundo_apellido">Segundo Apellido</label>
                  <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="direccion">Direccion <span class="req">*</span></label>
                  <input type="text" class="form-control" id="direccion" name="direccion" required>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="departamento_id">Departamento <span class="req">*</span></label>
                  <select class="form-control" id="departamento_id" name="departamento_id" required>
                    <option value="NULL">..::Seleccione::..</option>
                    <?php
                      foreach ($departamentos as $departamento) {
                    ?>
                      <option value="<?php echo $departamento->getId(); ?>"><?php echo $departamento->getNombre(); ?></option>
                    <?php
                      }
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="municipio_id">Municipio <span class="req">*</span></label>
                  <select class="form-control" id="municipio_id" name="municipio_id" required>
                    <option value="NULL">..::Seleccione::..</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="telefono">Telefono <span class="req">*</span></label>
                  <input type="text" class="form-control" id="telefono" name="telefono" required>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="email">Email <span class="req">*</span></label>
                  <input type="text" class="form-control" id="email" name="email" required>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="enabled">Estado <span class="req">*</span></label><br>
                  <select class="form-control" id="enabled" name="enabled" required>
                    <option value="NULL">..::Seleccione::..</option>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                  </select>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="col-sm-4">
                <button type="submit" class="btn btn-primary" id="save" name="save" value="savePerson"><i class="fa fa-save"></i> Guardar</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.box -->
      </div>
  </section>
</div>