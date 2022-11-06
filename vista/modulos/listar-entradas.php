<?php
  
  $entradaCtrl = new EntradaController();
  $resultado = $entradaCtrl->obteberTodasEntradas();

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
                <b>Listado de Entradas</b>
              </h3>
            </div>

            <div class="box-body">

              <table id="tListarProductos" class="table table-striped table-bordered" style="width:100%">

                <thead>
                  <tr>
                    <th>Factura</th>
                    <th>Fecha</th>
                    <th>Descripcion</th>
                    <th>Donante</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach ($resultado as $key => $value) {
                  ?>
                    <tr>
                      <td><?php echo $value["factura"]; ?></td>
                      <td><?php echo $value["fecha"]; ?></td>
                      <td><?php echo $value["descripcion"]; ?></td>
                      <td><?php echo $value["nombre_donante"]; ?></td>
                      <td><?php echo $value["nombre_producto"]; ?></td>
                      <td><?php echo $value["cantidad"]; ?></td>
                      <td><a class="btn btn-primary" href="<?php echo $rutaServer; ?>/editar-empresa/<?php echo $value["id"]; ?>"><i class="fa fa-edit"></i></a></td>
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