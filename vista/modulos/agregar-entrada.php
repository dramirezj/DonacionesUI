<?php

  $prodCtrl = new ProductoController();
  $resultado = $prodCtrl -> ObtenerTodosProductos();

  $donorCtrl = new DonanteController();
  $donantes = $donorCtrl -> getDonante();

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">
              <b>Agregar Entrada</b>
            </h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" id="formNewEntry" method="POST">
            <div class="box-body">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="invoice">Factura o Referencia</label>
                  <input type="text" class="form-control" id="invoice" name="invoice" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="date">Fecha</label>
                  <input type="date" class="form-control" id="date" name="date" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="product_id">Producto</label>
                  <select class="form-control" id="product_id" name="product_id" required>
                    <option value="NULL">..:: Seleccione ::..</option>
                    <?php
                      foreach ($resultado as $key => $value) {
                    ?>
                      <option value="<?php echo $value["id"]; ?>"><?php echo $value["name"]; ?></option>
                    <?php
                      }
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="quantity">Cantidad</label>
                  <input type="number" class="form-control" id="quantity" name="quantity" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="donor">Donante</label>
                  <select class="form-control" id="donor_id" name="donor_id" required>
                    <option value="NULL">..:: Seleccione ::..</option>
                    <?php
                      foreach ($donantes as $key => $value) {
                    ?>
                      <option value="<?php echo $value["id"]; ?>"><?php echo $value["nombre"]; ?></option>
                    <?php
                      }
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="description">Descripcion</label>
                  <textarea class="textarea" id="description" name="description" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="col-sm-6">
                <button type="submit" class="btn btn-primary" id="save" name="save" value="saveEntry">Guardar</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.box -->
      </div>
  </section>
</div>