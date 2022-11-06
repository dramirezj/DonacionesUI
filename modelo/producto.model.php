<?php

	namespace App\ProductoModel;

	use App\Modelo\Conexion;
	use \PDO;

	class ProductoModel {

		static public function addProducto($codigo,$name,$description,$id_categoria) {

			$conexion = new Conexion("ficu");

			try {

				$pdo = $conexion->conectar();

				$sql = "INSERT INTO `producto` (`codigo`,`name`,`description`,`category_id`)
						VALUES (:codigo,:name,:description,:id_categoria)";

				$stmt = $pdo->prepare($sql);

				$stmt->bindParam(':codigo',$codigo);

				$stmt->bindParam(':name',$name);

				$stmt->bindParam(':description',$description);
				
				$stmt->bindParam(':id_categoria',$id_categoria);

				$resultado = $stmt -> execute();

				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

			return $resultado;

		}

		static public function getProductos() {

			$conexion = new Conexion("ficu");

			try {

				$pdo = $conexion->conectar();

				$sql = "SELECT `producto`.`id`, `producto`.`name`, `producto`.`description`, `categoria`.`name` `category_name`, `producto`.`enabled`
						FROM `producto`
						INNER JOIN `categoria`
						ON `categoria`.`id`=`producto`.`category_id`
						WHERE `producto`.`enabled`=1";

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

		static public function obtenerTodosProductos() {

			$conexion = new Conexion("ficu");

			try {

				$pdo = $conexion->conectar();

				$sql = "SELECT `producto`.`id`, `producto`.`name`
						FROM `producto`
						WHERE `producto`.`enabled`=1";

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

	}