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
            <h3 class="box-title">
              <b>Crear Empresa</b>
            </h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" id="formNewEnterprise" method="POST" enctype="multipart/form-data">
            <div class="box-body">
              <fieldset id="datosEmpresa">
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">
                      <b>Datos Empresa</b>
                    </h3>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="id_tipo_doc_emp">Tipo Documento <span class="req">*</span></label>
                    <select class="form-control" id="id_tipo_doc_emp" name="id_tipo_doc_emp" required>
                      <option value="NULL">..:: Seleccione ::..</option>
                      <option value="CC">CC (CEDULA DE CIUDADANIA)</option>
                      <option value="CE">CE (CEDULA DE EXTRANJERIA)</option>
                      <option value="NI">NIT (NIT)</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="identificacion_emp">Identificacion <span class="req">*</span></label>
                    <input type="text" class="form-control" id="identificacion_emp" name="identificacion_emp" required>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="razon_social_emp">Raz&oacute;n Social <span class="req">*</span></label>
                    <input type="text" class="form-control" id="razon_social_emp" name="razon_social_emp" required>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="direccion_emp">Direccion <span class="req">*</span></label>
                    <input type="text" class="form-control" id="direccion_emp" name="direccion_emp" required>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="departamento_id_emp">Departamento <span class="req">*</span></label>
                    <select class="form-control" id="departamento_id_emp" name="departamento_id_emp" required>
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
                    <label for="municipio_id_emp">Municipio <span class="req">*</span></label>
                    <select class="form-control" id="municipio_id_emp" name="municipio_id_emp" required>
                      <option value="NULL">..::Seleccione::..</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="telefono_emp">Telefono <span class="req">*</span></label>
                    <input type="text" class="form-control" id="telefono_emp" name="telefono_emp" required>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="email_emp">Email <span class="req">*</span></label>
                    <input type="email" class="form-control" id="email_emp" name="email_emp" required pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="tipo_persona_emp">Tipo Persona <span class="req">*</span></label><br>
                    <select class="form-control" id="tipo_persona_emp" name="tipo_persona_emp" required>
                      <option value="NULL">..::Seleccione::..</option>
                      <option value="J">Juridica</option>
                      <option value="N">Natural</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="estado_emp">Estado <span class="req">*</span></label><br>
                    <select class="form-control" id="estado_emp" name="estado_emp" required>
                      <option value="NULL">..::Seleccione::..</option>
                      <option value="1">Activo</option>
                      <option value="0">Inactivo</option>
                    </select>
                  </div>
                </div>
              </fieldset>
              <fieldset id="datosRepresentante">
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">
                      <b>Datos Representante Legal</b>
                    </h3>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="id_tipo_doc">Tipo Documento <span class="req">*</span></label>
                    <select class="form-control" id="id_tipo_doc_rep" name="id_tipo_doc_rep" required>
                      <option value="NULL">..:: Seleccione ::..</option>
                      <option value="CC">CC (CEDULA DE CIUDADANIA)</option>
                      <option value="CE">CE (CEDULA DE EXTRANJERIA)</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="identificacion_rep">Identificacion <span class="req">*</span></label>
                    <input type="text" class="form-control" id="identificacion_rep" name="identificacion_rep" required>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="primer_nombre_rep">Primer Nombre <span class="req">*</span></label>
                    <input type="text" class="form-control" id="primer_nombre_rep" name="primer_nombre_rep" required>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="segundo_nombre_rep">Segundo Nombre</label>
                    <input type="text" class="form-control" id="segundo_nombre_rep" name="segundo_nombre_rep">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="primer_apellido_rep">Primer Apellido <span class="req">*</span></label>
                    <input type="text" class="form-control" id="primer_apellido_rep" name="primer_apellido_rep" required>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="segundo_apellido_rep">Segundo Apellido</label>
                    <input type="text" class="form-control" id="segundo_apellido_rep" name="segundo_apellido_rep">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="direccion_rep">Direccion <span class="req">*</span></label>
                    <input type="text" class="form-control" id="direccion_rep" name="direccion_rep" required>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="departamento_id_rep">Departamento <span class="req">*</span></label>
                    <select class="form-control" id="departamento_id_rep" name="departamento_id_rep" required>
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
                    <label for="municipio_id_rep">Municipio <span class="req">*</span></label>
                    <select class="form-control" id="municipio_id_rep" name="municipio_id_rep" required>
                      <option value="NULL">..::Seleccione::..</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="telefono_rep">Telefono <span class="req">*</span></label>
                    <input type="text" class="form-control" id="telefono_rep" name="telefono_rep" required>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="email_rep">Email <span class="req">*</span></label>
                    <input type="email" class="form-control" id="email_rep" name="email_rep" required pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="estado_rep">Estado <span class="req">*</span></label><br>
                    <select class="form-control" id="estado_rep" name="estado_rep" required>
                      <option value="NULL">..::Seleccione::..</option>
                      <option value="1">Activo</option>
                      <option value="0">Inactivo</option>
                    </select>
                  </div>
                </div>
              </fieldset>
              <fieldset id="documentosEmpresa">
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">
                      <b>Documentos Empresa</b>
                    </h3>
                  </div>
                </div>
                <div id="newRow">
                  <div class="col-sm-12">
                    <div class="inputFormRow">
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="tipo_archivo">Tipo archivo <span class="req">*</span></label>
                          <select class="form-control" id="tipo_archivo" name="tipo_archivo[]" required>
                            <option value="NULL">..::Seleccione::..</option>
                            <option value="b818b8ae-4c16-11ed-84aa-00155da15edf">RUT</option>
                            <option value="b818f27c-4c16-11ed-84aa-00155da15edf">CERTIFICADO C&Aacute;MARA Y COMERCIO</option>
                            <option value="c1967719-4c16-11ed-84aa-00155da15edf">DOCUMENTO IDENTIDAD REPRESENTANTE LEGAL</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="archivo">Archivo <span class="req">*</span></label>
                          <input type="file" id="archivo" name="archivo[]" class="form-control" required accept=".pdf">
                          <div class="label label-warning">Peso m&aacute;ximo  10 MB</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </fieldset>
              <div class="col-sm-2">
                <button type="button" id="addFile" class="btn btn-primary btn-sn btn-block"><i class="fa fa-plus"></i> Agregar</button>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="col-sm-6">
                <button type="submit" class="btn btn-primary" id="save" name="save" value="saveEnterprise"><i class="fa fa-save"></i> Guardar</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.box -->
      </div>
  </section>
</div>