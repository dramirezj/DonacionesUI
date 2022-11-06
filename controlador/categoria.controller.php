<?php

    namespace App\Controlador;

    use App\Modelo\CategoriaModel;

    class CategoriaController {

      public function getCategorias() {

          return (CategoriaModel::getCategorias());

      }

      public function guardarCategoria($codigo, $name, $description, $categoria_id) {

        return (CategoriaModel::guardarCategoria($codigo, $name, $description, $categoria_id));

      }

    }