<?php

	namespace App\Modelo;

	use App\Modelo\Conexion;
	use \PDO;

	class EntradaModel {

		static public function addEntrada($factura,$fecha,$id_donante,$id_producto,$descripcion,$cantidad) {

			$conexion = new Conexion("ficu");

			try {

				$pdo = $conexion->conectar();

				$sql = "INSERT INTO `entrada` (`factura`,`fecha`,`id_donante`,`id_producto`,`descripcion`,`cantidad`)
						VALUES (:factura,:fecha,:id_donante,:id_producto,:descripcion,:cantidad)";

				$stmt = $pdo->prepare($sql);

				$stmt->bindParam(':factura',$factura);

				$stmt->bindParam(':fecha',$fecha);

				$stmt->bindParam(':id_donante',$id_donante);
				
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

		static public function obteberTodasEntradas() {

			$conexion = new Conexion("ficu");

			try {

				$pdo = $conexion->conectar();

				$sql = "SELECT `entrada`.`id`, `factura`,`fecha`, concat(`primer_nombre`, ' ' ,`segundo_nombre`, ' ',`primer_apellido`, ' ',
								`segundo_apellido`) `nombre_donante`, `producto`.`name` `nombre_producto`,`descripcion`,`cantidad`
				FROM `entrada`
				INNER JOIN `producto` ON `entrada`.`id_producto`= `producto`.`id`
				INNER JOIN `donante` ON `entrada`.`id_donante`=`donante`.`id`";

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