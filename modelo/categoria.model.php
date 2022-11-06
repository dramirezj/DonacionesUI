<?php

	namespace App\Modelo;

	use App\Modelo\Conexion;
	use App\Modelo\UUIDModel;
	use App\Entidades\Categoria;
	use \PDO;

	class CategoriaModel {

		static public function getCategorias() {

			$conexion = new Conexion("ficu");

			try {

				$pdo = $conexion->conectar();

				$sql = "SELECT `id`, `name`
						FROM `categoria`
						WHERE 1=1
						AND `enabled`=1";

				$stmt = $pdo->prepare($sql);

				$stmt -> execute();

				$resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);

				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

			return $resultado;

		}

		static public function guardarCategoria(Categoria $categoria) {

			$conexion = new Conexion("ficu");

			try {

				$id = UUIDModel::v4();

				$pdo = $conexion->conectar();

				$sql = "INSERT INTO `categoria` (`id`, `name`, `description`)
						VALUES (:id,:name,:description)";

				$stmt = $pdo->prepare($sql);

				$stmt -> bindParam(':id',$categoria->id);

				$stmt -> bindParam(':name',$categoria->name);

				$stmt -> bindParam(':description',$categoria->description);

				$resultado = $stmt -> execute();

				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

			return $resultado;

		}

	}