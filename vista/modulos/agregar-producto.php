<?php

  use App\Controlador\CategoriaController;

  $catCtrl = new CategoriaController();
  $categorias = $catCtrl->getCategorias();

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
              <b>Agregar Producto</b>
            </h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" id="formNewProduct" method="POST">
            <div class="box-body">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="code">Codigo</label>
                  <input type="text" class="form-control" id="code" name="code" required>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="name">Nombre</label>
                  <input type="text" class="form-control" id="name" name="name" required>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="description">Descripcion</label>
                  <input type="text" class="form-control" id="description" name="description" required>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="stock">Stock</label>
                  <input type="number" class="form-control" id="stock" name="stock" required>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="weight">Peso</label>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" id="weight" name="weight" required>
                     <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</button>
                     <ul class="dropdown-menu dropdown-menu-end">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Separated link</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="category_id">Categoria</label>
                  <select class="form-control" id="category_id" name="category_id" required>
                    <option value="NULL">..:: Seleccione ::..</option>
                    <?php
                      foreach ($categorias as $key => $value) {
                    ?>
                      <option value="<?php echo $value["id"]; ?>"><?php echo $value["name"]; ?></option>
                    <?php
                      }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="col-sm-6">
                <button type="submit" class="btn btn-primary" id="save" name="save" value="saveProduct">Guardar</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.box -->
      </div>
    </div>
  </section>
</div>