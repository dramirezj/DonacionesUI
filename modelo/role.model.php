<?php

	use App\Modelo\Conexion;
	//use \PDO;

	class RoleModel {

		static public function getRoles() {

			$conexion = new Conexion("sacspr_users_db");

			try {


				$sql = "SELECT id, name FROM role WHERE 1=1 and id in (1,2,3) and enabled=1";

				$stmt = $conexion->conectar()->prepare($sql);

				$stmt -> execute();

				$resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);

				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

			return $resultado;

		}

		static public function getRoles1() {

			$conexion = new Conexion("sacspr_users_db");

			try {


				$sql = "SELECT id, name FROM role WHERE 1=1 and id in (2,3) and enabled=1";

				$stmt = $conexion->conectar()->prepare($sql);

				$stmt -> execute();

				$resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);

				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

			return $resultado;

		}

	}