<?php

	namespace App\Modelo;

	use App\Entidades\Departamento;
	use App\Modelo\Conexion;
	use \PDO;

	class DepartamentoModel {

		static public function getDepartamentos() {

			$conexion = new Conexion("ficu");

			try {

				$pdo = $conexion->conectar();

				$sql = "SELECT `id`, `nombre_departamento`
						FROM `departamento`
						WHERE 1=1";

				$stmt = $pdo->prepare($sql);

				$stmt -> execute();

				$resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);

				$departamentos = array();

				foreach ($resultado as $key => $value) {
					
					$departamento = new Departamento();
					$departamento->__construct0($value["id"], $value["nombre_departamento"]);
					array_push($departamentos, $departamento);

				}

				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

			return $departamentos;

		}

		static public function getDepartamento($id) {

			$conexion = new Conexion("ficu");

			try {

				$pdo = $conexion->conectar();

				$sql = "SELECT `id`, `nombre_departamento`
						FROM `departamento`
						WHERE 1=1
						AND `id`=:id";

				$stmt = $pdo->prepare($sql);

				$stmt -> bindValue(":id", $id);

				$stmt -> execute();

				$resultado = $stmt -> fetch(PDO::FETCH_ASSOC);

				$departamento = new Departamento();
				$departamento->__construct0($resultado["id"], $resultado["nombre_departamento"]);

				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

			return $departamento;

		}

	}

