<?php

	namespace App\Controlador;

	use App\Modelo\DepartamentoModel;
	use App\Entidades\Departamento;

	class DepartamentoController {

		public function getDepartamentos() {

			return (DepartamentoModel::getDepartamentos());

		}

		public function getDepartamento($id) {

			return (DepartamentoModel::getDepartamento($id));

		}

	}