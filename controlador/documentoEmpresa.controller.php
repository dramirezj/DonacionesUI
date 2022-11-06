<?php

	namespace App\Controlador;

	require_once($_SERVER["DOCUMENT_ROOT"]."/DonacionesUI/app/modelo/documentoEmpresa.model.php");

	use App\Modelo\DocumentoEmpresaModel;
	use App\Entidades\DocumentoEmpresa;

	class DocumentoEmpresaController {

		public function saveDocumentoEmpresa(DocumentoEmpresa $documentoEmpresa) {

			return (DocumentoEmpresaModel::saveDocumentoEmpresa($documentoEmpresa));

		}

		public function obtenerDocumentoEmpresa($empresa_id) {

			return (DocumentoEmpresaModel::obtenerDocumentoEmpresa($empresa_id));

		}

		public function actualizarDocumentoEmpresa(DocumentoEmpresa $documentoEmpresa) {

			return (DocumentoEmpresaModel::actualizarDocumentoEmpresa($documentoEmpresa));

		}

	}