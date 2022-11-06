<?php

	include_once("conexion.php");

	class StatisticsModel {

		static public function guardarEstadisticas($enterprise_id, $app_id) {

			$conexion = new Conexion("sacspr_users_db");

			try {

				$pdo = $conexion->conectar();

				$sQuery = "INSERT INTO `estadistica_usabilidad_app`(`app_id`, `enterprise_id`, `clic`)
							VALUES (:app_id, :enterprise_id, 1)";

				$stmt = $pdo -> prepare($sQuery);

				$stmt -> bindParam(":app_id", $app_id);

				$stmt -> bindParam(":enterprise_id", $enterprise_id);

				$resultado = $stmt -> execute();

				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

			return $resultado;

		}
		
		static public function estadisiticasPorModulo($app_id) {

			$conexion = new Conexion("sacspr_users_db");

			try {

				$pdo = $conexion->conectar();

				$sQuery = "SELECT cantidad
							FROM (

									SELECT		COALESCE(COUNT(`clic`),0) cantidad
									FROM		`application`
									INNER JOIN	`estadistica_usabilidad_app`
									ON			`estadistica_usabilidad_app`.`app_id`=`application`.`id`
									WHERE		1=1
									AND			`application`.`id`=:app_id
									AND			date_format(`date`, '%m') = 1
									UNION ALL
									SELECT		COALESCE(COUNT(`clic`),0) cantidad
									FROM		`application`
									INNER JOIN	`estadistica_usabilidad_app`
									ON			`estadistica_usabilidad_app`.`app_id`=`application`.`id`
									WHERE		1=1
									AND			`application`.`id`=:app_id
									AND			date_format(`date`, '%m') = 2
									UNION ALL
									SELECT		COALESCE(COUNT(`clic`),0) cantidad
									FROM		`application`
									INNER JOIN	`estadistica_usabilidad_app`
									ON			`estadistica_usabilidad_app`.`app_id`=`application`.`id`
									WHERE		1=1
									AND			`application`.`id`=:app_id
									AND			date_format(`date`, '%m') = 3
									UNION ALL
									SELECT		COALESCE(COUNT(`clic`),0) cantidad
									FROM		`application`
									INNER JOIN	`estadistica_usabilidad_app`
									ON			`estadistica_usabilidad_app`.`app_id`=`application`.`id`
									WHERE		1=1
									AND			`application`.`id`=:app_id
									AND			date_format(`date`, '%m') = 4
									UNION ALL
									SELECT		COALESCE(COUNT(`clic`),0) cantidad
									FROM		`application`
									INNER JOIN	`estadistica_usabilidad_app`
									ON			`estadistica_usabilidad_app`.`app_id`=`application`.`id`
									WHERE		1=1
									AND			`application`.`id`=:app_id
									AND			date_format(`date`, '%m') = 5
									UNION ALL
									SELECT		COALESCE(COUNT(`clic`),0) cantidad
									FROM		`application`
									INNER JOIN	`estadistica_usabilidad_app`
									ON			`estadistica_usabilidad_app`.`app_id`=`application`.`id`
									WHERE		1=1
									AND			`application`.`id`=:app_id
									AND			date_format(`date`, '%m') = 6
									UNION ALL
									SELECT		COALESCE(COUNT(`clic`),0) cantidad
									FROM		`application`
									INNER JOIN	`estadistica_usabilidad_app`
									ON			`estadistica_usabilidad_app`.`app_id`=`application`.`id`
									WHERE		1=1
									AND			`application`.`id`=:app_id
									AND			date_format(`date`, '%m') = 7
									UNION ALL
									SELECT		COALESCE(COUNT(`clic`),0) cantidad
									FROM		`application`
									INNER JOIN	`estadistica_usabilidad_app`
									ON			`estadistica_usabilidad_app`.`app_id`=`application`.`id`
									WHERE		1=1
									AND			`application`.`id`=:app_id
									AND			date_format(`date`, '%m') = 8
									UNION ALL
									SELECT		COALESCE(COUNT(`clic`),0) cantidad
									FROM		`application`
									INNER JOIN	`estadistica_usabilidad_app`
									ON			`estadistica_usabilidad_app`.`app_id`=`application`.`id`
									WHERE		1=1
									AND			`application`.`id`=:app_id
									AND			date_format(`date`, '%m') = 9
									UNION ALL
									SELECT		COALESCE(COUNT(`clic`),0) cantidad
									FROM		`application`
									INNER JOIN	`estadistica_usabilidad_app`
									ON			`estadistica_usabilidad_app`.`app_id`=`application`.`id`
									WHERE		1=1
									AND			`application`.`id`=:app_id
									AND			date_format(`date`, '%m') = 10
									UNION ALL
									SELECT		COALESCE(COUNT(`clic`),0) cantidad
									FROM		`application`
									INNER JOIN	`estadistica_usabilidad_app`
									ON			`estadistica_usabilidad_app`.`app_id`=`application`.`id`
									WHERE		1=1
									AND			`application`.`id`=:app_id
									AND			date_format(`date`, '%m') = 11
									UNION ALL
									SELECT		COALESCE(COUNT(`clic`),0) cantidad
									FROM		`application`
									INNER JOIN	`estadistica_usabilidad_app`
									ON			`estadistica_usabilidad_app`.`app_id`=`application`.`id`
									WHERE		1=1
									AND			`application`.`id`=:app_id
									AND			date_format(`date`, '%m') = 12
							) A";


				$stmt = $pdo -> prepare($sQuery);

				$stmt -> bindParam(":app_id", $app_id);

				$stmt -> execute();

				$resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);

				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

			return $resultado;

		}

		static public function estadisiticasModuloxEmpresa($enterprise_id, $app_id) {

			$conexion = new Conexion("sacspr_users_db");

			try {

				$pdo = $conexion->conectar();

				$sQuery = "SELECT cantidad
							FROM (

									SELECT		COALESCE(COUNT(`clic`),0) cantidad
									FROM		`application`
									INNER JOIN	`estadistica_usabilidad_app`
									ON			`estadistica_usabilidad_app`.`app_id`=`application`.`id`
									INNER JOIN 	`app_enterprise`
									ON 			`app_enterprise`.`app_id`=`application`.`id`
									WHERE		1=1
									AND			`app_enterprise`.`enterprise_id`=:enterprise_id
									AND 		`application`.`id`=:app_id
									AND 		`app_enterprise`.`enabled`=1
									AND			date_format(`date`, '%m') = 1
									UNION ALL
									SELECT		COALESCE(COUNT(`clic`),0) cantidad
									FROM		`application`
									INNER JOIN	`estadistica_usabilidad_app`
									ON			`estadistica_usabilidad_app`.`app_id`=`application`.`id`
									INNER JOIN 	`app_enterprise`
									ON 			`app_enterprise`.`app_id`=`application`.`id`
									WHERE		1=1
									AND			`app_enterprise`.`enterprise_id`=:enterprise_id
									AND 		`application`.`id`=:app_id
									AND 		`app_enterprise`.`enabled`=1
									AND			date_format(`date`, '%m') = 2
									UNION ALL
									SELECT		COALESCE(COUNT(`clic`),0) cantidad
									FROM		`application`
									INNER JOIN	`estadistica_usabilidad_app`
									ON			`estadistica_usabilidad_app`.`app_id`=`application`.`id`
									INNER JOIN 	`app_enterprise`
									ON 			`app_enterprise`.`app_id`=`application`.`id`
									WHERE		1=1
									AND			`app_enterprise`.`enterprise_id`=:enterprise_id
									AND 		`application`.`id`=:app_id
									AND 		`app_enterprise`.`enabled`=1
									AND			date_format(`date`, '%m') = 3
									UNION ALL
									SELECT		COALESCE(COUNT(`clic`),0) cantidad
									FROM		`application`
									INNER JOIN	`estadistica_usabilidad_app`
									ON			`estadistica_usabilidad_app`.`app_id`=`application`.`id`
									INNER JOIN 	`app_enterprise`
									ON 			`app_enterprise`.`app_id`=`application`.`id`
									WHERE		1=1
									AND			`app_enterprise`.`enterprise_id`=:enterprise_id
									AND 		`application`.`id`=:app_id
									AND 		`app_enterprise`.`enabled`=1
									AND			date_format(`date`, '%m') = 4
									UNION ALL
									SELECT		COALESCE(COUNT(`clic`),0) cantidad
									FROM		`application`
									INNER JOIN	`estadistica_usabilidad_app`
									ON			`estadistica_usabilidad_app`.`app_id`=`application`.`id`
									INNER JOIN 	`app_enterprise`
									ON 			`app_enterprise`.`app_id`=`application`.`id`
									WHERE		1=1
									AND			`app_enterprise`.`enterprise_id`=:enterprise_id
									AND 		`application`.`id`=:app_id
									AND 		`app_enterprise`.`enabled`=1
									AND			date_format(`date`, '%m') = 5
									UNION ALL
									SELECT		COALESCE(COUNT(`clic`),0) cantidad
									FROM		`application`
									INNER JOIN	`estadistica_usabilidad_app`
									ON			`estadistica_usabilidad_app`.`app_id`=`application`.`id`
									INNER JOIN 	`app_enterprise`
									ON 			`app_enterprise`.`app_id`=`application`.`id`
									WHERE		1=1
									AND			`app_enterprise`.`enterprise_id`=:enterprise_id
									AND 		`application`.`id`=:app_id
									AND 		`app_enterprise`.`enabled`=1
									AND			date_format(`date`, '%m') = 6
									UNION ALL
									SELECT		COALESCE(COUNT(`clic`),0) cantidad
									FROM		`application`
									INNER JOIN	`estadistica_usabilidad_app`
									ON			`estadistica_usabilidad_app`.`app_id`=`application`.`id`
									INNER JOIN 	`app_enterprise`
									ON 			`app_enterprise`.`app_id`=`application`.`id`
									WHERE		1=1
									AND			`app_enterprise`.`enterprise_id`=:enterprise_id
									AND 		`application`.`id`=:app_id
									AND 		`app_enterprise`.`enabled`=1
									AND			date_format(`date`, '%m') = 7
									UNION ALL
									SELECT		COALESCE(COUNT(`clic`),0) cantidad
									FROM		`application`
									INNER JOIN	`estadistica_usabilidad_app`
									ON			`estadistica_usabilidad_app`.`app_id`=`application`.`id`
									INNER JOIN 	`app_enterprise`
									ON 			`app_enterprise`.`app_id`=`application`.`id`
									WHERE		1=1
									AND			`app_enterprise`.`enterprise_id`=:enterprise_id
									AND 		`application`.`id`=:app_id
									AND 		`app_enterprise`.`enabled`=1
									AND			date_format(`date`, '%m') = 8
									UNION ALL
									SELECT		COALESCE(COUNT(`clic`),0) cantidad
									FROM		`application`
									INNER JOIN	`estadistica_usabilidad_app`
									ON			`estadistica_usabilidad_app`.`app_id`=`application`.`id`
									INNER JOIN 	`app_enterprise`
									ON 			`app_enterprise`.`app_id`=`application`.`id`
									WHERE		1=1
									AND			`app_enterprise`.`enterprise_id`=:enterprise_id
									AND 		`application`.`id`=:app_id
									AND 		`app_enterprise`.`enabled`=1
									AND			date_format(`date`, '%m') = 9
									UNION ALL
									SELECT		COALESCE(COUNT(`clic`),0) cantidad
									FROM		`application`
									INNER JOIN	`estadistica_usabilidad_app`
									ON			`estadistica_usabilidad_app`.`app_id`=`application`.`id`
									INNER JOIN 	`app_enterprise`
									ON 			`app_enterprise`.`app_id`=`application`.`id`
									WHERE		1=1
									AND			`app_enterprise`.`enterprise_id`=:enterprise_id
									AND 		`application`.`id`=:app_id
									AND 		`app_enterprise`.`enabled`=1
									AND			date_format(`date`, '%m') = 10
									UNION ALL
									SELECT		COALESCE(COUNT(`clic`),0) cantidad
									FROM		`application`
									INNER JOIN	`estadistica_usabilidad_app`
									ON			`estadistica_usabilidad_app`.`app_id`=`application`.`id`
									INNER JOIN 	`app_enterprise`
									ON 			`app_enterprise`.`app_id`=`application`.`id`
									WHERE		1=1
									AND			`app_enterprise`.`enterprise_id`=:enterprise_id
									AND 		`application`.`id`=:app_id
									AND 		`app_enterprise`.`enabled`=1
									AND			date_format(`date`, '%m') = 11
									UNION ALL
									SELECT		COALESCE(COUNT(`clic`),0) cantidad
									FROM		`application`
									INNER JOIN	`estadistica_usabilidad_app`
									ON			`estadistica_usabilidad_app`.`app_id`=`application`.`id`
									INNER JOIN 	`app_enterprise`
									ON 			`app_enterprise`.`app_id`=`application`.`id`
									WHERE		1=1
									AND			`app_enterprise`.`enterprise_id`=:enterprise_id
									AND 		`application`.`id`=:app_id
									AND 		`app_enterprise`.`enabled`=1
									AND			date_format(`date`, '%m') = 12
							) A";


				$stmt = $pdo -> prepare($sQuery);

				$stmt -> bindParam(":enterprise_id", $enterprise_id);

				$stmt -> bindParam(":app_id", $app_id);

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