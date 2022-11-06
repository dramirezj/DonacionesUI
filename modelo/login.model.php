<?php

	namespace App\Modelo;

	use App\Modelo\Conexion;
	use \PDO;

	class LoginModel {

		static public function findByEmail($email) {

			$conexion = new Conexion("ficu");

			try {

				$pdo = $conexion -> conectar();

				$sql = "SELECT `user`.*, `user_role`.`role_id`
						FROM `user`
						INNER JOIN `user_role`
						ON `user_role`.`user_id`=`user`.`id`
						WHERE 1=1
						AND `user`.`email` = :email";

				//echo $sql;

				$stmt = $pdo -> prepare($sql);

				$stmt -> bindParam(':email', $email);

				$stmt -> execute();

				$resultado = $stmt -> fetch(PDO::FETCH_ASSOC);

				return $resultado;
				
				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

		}

		static public function updateOnline($id,$enterprise_id,$ip_address) {

			$conexion = new Conexion("sacspr_users_db");

			try {


				$sql = "update user set online=1,ip_address='$ip_address', datetime_start_online=now() where id=$id and enterprise_id=$enterprise_id";

				$stmt = $conexion->conectar()->prepare($sql);

				$stmt -> execute();
				
				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

		}

		static public function updateOffline($id,$enterprise_id) {

			$conexion = new Conexion("sacspr_users_db");

			try {


				$sql = "update user set online=0, datetime_end_online=now() where id=$id and enterprise_id=$enterprise_id";

				$stmt = $conexion->conectar()->prepare($sql);

				$stmt -> execute();
				
				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

		}

		static public function updateAccountLocked($email) {

			$conexion = new Conexion("sacspr_users_db");

			try {


				$sql = "update user set account_locked=1 where email='$email'";

				$stmt = $conexion->conectar()->prepare($sql);

				$stmt -> execute();
				
				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

		}

		static public function findURLByUser($email) {

			$conexion = new Conexion("sacspr_users_db");

			try {

				$sql = "select m.url
						from user u
						inner join user_role ur on ur.user_id=u.id and ur.enterprise_id=u.enterprise_id
						inner join menu_role mr on mr.role_id=ur.role_id
						inner join menu m on m.id=mr.menu_id
						where u.email='".$email."'
						and m.enabled=1
						and u.enabled=1
						and u.account_locked=0
						and m.url is not null
						order by m.id asc";

				$stmt = $conexion->conectar()->prepare($sql);

				$stmt->bindParam(':email', $email, PDO::PARAM_STR);

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