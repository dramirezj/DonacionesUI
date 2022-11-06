<?php

	namespace App\Controlador;

	use App\Modelo\ProductoModel;

	class ProductoController {

		public function addProducto($codigo,$name,$description,$id_categoria) {

			return (ProductoModel::addProducto($codigo,$name,$description,$id_categoria));

		}

		public function getProductos() {

			return (ProductoModel::getProductos());

		}

		public function obtenerTodosProductos() {
		
			return (ProductoModel::obtenerTodosProductos());

		}

	}