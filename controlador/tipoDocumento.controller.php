<?php

	namespace App\Controlador;

	use App\Modelo\TipoDocumentoModel;

	class TipoDocumentoController {

		public function obtenerTipoDocumento($tipo_documento_id) {

			return (TipoDocumentoModel::obtenerTipoDocumento($tipo_documento_id));

		}

	}