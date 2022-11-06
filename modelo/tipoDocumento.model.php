<?php

	namespace App\Modelo;

	use App\Modelo\Conexion;
	use \PDO;
	use App\Entidades\TipoDocumento;

	class TipoDocumentoModel {

		static public function obtenerTipoDocumento($tipo_documento_id) {

			$conexion = new Conexion("ficu");

			try {

				$pdo = $conexion->conectar();

				$sql = "SELECT `id`, `nombre`, `description`, `tipo_persona`, `enabled`, `createAt`
						FROM `tipo_documento`
						WHERE 1=1
						AND `enabled`=1
						AND `id`=:tipo_documento_id";

				$stmt = $pdo->prepare($sql);

				$stmt -> bindValue(":tipo_documento_id", $tipo_documento_id);

				$stmt -> execute();

				$resultado = $stmt -> fetch(PDO::FETCH_ASSOC);

				$tipo_documento = new TipoDocumento;
				$tipo_documento->__construct2($resultado["id"], $resultado["nombre"], $resultado["description"], $resultado["tipo_persona"], $resultado["enabled"], $resultado["createAt"]);

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			} finally {

				$stmt = null;

			}

			return $tipo_documento;

		}

	}