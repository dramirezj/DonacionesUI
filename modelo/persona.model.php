<?php

	namespace App\Modelo;

	require_once("conexion.php");
	require_once("uuid.php");

	use App\Modelo\Conexion;
	use App\Modelo\UUIDModel;
	use App\Entidades\Persona;
	use \PDO;

	class PersonaModel {

		static public function addPersona(Persona $persona) {

			$conexion = new Conexion("ficu");

			try {

				$id = UUIDModel::v4();

				$pdo = $conexion->conectar();

				$sql = "INSERT INTO `persona` (`id`,`id_tipo_doc`,`identificacion`,`primer_nombre`,
							`segundo_nombre`,`primer_apellido`,`segundo_apellido`,`direccion`,`telefono`, `email`, `departamento_id`,
							`municipio_id`)
						VALUES (:id,:id_tipo_doc,:identificacion,:primer_nombre,:segundo_nombre,:primer_apellido,
								:segundo_apellido,:direccion,:telefono,:email,:departamento_id,:municipio_id)";

				$stmt = $pdo->prepare($sql);

				$stmt->bindValue(':id',$id);

				$stmt->bindValue(':id_tipo_doc',$persona->getId_tipo_doc());

				$stmt->bindValue(':identificacion',$persona->getIdentificacion());

				$stmt->bindValue(':primer_nombre',$persona->getPrimer_nombre());

				$stmt->bindValue(':segundo_nombre',$persona->getSegundo_nombre());

				$stmt->bindValue(':primer_apellido',$persona->getPrimer_apellido());

				$stmt->bindValue(':segundo_apellido',$persona->getSegundo_apellido());

				$stmt->bindValue(':direccion',$persona->getDireccion());

				$stmt->bindValue(':telefono',$persona->getTelefono());

				$stmt->bindValue(':email',$persona->getEmail());

				$stmt->bindValue(':departamento_id',$persona->getDepartamento_id());

				$stmt->bindValue(':municipio_id',$persona->getMunicipio_id());

				$stmt -> execute();

				$stmt = null;

			} catch(Exception $e) {

				$id = "";
				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

			return $id;

		}

		static public function obtenerTodosPersonas() {

			$conexion = new Conexion("ficu");

			try {

				$pdo = $conexion->conectar();

				$sql = "SELECT `id`,`id_tipo_doc`,`identificacion`,`primer_nombre`,`segundo_nombre`,`primer_apellido`,
								`segundo_apellido`,`direccion`,`telefono`,`email`,`departamento_id`,`municipio_id`, `enabled`, `createAt`
						FROM `persona`
						WHERE 1=1
						ORDER BY `createAt` ASC";

				$stmt = $pdo->prepare($sql);

				$stmt -> execute();

				$resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);

				$personas = array();

				foreach ($resultado as $key => $value) {

					$persona = new Persona();

					$persona->__construct2($value["id"],$value["id_tipo_doc"],$value["identificacion"],$value["primer_nombre"],
							$value["segundo_nombre"],$value["primer_apellido"],$value["segundo_apellido"],$value["direccion"],
							$value["telefono"],$value["email"],$value["departamento_id"],$value["municipio_id"],$value["enabled"],
							$value["createAt"]
						);
					
					array_push($personas, $persona);

				}

				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

			return $personas;

		}

		static public function obtenerPersona($id) {

			$conexion = new Conexion("ficu");

			try {

				$pdo = $conexion->conectar();

				$sql = "SELECT `id`, `id_tipo_doc`, `identificacion`, `primer_nombre` ,`segundo_nombre`, `primer_apellido`, `segundo_apellido`, `direccion`, `telefono`,`email`, `departamento_id`, `municipio_id`, `enabled`, `createAt`
						FROM `persona`
						WHERE 1=1
						AND `id`=:id";

				$stmt = $pdo->prepare($sql);

				$stmt -> bindValue(":id", $id);

				$stmt -> execute();

				$resultado = $stmt -> fetch(PDO::FETCH_ASSOC);

				$persona = new Persona();

				$persona->__construct1($resultado["id"],$resultado["id_tipo_doc"],$resultado["identificacion"],
							$resultado["primer_nombre"],$resultado["segundo_nombre"],$resultado["primer_apellido"],
							$resultado["segundo_apellido"],$resultado["direccion"],$resultado["telefono"],
							$resultado["email"],$resultado["departamento_id"],$resultado["municipio_id"],
							$resultado["enabled"], $resultado["createAt"]
						);

				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

			return $persona;

		}

		static public function existePersona($id_tipo_doc, $identificacion) {

			$conexion = new Conexion("ficu");

			try {

				$pdo = $conexion->conectar();

				$sql = "SELECT `id`, `id_tipo_doc`, `identificacion`, `primer_nombre` ,`segundo_nombre`, `primer_apellido`, `segundo_apellido`, `direccion`, `telefono`,`email`, `departamento_id`, `municipio_id`, `enabled`, `createAt`
						FROM `persona`
						WHERE 1=1
						AND `id_tipo_doc`=:id_tipo_doc
						AND `identificacion`=:identificacion";

				$stmt = $pdo->prepare($sql);

				$stmt -> bindValue(":id_tipo_doc", $id_tipo_doc);

				$stmt -> bindValue(":identificacion", $identificacion);

				$stmt -> execute();

				$count = $stmt -> rowCount();

				//echo $count;

				if($count > 0) {

					$resultado = $stmt -> fetch(PDO::FETCH_ASSOC);

					//var_dump($resultado);

					$persona = new Persona();

					$persona->__construct2($resultado["id"],$resultado["id_tipo_doc"],$resultado["identificacion"],
								$resultado["primer_nombre"],$resultado["segundo_nombre"],$resultado["primer_apellido"],
								$resultado["segundo_apellido"],$resultado["direccion"],$resultado["telefono"],
								$resultado["email"],$resultado["departamento_id"],$resultado["municipio_id"],
								$resultado["enabled"], $resultado["createAt"]
							);

				} else {
					$persona = NULL;
				}

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			} finally {

				$stmt = null;

			}

			return $persona;

		}

		static public function updatePersona(Persona $persona) {

			$conexion = new Conexion("ficu");

			try {

				$pdo = $conexion->conectar();

				$sql = "UPDATE `persona`
						SET
						`primer_nombre`=:primer_nombre,
						`segundo_nombre`=:segundo_nombre,
						`primer_apellido`=:primer_apellido,
						`segundo_apellido`=:segundo_apellido,
						`direccion`=:direccion,
						`telefono`=:telefono,
						`departamento_id`=:departamento_id,
						`municipio_id`=:municipio_id,
						`telefono`=:telefono,
						`email`=:email,
						`enabled`=:enabled
						WHERE 1=1
						AND `id`=:id";

				$stmt = $pdo->prepare($sql);

				$stmt->bindValue(':id',$persona->getId());

				$stmt->bindValue(':primer_nombre',$persona->getPrimer_nombre());

				$stmt->bindValue(':segundo_nombre',$persona->getSegundo_nombre());

				$stmt->bindValue(':primer_apellido',$persona->getPrimer_apellido());

				$stmt->bindValue(':segundo_apellido',$persona->getSegundo_apellido());

				$stmt->bindValue(':direccion',$persona->getDireccion());

				$stmt->bindValue(':telefono',$persona->getTelefono());

				$stmt->bindValue(':email',$persona->getEmail());

				$stmt->bindValue(':departamento_id',$persona->getDepartamento_id());

				$stmt->bindValue(':municipio_id',$persona->getMunicipio_id());

				$stmt->bindValue(':enabled',$persona->getEnabled());

				$resultado = $stmt -> execute();

				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

			return $resultado;

		}

	}