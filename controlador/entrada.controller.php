<?php

	namespace App\EntradaController;

	use App\Modelo\EntradaModel;

	class EntradaController { 

		public function addEntrada($factura,$fecha,$id_donante,$id_producto,$descripcion,$cantidad) {

			return (EntradaModel::addEntrada($factura,$fecha,$id_donante,$id_producto,$descripcion,$cantidad));

		}

		public function getEntrada() {

			return (EntradaModel::getEntrada());

		}

		public function obteberTodasEntradas() {

			return (EntradaModel::obteberTodasEntradas());

		}

	}