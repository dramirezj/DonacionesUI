<?php

	namespace App\Modelo;

	use App\Entidades\Municipio;
	use App\Entidades\Departamento;
	use App\Modelo\Conexion;
	use \PDO;

	class MunicipioModel {

		static public function getMunicipios() {

			$conexion = new Conexion("ficu");

			try {

				$pdo = $conexion->conectar();

				$sql = "SELECT `id`, `nombre_municipio`, `departamento_id`
						FROM `municipio`
						WHERE 1=1";

				$stmt = $pdo->prepare($sql);

				$stmt -> execute();

				$resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);

				$municipios = array();

				foreach ($resultado as $key => $value) {
					
					$municipio = new Municipio();
					$municipio->__construct0($value["id"], $value["nombre_municipio"], $value["departamento_id"]);
					array_push($municipios, $municipio);

				}

				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

			return $municipios;

		}

		static public function getMunicipiosPorDepto(Departamento $departamento) {

			$conexion = new Conexion("ficu");

			try {

				$pdo = $conexion->conectar();

				$sql = "SELECT `id`, `nombre_municipio`, `departamento_id`
						FROM `municipio`
						WHERE 1=1
						AND `departamento_id`=:departamento_id";

				$stmt = $pdo->prepare($sql);

				$stmt -> bindValue(":departamento_id", $departamento->getId());

				$stmt -> execute();

				$resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);

				$municipios = array();

				foreach ($resultado as $key => $value) {
					
					$municipio = new Municipio();
					$municipio->__construct0($value["id"], $value["nombre_municipio"], $value["departamento_id"]);
					array_push($municipios, $municipio);

				}

				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

			return $municipios;

		}

		static public function getMunicipio($id, $departamento_id) {

			$conexion = new Conexion("ficu");

			try {

				$pdo = $conexion->conectar();

				$sql = "SELECT `id`, `nombre_municipio`, `departamento_id`
						FROM `municipio`
						WHERE 1=1
						AND `departamento_id`=:departamento_id
						AND `id`=:id";

				$stmt = $pdo->prepare($sql);

				$stmt -> bindValue(":departamento_id", $departamento_id);

				$stmt -> bindValue(":id", $id);

				$stmt -> execute();

				$resultado = $stmt -> fetch(PDO::FETCH_ASSOC);
					
				$municipio = new Municipio();
				$municipio->__construct0($resultado["id"], $resultado["nombre_municipio"], $resultado["departamento_id"]);

				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

			return $municipio;

		}

	}