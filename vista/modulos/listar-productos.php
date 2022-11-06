<?php

  $prodCtrl = new ProductoController();
  $resultado = $prodCtrl -> getProductos();

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
                <b>Listado de Productos</b>
              </h3>
            </div>

            <div class="box-body">

              <table id="tListarProductos" class="table table-striped table-bordered" style="width:100%">

                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Descripcion</th>
                    <th>Estado</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach ($resultado as $key => $value) {
                  ?>
                    <tr>
                      <td><?php echo $value["id"]; ?></td>
                      <td><?php echo $value["name"]; ?></td>
                      <td><?php echo $value["description"]; ?></td>
                      <td><?php echo $value["category_name"]; ?></td>
                      <td><small class="label <?php echo $value["enabled"] === '1' ? 'label-success' : 'label-danger'; ?>"><?php echo $value["enabled"] === '1' ? "Activo" : "Inactivo";  ?></small></td>
                      <td><a class="btn btn-primary" href="<?php echo $rutaServer ?>/editar-empresa/<?php echo $value["id"]; ?>"><i class="fa fa-edit"></i></a></td>
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