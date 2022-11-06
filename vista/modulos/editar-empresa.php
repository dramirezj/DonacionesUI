<?php

  /******************************************
   ENTIDADES
  *****************************************/
  use App\Entidades\Departamento;
  use App\Entidades\Municipio;
  use App\Entidades\Empresa;
  use App\Entidades\Persona;
  use App\Entidades\DocumentoEmpresa;
  use App\Entidades\TipoDocumento;

  /******************************************
   CONTROLADORES
  *****************************************/
  use App\Controlador\DepartamentoController;
  use App\Controlador\MunicipioController;
  use App\Controlador\EmpresaController;
  use App\Controlador\PersonaController;
  use App\Controlador\DocumentoEmpresaController;
  use App\Controlador\TipoDocumentoController;


  $departmentoCtrl = new DepartamentoController();
  $departamentos = $departmentoCtrl->getDepartamentos();

  /******************************************
   CAPTURAMOS PARAMETROS DE LA URL
  *****************************************/
  if(isset($_GET['ruta'])) {
    $url = explode("/", $_GET['ruta']);
    $empresa_id = $url[1];
  }

  $empresaCtrl = new EmpresaController();
  $empresa = $empresaCtrl->obtenerEmpresa($empresa_id);

  $personaCtrl = new PersonaController();
  $persona = $personaCtrl->obtenerPersona($empresa->getRepresentante_id());

  $documentosEmpresaCtrl = new DocumentoEmpresaController();
  $documentos = $documentosEmpresaCtrl->obtenerDocumentoEmpresa($empresa->getId());

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
              <b>Editar Empresa</b>
            </h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" id="formEditEnterprise" method="POST" enctype="multipart/form-data">
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
                    <input type="hidden" name="empresa_id" id="empresa_id" value="<?php echo $empresa->getId(); ?>">
                    <label for="id_tipo_doc_emp">Tipo Documento</label>
                    <select class="form-control" id="id_tipo_doc_emp" name="id_tipo_doc_emp" readonly="true">
                      <option value="NULL">..:: Seleccione ::..</option>
                      <option value="CC" <?php echo $empresa->getId_tipo_doc() === "CC" ? "selected" : ""; ?>>CC (CEDULA DE CIUDADANIA)</option>
                      <option value="CE" <?php echo $empresa->getId_tipo_doc() === "CE" ? "selected" : ""; ?>>CE (CEDULA DE EXTRANJERIA)</option>
                      <option value="NI" <?php echo $empresa->getId_tipo_doc() === "NI" ? "selected" : ""; ?>>NIT (N&Uacute;MERO DE IDENTIFICACI&Oacute;N TRIBUTARIA)</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="identificacion_emp">Identificacion</label>
                    <input type="text" class="form-control" id="identificacion_emp" name="identificacion_emp" value="<?php echo $empresa->getIdentificacion(); ?>" readonly="true">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="razon_social_emp">Raz&oacute;n Social</label>
                    <input type="text" class="form-control" id="razon_social_emp" name="razon_social_emp" value="<?php echo $empresa->getRazon_social(); ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="direccion_emp">Direccion</label>
                    <input type="text" class="form-control" id="direccion_emp" name="direccion_emp" value="<?php echo $empresa->getDireccion(); ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="departamento_id_emp">Departamento</label>
                    <select class="form-control" id="departamento_id_emp" name="departamento_id_emp">
                      <option value="NULL">..::Seleccione::..</option>
                      <?php
                        foreach ($departamentos as $departamento) {
                      ?>
                        <option value="<?php echo $departamento->getId(); ?>" <?php echo $departamento->getId() == $empresa->getDepartamento_id() ? "selected" : ""; ?>><?php echo $departamento->getNombre(); ?></option>
                      <?php
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="municipio_id_emp">Municipio</label>
                    <select class="form-control" id="municipio_id_emp" name="municipio_id_emp">
                      <option value="NULL">..::Seleccione::..</option>
                      <?php
                        $municipioCtrl = new MunicipioController();
                        $municipio = $municipioCtrl->getMunicipio($empresa->getMunicipio_id(),$empresa->getDepartamento_id());
                      ?>
                      <option value="<?php echo $municipio->getId(); ?>" selected><?php echo $municipio->getNombre(); ?></option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="telefono_emp">Telefono</label>
                    <input type="text" class="form-control" id="telefono_emp" name="telefono_emp" value="<?php echo $empresa->getTelefono(); ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="email_emp">Email</label>
                    <input type="email" class="form-control" id="email_emp" name="email_emp" value ="<?php echo $empresa->getEmail(); ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="tipo_persona_emp">Tipo Persona</label><br>
                    <select class="form-control" id="tipo_persona_emp" name="tipo_persona_emp">
                      <option value="NULL">..::Seleccione::..</option>
                      <option value="J" <?php echo $empresa->getTipo_persona() === "J" ? "selected" : ""; ?>>Juridica</option>
                      <option value="N" <?php echo $empresa->getTipo_persona() === "N" ? "selected" : ""; ?>>Natural</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="estado_emp">Estado</label><br>
                    <select class="form-control" id="estado_emp" name="estado_emp">
                      <option value="NULL">..::Seleccione::..</option>
                      <option value="1" <?php echo $empresa->getEnabled() == 1 ? "selected" : ""; ?>>Activo</option>
                      <option value="0" <?php echo $empresa->getEnabled() == 0 ? "selected" : ""; ?>>Inactivo</option>
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
                    <input type="hidden" name="persona_id" id="persona_id" value="<?php echo $persona->getId(); ?>">
                    <label for="id_tipo_doc_rep">Tipo Documento</label>
                    <select class="form-control" id="id_tipo_doc_rep" name="id_tipo_doc_rep">
                      <option value="NULL">..:: Seleccione ::..</option>
                      <option value="CC" <?php echo $persona->getId_tipo_doc() === "CC" ? "selected" : ""; ?>>CC (CEDULA DE CIUDADANIA)</option>
                      <option value="CE" <?php echo $persona->getId_tipo_doc() === "CE" ? "selected" : ""; ?>>CE (CEDULA DE EXTRANJERIA)</option>
                      <option value="PA" <?php echo $persona->getId_tipo_doc() === "PA" ? "selected" : ""; ?>>PA (PASAPORTE)</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="identificacion_rep">Identificacion</label>
                    <input type="text" class="form-control" id="identificacion_rep" name="identificacion_rep" value="<?php echo $persona->getIdentificacion(); ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="primer_nombre_rep">Primer Nombre</label>
                    <input type="text" class="form-control" id="primer_nombre_rep" name="primer_nombre_rep" value="<?php echo $persona->getPrimer_nombre(); ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="segundo_nombre_rep">Segundo Nombre</label>
                    <input type="text" class="form-control" id="segundo_nombre_rep" name="segundo_nombre_rep" value="<?php echo $persona->getSegundo_nombre(); ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="primer_apellido_rep">Primer Apellido</label>
                    <input type="text" class="form-control" id="primer_apellido_rep" name="primer_apellido_rep" value="<?php echo $persona->getPrimer_apellido(); ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="segundo_apellido_rep">Segundo Apellido</label>
                    <input type="text" class="form-control" id="segundo_apellido_rep" name="segundo_apellido_rep" value="<?php echo $persona->getSegundo_apellido(); ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="direccion_rep">Direccion</label>
                    <input type="text" class="form-control" id="direccion_rep" name="direccion_rep" value="<?php echo $persona->getDireccion(); ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="departamento_id_rep">Departamento</label>
                    <select class="form-control" id="departamento_id_rep" name="departamento_id_rep">
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
                    <label for="municipio_id_rep">Municipio</label>
                    <select class="form-control" id="municipio_id_rep" name="municipio_id_rep">
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
                    <label for="telefono_rep">Telefono</label>
                    <input type="text" class="form-control" id="telefono_rep" name="telefono_rep" value="<?php echo $persona->getTelefono(); ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="email_rep">Email</label>
                    <input type="email" class="form-control" id="email_rep" name="email_rep" value="<?php echo $persona->getEmail(); ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="estado_rep">Estado</label><br>
                    <select class="form-control" id="estado_rep" name="estado_rep">
                      <option value="NULL">..::Seleccione::..</option>
                      <option value="1" <?php echo $persona->getEnabled() == 1 ? "selected" : ""; ?>>Activo</option>
                      <option value="0" <?php echo $persona->getEnabled() == 0 ? "selected" : ""; ?>>Inactivo</option>
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
                <div class="col-sm-12">
                  <table id="lstDocumentos" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>Tipo Documento</th>
                        <th>Nombre archivo</th>
                        <th>Fecha Cargue</th>
                        <th>Fecha Modificaci&oacute;n</th>
                        <th>Descargar</th>
                        <th>Editar</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($documentos as $documento) {
                          $tipoDocumentoCtrl = new TipoDocumentoController();
                          $tipoDocumento = $tipoDocumentoCtrl->obtenerTipoDocumento($documento->getTipo_documento_id());
                          //print("<pre>".print_r($tipoDocumento,true)."</pre>");;
                      ?>
                        <tr>
                          <td><?php echo $tipoDocumento->getNombre(); ?></td>
                          <td><?php echo $documento->getNombre_archivo(); ?></td>
                          <td><?php echo $documento->getCreateAt(); ?></td>
                          <td><?php echo $documento->getModifiedAt(); ?></td>
                          <!--<td class="text-center">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewDocumento"><i class="fa fa-eye"></i>
                          </button></td>
                          <td class="text-center">
                            <button type="button" class="btn btn-warning" id="mostrar" value="mostrarDocumento" data-toggle="modal" data-target="#editDocumento" onclick="mostrarDocumento('<?php echo $documento->getId(); ?>'')"><i class="fa fa-edit"></i>
                          </button></td>-->
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </fieldset>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="col-sm-6">
                <button type="submit" class="btn btn-primary" id="save" name="save" value="editEnterprise"><i class="fa fa-save"></i> Guardar</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.box -->
      </div>
  </section>
</div>

<div class="modal fade" id="viewDocumento" tabindex="-1" role="dialog" aria-labelledby="viewDocumento" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Visualizar Documento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="canvas_container">
          <canvas id="pdf_renderer">
            <embed src="../documentos/Pazysalvo.pdf" type="application/pdf" width="100%" height="100%"></embed>
          </canvas>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editDocumento" tabindex="-1" role="dialog" aria-labelledby="editDocumento" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar Documento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form role="form" id="formUpdateDocumento" method="POST">
          <div class="box-body">
            <div id="newRow">
              <div class="col-sm-12">
                <div class="inputFormRow">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="tipo_archivo">Tipo archivo</label>
                      <select class="form-control" id="tipo_archivo" name="tipo_archivo">
                        <option value="NULL">..::Seleccione::..</option>
                        <option value="b818b8ae-4c16-11ed-84aa-00155da15edf">RUT</option>
                        <option value="b818f27c-4c16-11ed-84aa-00155da15edf">CERTIFICADO C&Aacute;MARA Y COMERCIO</option>
                        <option value="c1967719-4c16-11ed-84aa-00155da15edf">DOCUMENTO IDENTIDAD REPRESENTANTE LEGAL</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <label for="archivo">Archivo</label>
                      <input type="file" id="archivo" name="archivo" class="form-control" accept=".pdf">
                      <div class="label label-warning">Peso m&aacute;ximo  10 MB</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="save" value="editDocumento" onclick="editarDocumento()"><i class="fa fa-upload"></i> Cargar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
      </div>
    </div>
  </div>
</div>