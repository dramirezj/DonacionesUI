<?php

	class SalidaController {

		public function addSalida($factura,$fecha,$id_producto,$descripcion,$cantidad) {

			return (SalidaModel::addEntrada($factura,$fecha,$id_producto,$descripcion,$cantidad));

		}

		public function getSalida() {

			return (SalidaModel::getSalida());

		}

	}