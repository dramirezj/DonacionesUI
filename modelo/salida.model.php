<?php

	class SalidaModel {

		static public function addSalida($factura,$fecha,$id_producto,$descripcion,$cantidad) {

			$conexion = new Conexion("ficu");

			try {

				$pdo = $conexion->conectar();

				$sql = "INSERT INTO `salida` (`factura`,`fecha`,`id_producto`,`descripcion`,`cantidad`)
						VALUES (:factura,:fecha,:id_producto,:descripcion,:cantidad)";

				$stmt = $pdo->prepare($sql);

				$stmt->bindParam(':factura',$factura);

				$stmt->bindParam(':fecha',$fecha);
				
				$stmt->bindParam(':id_producto',$id_producto);
				
				$stmt->bindParam(':descripcion',$descripcion);
				
				$stmt->bindParam(':cantidad',$cantidad);

				$resultado = $stmt -> execute();

				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

			return $resultado;

		}

		static public function getSalida() {

			$conexion = new Conexion("ficu");

			try {

				$pdo = $conexion->conectar();

				$sql = "SELECT `factura`,`fecha`,`id_producto`,`descripcion`,`cantidad` FROM `salida`";

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