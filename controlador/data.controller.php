<?php

	include_once("persona.controller.php");
	include_once("municipio.controller.php");
	include_once("documentoEmpresa.controller.php");
	require_once($_SERVER["DOCUMENT_ROOT"]."/DonacionesUI/app/entidades/persona.entity.php");
	require_once($_SERVER["DOCUMENT_ROOT"]."/DonacionesUI/app/entidades/departamento.entity.php");
	require_once($_SERVER["DOCUMENT_ROOT"]."/DonacionesUI/app/entidades/municipio.entity.php");
	require_once($_SERVER["DOCUMENT_ROOT"]."/DonacionesUI/app/entidades/documentoEmpresa.entity.php");

	use App\Entidades\Persona;
	use App\Controlador\PersonaController;

	use App\Entidades\Municipio;
	use App\Controlador\MunicipioController;

	use App\Entidades\Departamento;

	//var_dump($_POST);

	if(isset($_POST["mostrar"])) {
		if($_POST["mostrar"] === "mostrarDatosPersona") {

			$personaCtrl = new PersonaController();
			$persona = $personaCtrl->existePersona($_POST["id_tipo_doc"], $_POST['identificacion']);

			if(isset($persona)) {

				$datos = array(
					"id" => $persona->getId(),
					"id_tipo_doc" => $persona->getId_tipo_doc(),
					"identificacion" => $persona->getIdentificacion(),
					"primer_nombre" => $persona->getPrimer_nombre(),
					"segundo_nombre" => $persona->getSegundo_nombre(),
					"primer_apellido" => $persona->getPrimer_apellido(),
					"segundo_apellido" => $persona->getSegundo_apellido(),
					"direccion" => $persona->getDireccion(),
					"telefono" => $persona->getTelefono(),
					"email" => $persona->getEmail(),
					"departamento_id" => $persona->getDepartamento_id(),
					"municipio_id" => $persona->getMunicipio_id(),
					"enabled" => $persona->getEnabled()

				);

			} else {

				$datos = array(
					
					"codigo" => 404,
					"mensaje" => "No existe"

				);

			}

			echo json_encode($datos,true);

		}

		if($_POST["mostrar"] === "traerMunicipios") {

			$departamento = new Departamento;
			$departamento->setId($_POST["departamento_id"]);

			$municipioCtrl = new MunicipioController();
			$municipios = $municipioCtrl->getMunicipiosPorDepto($departamento);

			$data = array();

			foreach($municipios as $municipio) {
				$m = array(
					"id" => $municipio->getId(),
					"nombre" => $municipio->getNombre()
				);
				array_push($data, $m);

			}

			echo json_encode($data, true);

		}

		if($_POST["mostrar"] === "mostrarDocumento") {
			
			$documentoEmpresaCtrl = new DocumentoEmpresaController();

		}

	}