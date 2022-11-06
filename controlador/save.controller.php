<?php

	namespace App\Controlador;

	require_once("persona.controller.php");
	require_once("empresa.controller.php");
	require_once("documentoEmpresa.controller.php");
	require_once($_SERVER["DOCUMENT_ROOT"]."/DonacionesUI/app/entidades/persona.entity.php");
	require_once($_SERVER["DOCUMENT_ROOT"]."/DonacionesUI/app/entidades/empresa.entity.php");
	require_once($_SERVER["DOCUMENT_ROOT"]."/DonacionesUI/app/entidades/documentoEmpresa.entity.php");

	use App\Modelo\Config;

	/****************************************
	 * ENTIDADES 
	 * **************************************/
	USE App\Entidades\Persona;
	USE App\Entidades\Empresa;
	USE App\Entidades\DocumentoEmpresa;

	/****************************************
	 * CONTROLADORES 
	 * **************************************/
	USE App\Controlador\PersonaController;
	USE App\Controlador\EmpresaController;
	USE App\Controlador\DocumentoEmpresaController;

	if(isset($_POST["save"])) {

		if($_POST["save"] === "saveProduct") {

			$prodCtrl = new ProductoController();

			$codigo			= $_POST["code"];
			$name			= $_POST["name"];
			$description	= $_POST["description"];
			$category_id	= $_POST["category_id"];

			$resultado = $prodCtrl -> addProducto($codigo,$name,$description,$category_id);

			if($resultado > 0) {
				echo "Ok";
			} else {
				echo "Error";
			}

		}

		if($_POST["save"] === "savePerson") {

			$personaCtrl = new PersonaController();

			$id_tipo_doc = $_POST["documentType"];
			$identificacion = $_POST["id"];
			$primer_nombre = $_POST["firstname"];
			$segundo_nombre = $_POST["secondname"];
			$primer_apellido = $_POST["surname"];
			$segundo_aepllido = $_POST["secondsurname"];
			$direccion = $_POST["address"];
			$telefono = $_POST["phone"];

			$persona = new Persona($id_tipo_doc, $identificacion, $primer_nombre, $segundo_nombre, $primer_apellido,
			$segundo_aepllido, $direccion, $telefono);

			$resultado = $personaCtrl -> addPersona($persona);

			if($resultado > 0) {
				echo "Ok";
			} else {
				echo "Error";
			}

		}

		if($_POST["save"] === "editPerson") {

			//var_dump($_POST);

			$personaCtrl = new PersonaController();

			$persona_id = $_POST["persona_id"];
			$id_tipo_doc = $_POST["id_tipo_doc"];
			$identificacion = $_POST["identificacion"];
			$primer_nombre = $_POST["primer_nombre"];
			$segundo_nombre = $_POST["segundo_nombre"];
			$primer_apellido = $_POST["primer_apellido"];
			$segundo_apellido = $_POST["segundo_apellido"];
			$direccion = $_POST["direccion"];
			$telefono = $_POST["telefono"];
			$email = $_POST["email"];
			$departamento_id = $_POST["departamento_id"];
			$municipio_id = $_POST["municipio_id"];
			$enabled = $_POST["enabled"];

			$persona = new Persona;
			$persona->__construct1($persona_id, $id_tipo_doc, $identificacion, $primer_nombre, $segundo_nombre, $primer_apellido,
					$segundo_apellido, $direccion, $telefono, $email, $departamento_id, $municipio_id, $enabled);

			$resultado = $personaCtrl->updatePersona($persona);

			if($resultado > 0) {
				echo "Ok";
			} else {
				echo "Error";
			}

		}

		if($_POST["save"] === "saveEnterprise") {

			//var_dump($_POST);

			/*******************************************
			* DATOS DEL REPRESENTANTE LEGAL
			********************************************/
			$id_tipo_doc_rep = $_POST["id_tipo_doc_rep"];
			$identificacion_rep = $_POST["identificacion_rep"];
			$primer_nombre_rep = $_POST["primer_nombre_rep"];
			$segundo_nombre_rep = $_POST["segundo_nombre_rep"];
			$primer_apellido_rep = $_POST["primer_apellido_rep"];
			$segundo_apellido_rep = $_POST["segundo_apellido_rep"];
			$direccion_rep = $_POST["direccion_rep"];
			$telefono_rep = $_POST["telefono_rep"];
			$email_rep = $_POST["email_rep"];
			$departamento_id_rep = $_POST["departamento_id_rep"];
			$municipio_id_rep = $_POST["municipio_id_rep"];
			$estado_rep = $_POST["estado_rep"];

			$personaCtrl = new PersonaController();
			$persona = new Persona();
			$persona->__construct0($id_tipo_doc_rep, $identificacion_rep, $primer_nombre_rep, $segundo_nombre_rep, $primer_apellido_rep,
				$segundo_apellido_rep, $direccion_rep, $telefono_rep, $email_rep, $departamento_id_rep, $municipio_id_rep, $estado_rep);

			$representante_id = $personaCtrl -> addPersona($persona);

			if($representante_id !== "") {

				/*******************************************
				* DATOS DEL REPRESENTANTE EMPRESA
				********************************************/
				$id_tipo_doc_emp = $_POST["id_tipo_doc_emp"];
				$identificacion_emp = $_POST["identificacion_emp"];
				$razon_social_emp = $_POST["razon_social_emp"];
				$direccion_emp = $_POST["direccion_emp"];
				$telefono_emp = $_POST["telefono_emp"];
				$email_emp = $_POST["email_emp"];
				$departamento_id_emp = $_POST["departamento_id_emp"];
				$municipio_id_emp = $_POST["municipio_id_emp"];
				$tipo_persona_emp = $_POST["tipo_persona_emp"];
				$estado_emp = $_POST["estado_emp"];
				$empresaCtrl = new EmpresaController();
				$empresa = new Empresa();
				$empresa->__construct0($id_tipo_doc_emp, $identificacion_emp, $razon_social_emp, $direccion_emp, $telefono_emp,
					$email_emp, $departamento_id_emp, $municipio_id_emp, $representante_id, $tipo_persona_emp, $estado_emp);

				$empresa_id = $empresaCtrl -> saveEmpresa($empresa);

				if($empresa_id !== "") {

					/*******************************************
					* DOCUMENTOS DE LA EMPRESA
					********************************************/
					$tipo_archivo = $_POST["tipo_archivo"];
					$archivo = $_FILES["archivo"];

					$documentosEmpresaCtrl = new DocumentoEmpresaController();

					//var_dump(count($_FILES["archivo"]["name"]));

					for($i = 0; $i < count($archivo["name"]); $i++) {

						
						if(!(strpos($archivo["type"][$i], "pdf")) && ($archivo["size"][$i] <= 10485760)) {

							echo "<div class='alert alert-danger'>La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .pdf <br><li>se permiten archivos de 10 MB máximo.</td></tr></table></div>";
							die();

						}

						$tipo_documento_id = $tipo_archivo[$i];
						$nombre_archivo = $archivo["name"][$i];

						$directorio = "D:/documentos/".$razon_social_emp;

						if(!file_exists($directorio)) {
							mkdir($directorio, 0777, true);
						}

						if (move_uploaded_file($archivo['tmp_name'][$i],  $directorio."/".$nombre_archivo)) {

							$documentoEmpresa = new DocumentoEmpresa();
							$documentoEmpresa->__construct0($empresa_id,$tipo_documento_id,$nombre_archivo);
							$resultado = $documentosEmpresaCtrl->saveDocumentoEmpresa($documentoEmpresa);

						}

					}

					if($resultado > 0) {

						echo "Ok";

					} else {

						echo "Error";

					}

				}

			}


		}

		if($_POST["save"] === "editEnterprise") {

			//var_dump($_POST);

			/*******************************************
			* DATOS DEL REPRESENTANTE LEGAL
			********************************************/
			$persona_id = $_POST["persona_id"];
			$id_tipo_doc_rep = $_POST["id_tipo_doc_rep"];
			$identificacion_rep = $_POST["identificacion_rep"];
			$primer_nombre_rep = $_POST["primer_nombre_rep"];
			$segundo_nombre_rep = $_POST["segundo_nombre_rep"];
			$primer_apellido_rep = $_POST["primer_apellido_rep"];
			$segundo_apellido_rep = $_POST["segundo_apellido_rep"];
			$direccion_rep = $_POST["direccion_rep"];
			$telefono_rep = $_POST["telefono_rep"];
			$email_rep = $_POST["email_rep"];
			$departamento_id_rep = $_POST["departamento_id_rep"];
			$municipio_id_rep = $_POST["municipio_id_rep"];
			$estado_rep = $_POST["estado_rep"];

			$personaCtrl = new PersonaController();

			$persona = $personaCtrl->existePersona($id_tipo_doc_rep, $identificacion_rep);	

			if($persona != NULL) {

				$persona = new Persona();
				$persona->__construct1($persona_id, $id_tipo_doc_rep, $identificacion_rep, $primer_nombre_rep, $segundo_nombre_rep,
					$primer_apellido_rep, $segundo_apellido_rep, $direccion_rep, $telefono_rep, $email_rep, $departamento_id_rep,
					$municipio_id_rep, $estado_rep);

				$resultado = $personaCtrl -> updatePersona($persona);

				if($resultado > 0) {

					/*******************************************
					* DATOS DEL REPRESENTANTE EMPRESA
					********************************************/
					$empresa_id = $_POST["empresa_id"];
					$id_tipo_doc_emp = $_POST["id_tipo_doc_emp"];
					$identificacion_emp = $_POST["identificacion_emp"];
					$razon_social_emp = $_POST["razon_social_emp"];
					$direccion_emp = $_POST["direccion_emp"];
					$telefono_emp = $_POST["telefono_emp"];
					$email_emp = $_POST["email_emp"];
					$departamento_id_emp = $_POST["departamento_id_emp"];
					$municipio_id_emp = $_POST["municipio_id_emp"];
					$tipo_persona_emp = $_POST["tipo_persona_emp"];
					$estado_emp = $_POST["estado_emp"];
					$empresaCtrl = new EmpresaController();
					$empresa = new Empresa();
					$empresa->__construct1($empresa_id, $id_tipo_doc_emp, $identificacion_emp, $razon_social_emp, $direccion_emp,
						$telefono_emp, $email_emp, $departamento_id_emp, $municipio_id_emp, $persona_id, $tipo_persona_emp,
						$estado_emp);

					$resultado = $empresa_id = $empresaCtrl -> updateEmpresa($empresa);

					if($resultado > 0) {

						echo "Ok";

					} else {

						echo "Error";

					}

				}

			} else {

				$persona = new Persona();
				$persona->__construct0($id_tipo_doc_rep, $identificacion_rep, $primer_nombre_rep, $segundo_nombre_rep, $primer_apellido_rep,
					$segundo_apellido_rep, $direccion_rep, $telefono_rep, $email_rep, $departamento_id_rep, $municipio_id_rep, $estado_rep);

				$representante_id = $personaCtrl -> addPersona($persona);

				if($representante_id !== "") {

					/*******************************************
					* DATOS DEL REPRESENTANTE EMPRESA
					********************************************/
					$empresa_id = $_POST["empresa_id"];
					$id_tipo_doc_emp = $_POST["id_tipo_doc_emp"];
					$identificacion_emp = $_POST["identificacion_emp"];
					$razon_social_emp = $_POST["razon_social_emp"];
					$direccion_emp = $_POST["direccion_emp"];
					$telefono_emp = $_POST["telefono_emp"];
					$email_emp = $_POST["email_emp"];
					$departamento_id_emp = $_POST["departamento_id_emp"];
					$municipio_id_emp = $_POST["municipio_id_emp"];
					$tipo_persona_emp = $_POST["tipo_persona_emp"];
					$estado_emp = $_POST["estado_emp"];
					$empresaCtrl = new EmpresaController();
					$empresa = new Empresa();
					$empresa->__construct1($empresa_id, $id_tipo_doc_emp, $identificacion_emp, $razon_social_emp, $direccion_emp,
						$telefono_emp, $email_emp, $departamento_id_emp, $municipio_id_emp, $representante_id, $tipo_persona_emp,
						$estado_emp);

					$resultado = $empresa_id = $empresaCtrl -> updateEmpresa($empresa);

					if($resultado > 0) {

						echo "Ok";

					} else {

						echo "Error";

					}

				}

			}


		}

		if($_POST["save"] === "saveEntry") {

			$entryCtrl = new EntradaController();

			$factura = $_POST["invoice"];
			$fecha = $_POST["date"];
			$id_donante = $_POST["donor_id"];
			$id_producto = $_POST["product_id"];
			$descripcion = $_POST["description"];
			$cantidad = $_POST["quantity"];

			$resultado = $entryCtrl -> addEntrada($factura,$fecha,$id_donante,$id_producto,$descripcion,$cantidad);

			if($resultado > 0) {
				echo "Ok";
			} else {
				echo "Error";
			}

		}

	}