<?php

	namespace App\Modelo;

	//include_once("conexion.php");
	//require_once("uuid.php");


	use App\Modelo\Conexion;
	use App\Modelo\UUIDModel;
	use \PDO;

	use App\Entidades\DocumentoEmpresa;

	class DocumentoEmpresaModel {

		static public function saveDocumentoEmpresa(DocumentoEmpresa $documentoEmpresa) {

			$conexion = new Conexion("ficu");

			try {

				$id = UUIDModel::v4();

				$pdo = $conexion->conectar();

				$sQuery = "INSERT INTO `documento_empresa`(`id`, `empresa_id`, `tipo_documento_id`, `nombre_archivo`)
						   VALUES (:id, :empresa_id, :tipo_documento_id, :nombre_archivo)";

				$stmt = $pdo->prepare($sQuery);

				$stmt -> bindValue(":id", $id);

				$stmt -> bindValue(":empresa_id", $documentoEmpresa->getEmpresa_id());

				$stmt -> bindValue(":tipo_documento_id", $documentoEmpresa->getTipo_documento_id());

				$stmt -> bindValue(":nombre_archivo", $documentoEmpresa->getNombre_archivo());

				$resultado = $stmt->execute();

			} catch(Exception $e) {
			
				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			} finally {

				$stmt = null;

			}

			return $resultado;

		}

		static public function obtenerDocumentoEmpresa($empresa_id) {

			$conexion = new Conexion("ficu");

			try {

				$pdo = $conexion->conectar();

				$sQuery = "SELECT `id`, `empresa_id`, `tipo_documento_id`, `nombre_archivo`, `createAt`, `modifiedAt`
						   FROM `documento_empresa`
						   WHERE 1=1
						   AND `empresa_id`=:empresa_id";

				$stmt = $pdo->prepare($sQuery);

				$stmt -> bindValue(":empresa_id", $empresa_id);

				$stmt->execute();

				$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

				$documentosEmpresa = array();

				foreach ($resultado as $key => $value) {
					
					$documentoEmpresa = new DocumentoEmpresa();

					$documentoEmpresa->__construct2(
						$value["id"],$value["empresa_id"],$value["tipo_documento_id"],
						$value["nombre_archivo"],$value["createAt"],$value["modifiedAt"]
					);

					array_push($documentosEmpresa, $documentoEmpresa);					

				}

			} catch(Exception $e) {
			
				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			} finally {

				$stmt = null;

			}

			return $documentosEmpresa;

		}

		static public function actualizarDocumentoEmpresa(DocumentoEmpresa $documentoEmpresa) {

			$conexion = new Conexion("ficu");

			try {

				$pdo = $conexion->conectar();

				$sQuery = "UPDATE `documento_empresa`
						   SET `tipo_documento_id` = :tipo_documento_id,
						   	   `nombre_archivo` = :nombre_archivo,
						   	   `modifiedAt` = :modifiedAt
						   WHERE 1=1
						   AND `id` = :id";

				$stmt = $pdo->prepare($sQuery);

				$stmt -> bindValue(":id",$documentoEmpresa->getId());

				$stmt -> bindValue(":tipo_documento_id", $documentoEmpresa->getTipo_documento_id());

				$stmt -> bindValue(":nombre_archivo",$documentoEmpresa->getNombre_archivo());

				$stmt -> bindValue(":modifiedAt",$documentoEmpresa->getModifiedAt());

				$stmt->execute();

				$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

			} catch(Exception $e) {
			
				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			} finally {

				$stmt = null;

			}

			return $resultado;

		}

	}