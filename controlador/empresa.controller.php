<?php

	namespace App\Controlador;

	require_once($_SERVER["DOCUMENT_ROOT"]."/DonacionesUI/app/modelo/empresa.model.php");

	use App\Modelo\EmpresaModel;
	use App\Entidades\Empresa;

	class EmpresaController {

		public function saveEmpresa(Empresa $empresa) {

			return (EmpresaModel::saveEmpresa($empresa));
			
		}

		public function obtenerEmpresa($empresa_id) {

			return (EmpresaModel::obtenerEmpresa($empresa_id));

		}

		public function obtenerEmpresas() {

			return (EmpresaModel::obtenerEmpresas());

		}

		public function updateEmpresa(Empresa $empresa) {

			return (EmpresaModel::updateEmpresa($empresa));

		}

	}