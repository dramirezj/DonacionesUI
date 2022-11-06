<?php

	namespace App\Controlador;

	require_once($_SERVER["DOCUMENT_ROOT"]."/DonacionesUI/app/modelo/municipio.model.php");

	use App\Entidades\Departamento;
	use App\Modelo\MunicipioModel;

	class MunicipioController {

		public function getMunicipios() {

			return (MunicipioModel::getMunicipios());

		}

		public function getMunicipiosPorDepto(Departamento $departamento) {

			return (MunicipioModel::getMunicipiosPorDepto($departamento));

		}

		public function getMunicipio($id, $departamento_id) {

			return (MunicipioModel::getMunicipio($id, $departamento_id));

		}

	}