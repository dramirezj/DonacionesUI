<?php

	namespace App\Modelo;

	require_once("conexion.php");
	require_once("uuid.php");

	use App\Modelo\Conexion;
	use App\Modelo\UUIDModel;
	use \PDO;

	use App\Entidades\Empresa;

	class EmpresaModel {

		static public function saveEmpresa(Empresa $empresa) {

			$conexion = new Conexion("ficu");

			try {

				$pdo = $conexion->conectar();

				$id = UUIDModel::v4();

				$sQuery = "INSERT INTO `empresa`(`id`, `id_tipo_doc`, `identificacion`, `razon_social`, `direccion`, `telefono`, `email`,
								`departamento_id`,`municipio_id`, `representante_id`, `tipo_persona`, `enabled`)
						   VALUES (:id,:id_tipo_doc,:identificacion,:razon_social,:direccion,:telefono,:email,:departamento_id,:municipio_id,:representante_id,:tipo_persona,:enabled)";

				$stmt = $pdo-> prepare($sQuery);

				$stmt -> bindValue(":id",$id);

				$stmt -> bindValue(":id_tipo_doc",$empresa->getId_tipo_doc());

				$stmt -> bindValue(":identificacion",$empresa->getIdentificacion());

				$stmt -> bindValue(":razon_social",$empresa->getRazon_social());

				$stmt -> bindValue(":direccion",$empresa->getDireccion());

				$stmt -> bindValue(":telefono",$empresa->getTelefono());

				$stmt -> bindValue(":email",$empresa->getEmail());

				$stmt -> bindValue(":departamento_id",$empresa->getDepartamento_id());

				$stmt -> bindValue(":municipio_id",$empresa->getMunicipio_id());

				$stmt -> bindValue(":representante_id",$empresa->getRepresentante_id());

				$stmt -> bindValue(":tipo_persona",$empresa->getTipo_persona());

				$stmt -> bindValue(":enabled",$empresa->getEnabled());
			
				$stmt -> execute();

				$stmt = null;

			} catch(Exception $e) {
				
				$id = "";
				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

			return $id;

		}

		static public function obtenerEmpresa($empresa_id) {

			$conexion = new Conexion("ficu");

			try {

				$pdo = $conexion->conectar();

				$sQuery = "SELECT `id`, `id_tipo_doc`, `identificacion`, `razon_social`, `direccion`, `telefono`, `email`,
								`departamento_id`, `municipio_id`, `representante_id`, `tipo_persona`, `enabled`, `createAt`
						   FROM `empresa`
						   WHERE 1=1
						   AND `id`=:empresa_id";

				$stmt = $pdo-> prepare($sQuery);

				$stmt -> bindValue(":empresa_id", $empresa_id);

				$stmt -> execute();

				$resultado = $stmt -> fetch(PDO::FETCH_ASSOC);

				$empresa = new Empresa();
				$empresa->__construct2($resultado["id"], $resultado["id_tipo_doc"], $resultado["identificacion"],
										$resultado["razon_social"], $resultado["direccion"], $resultado["telefono"],
										$resultado["email"], $resultado["departamento_id"],$resultado["municipio_id"],
										$resultado["representante_id"], $resultado["tipo_persona"], $resultado["enabled"],
										$resultado["createAt"]);

			} catch(Exception $e) {
				
				$id = "";
				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			} finally {

				$stmt = null;

			}

			return $empresa;

		}

		static public function obtenerEmpresas() {

			$conexion = new Conexion("ficu");

			try {

				$pdo = $conexion->conectar();

				$sQuery = "SELECT `id`, `id_tipo_doc`, `identificacion`, `razon_social`, `direccion`, `telefono`, `email`, `departamento_id`,
								  `municipio_id`, `representante_id`, `tipo_persona`, `enabled`, `createAt`
						   FROM `empresa`
						   WHERE 1=1
						   AND `enabled`=1";

				$stmt = $pdo-> prepare($sQuery);

				$stmt -> execute();

				$resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);

				$empresas = array();

				foreach ($resultado as $key => $value) {
				
					$empresa = new Empresa();
					$empresa->__construct2($value["id"], $value["id_tipo_doc"], $value["identificacion"],
								$value["razon_social"], $value["direccion"], $value["telefono"],$value["email"],
								$value["departamento_id"],$value["municipio_id"], $value["representante_id"],
								$value["tipo_persona"], $value["enabled"], $value["createAt"]
							);

					array_push($empresas, $empresa);

				}

			} catch(Exception $e) {
				
				$id = "";
				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			} finally {

				$stmt = null;

			}

			return $empresas;

		}

		static public function updateEmpresa(Empresa $empresa) {

			$conexion = new Conexion("ficu");

			try {

				$pdo = $conexion->conectar();

				$sQuery = "UPDATE `empresa`
						   SET `id_tipo_doc`=:id_tipo_doc,
						   	   `identificacion`=:identificacion,
						   	   `razon_social`=:razon_social,
						   	   `direccion`=:direccion,
						   	   `telefono`=:telefono,
						   	   `email`=:email,
						   	   `departamento_id`=:departamento_id,
						   	   `municipio_id`=:municipio_id,
						   	   `representante_id`=:representante_id,
						   	   `tipo_persona`=:tipo_persona,
						   	   `enabled`=:enabled
						   	WHERE 1=1
						   	AND `id`=:id";

				$stmt = $pdo-> prepare($sQuery);

				$stmt -> bindValue(":id",$empresa->getId());

				$stmt -> bindValue(":id_tipo_doc",$empresa->getId_tipo_doc());

				$stmt -> bindValue(":identificacion",$empresa->getIdentificacion());

				$stmt -> bindValue(":razon_social",$empresa->getRazon_social());

				$stmt -> bindValue(":direccion",$empresa->getDireccion());

				$stmt -> bindValue(":telefono",$empresa->getTelefono());

				$stmt -> bindValue(":email",$empresa->getEmail());

				$stmt -> bindValue(":departamento_id",$empresa->getDepartamento_id());

				$stmt -> bindValue(":municipio_id",$empresa->getMunicipio_id());

				$stmt -> bindValue(":representante_id",$empresa->getRepresentante_id());

				$stmt -> bindValue(":tipo_persona",$empresa->getTipo_persona());

				$stmt -> bindValue(":enabled",$empresa->getEnabled());
			
				$resultado = $stmt -> execute();

				$stmt = null;

			} catch(Exception $e) {
				
				$id = "";
				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

			return $resultado;

		}

	}