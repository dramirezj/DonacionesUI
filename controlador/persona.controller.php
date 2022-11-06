<?php

	namespace App\Controlador;

	require_once($_SERVER["DOCUMENT_ROOT"]."/DonacionesUI/app/modelo/persona.model.php");

	use App\Modelo\PersonaModel;
	use App\Entidades\Persona;

	class PersonaController {

		public function addPersona(Persona $persona) {

			return (PersonaModel::addPersona($persona));
			
		}

		public function obtenerTodosPersonas() {

			return (PersonaModel::obtenerTodosPersonas());
			
		}

		public function obtenerPersona($id) {

			return (PersonaModel::obtenerPersona($id));
			
		}

		public function existePersona($id_tipo_doc, $identificacion) {

			return (PersonaModel::existePersona($id_tipo_doc, $identificacion));

		}

		public function updatePersona(Persona $persona) {

			return (PersonaModel::updatePersona($persona));

		}
		

	}