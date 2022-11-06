<?php

	namespace App\Modelo;

	use App\Modelo\Conexion;
	use \PDO;

	class UserModel {

		static public function newUser($email,$password,$firstname,$lastname,$role_id,$enabled) {

			$conexion = new Conexion("ficu");

			try {

				$pdo = $conexion->conectar();

				$sql = "INSERT INTO `user`(`email`,`password`,`firstname`,`lastname`,`enabled`)
						VALUES (:email,:password,:firstname,:lastname,:enabled)";

				$stmt = $pdo->prepare($sql);

				$stmt->bindParam(':email',$email);

				$stmt->bindParam(':password',$password);
				
				$stmt->bindParam(':firstname',$firstname);
				
				$stmt->bindParam(':lastname',$lastname);
				
				$stmt->bindParam(':enabled',$enabled);

				$stmt -> execute();

				$user_id = $stmt -> fetch(PDO::FETCH_ASSOC);

				$user_id = $user_id["USER_ID"];
				
				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

			return $user_id;

		}

		static public function listarUsuarios($start,$limit) {

			$conexion = new Conexion("ficu");

			try {

				$pdo = $conexion->conectar();

				$sql = "SELECT `user`.`id`, `user`.`email`, `user`.`firstname`, `user`.`lastname`, `role`.`name` `role_name`, `user`.`enabled`, `user`.`account_locked`, `user`.`online`
						FROM `user`
						LEFT JOIN `user_role`
						ON `user_role`.`user_id`=`user`.`id`
						LEFT JOIN `role`
						ON `role`.`id`=`user_role`.`role_id`
						WHERE 1=1
						AND `user`.`enabled`=1
						ORDER BY `user`.`id`
						LIMIT $start,$limit";

				//echo $sql;

				$stmt = $pdo->prepare($sql);

				$stmt -> execute();

				$resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);

				return $resultado;
				
				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

		}

		static public function listarTodosUsuarios($start,$limit) {

			$conexion = new Conexion("ficu");

			try {

				$sql = "SELECT user.id, email, firstname, lastname, role.name role_name, user.enabled, account_locked, online
						FROM user
						LEFT JOIN user_role
						ON user_role.user_id=user.id
						LEFT JOIN role
						ON role.id=user_role.role_id
						WHERE 1=1
						ORDER BY user.id ASC
						LIMIT $start,$limit";

				//echo $sql;

				$stmt = $conexion->conectar()->prepare($sql);

				$stmt -> execute();

				$resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);

				return $resultado;
				
				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

		}

		static public function getTotalRecords() {

			$conexion = new Conexion("ficu");

			try {

				$sql = "SELECT * FROM user";

				$stmt = $conexion->conectar()->prepare($sql);

				$stmt -> execute();

				$resultado = $stmt -> rowCount();

				return $resultado;
				
				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

		}

		static public function getTotalRegistros() {

			$conexion = new Conexion("ficu");

			try {

				$sql = "SELECT * FROM user";

				$stmt = $conexion->conectar()->prepare($sql);

				$stmt -> execute();

				$resultado = $stmt -> rowCount();

				return $resultado;
				
				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

		}

		static public function updateUser($id, $email, $firstname, $lastname, $enabled, $locked, $online) {

			$conexion = new Conexion("ficu");

			try {

				$pdo = $conexion->conectar();

				$sql = "UPDATE 	`user`
						SET 	`email`=:email,
								`firstname`=:firstname,
								`lastname`=:lastname,
								`extension`=:extension,
								`enabled`=:enabled,
								`account_locked`=:locked,
								`online`=:online,
								`modifiedAt`=current_timestamp()
						WHERE 	`id`=:id";

				$stmt = $pdo->prepare($sql);

				$respuesta = $stmt -> execute();
				
				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

			return $respuesta;
			
		}

		static public function updateUser1($id, $email, $password, $firstname, $lastname, $enterprise_id, $department_id, $extension, $enabled, $locked, $online, $change) {

			$conexion = new Conexion("ficu");

			try {

				$pdo = $conexion->conectar();

				$sql = "UPDATE 	user
						SET 	email='$email',
								password='$password',
								firstname='$firstname',
								lastname='$lastname',
								enterprise_id=$enterprise_id,
								departments_id='$department_id',
								extension=$extension,
								enabled=$enabled,
								account_locked=$locked,
								online=$online,
								password_change_required=$change,
								modifiedAt=current_timestamp()
						WHERE 	id=$id
						AND     enterprise_id=$enterprise_id";

				$stmt = $pdo->prepare($sql);

				$respuesta = $stmt -> execute();
				
				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

			return $respuesta;
			
		}

		static public function deleteUser($id, $enterprise_id) {

			$conexion = new Conexion("ficu");

			try {

				$pdo = $conexion->conectar();

				$sql = "UPDATE 	user
						SET 	enabled=2,
								modifiedAt=current_timestamp()
						WHERE 	id=$id
						AND     enterprise_id=$enterprise_id";

				$stmt = $pdo->prepare($sql);

				$respuesta = $stmt -> execute();
				
				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

			return $respuesta;
			
		}

		static public function findById($id, $enterprise_id) {

			$conexion = new Conexion("ficu");

			try {

				$sql = "SELECT user.id, email, password, firstname, lastname, photo, user.enterprise_id, user.departments_id, extension, role_id, user.enabled, user.account_locked, password_change_required, online
						FROM user
						INNER JOIN user_role
						ON user_role.user_id=user.id
						WHERE 1=1
						AND user.id=$id
						AND user.enterprise_id=$enterprise_id";

				//echo $sql;

				$stmt = $conexion->conectar()->prepare($sql);

				$stmt -> execute();

				$resultado = $stmt -> fetch(PDO::FETCH_ASSOC);

				return $resultado;
				
				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

		}

		static public function findByEmail($email) {

			$conexion = new Conexion("ficu");

			try {

				$sql = "SELECT email
						FROM user
						WHERE 1=1
						AND user.email='$email'";

				//echo $sql;

				$stmt = $conexion->conectar()->prepare($sql);

				$stmt -> execute();

				$resultado = $stmt -> fetch(PDO::FETCH_ASSOC);

				return $resultado;
				
				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}
				
		}

		static public function passwordChange($id, $password, $enterprise_id) {

			$conexion = new Conexion("ficu");

			try {

				$pdo = $conexion->conectar();

				$sql = "UPDATE 	user
						SET 	password='$password',
								password_change_required=0,
								modifiedAt=current_timestamp()
						WHERE 	id=$id
						AND 	enterprise_id=$enterprise_id";

				//echo $sql;

				$stmt = $pdo->prepare($sql);

				$respuesta = $stmt -> execute();
				
				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

			return $respuesta;

		}

		static public function comprobar($email, $enterprise_id) {

			$conexion = new Conexion("ficu");

			try {

				$sql = "SELECT email
						FROM `user`
						WHERE `enterprise_id`=$enterprise_id
						AND `email`='$email'";

				//echo $sql;

				$stmt = $conexion->conectar()->prepare($sql);

				$stmt -> execute();

				$resultado = $stmt -> fetch(PDO::FETCH_ASSOC);

				return $resultado;
				
				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

		}

		static public function LoginHistoryAll() {

			$conexion = new Conexion("ficu");

  			try {

  				$sQuery = "select cantidad, `enterprise_name`
							from (
									select COALESCE(COUNT(`user_login_history`.`id`),0) cantidad, `enterprise`.`razon_social` `enterprise_name`
									from `user_login_history`
									inner join `enterprise`
									ON `enterprise`.`id`=`user_login_history`.`enterprise_id`
									where date_format(`login_date`, '%m')=1 and `login_type`=1
									group by `enterprise`.`razon_social`
									union all
									select COALESCE(COUNT(`user_login_history`.`id`),0) cantidad, `enterprise`.`razon_social` `enterprise_name`
									from `user_login_history`
									inner join `enterprise`
									ON `enterprise`.`id`=`user_login_history`.`enterprise_id`
									where date_format(`login_date`, '%m')=2 and `login_type`=1
									group by `enterprise`.`razon_social`
									union all
									select COALESCE(COUNT(`user_login_history`.`id`),0) cantidad, `enterprise`.`razon_social` `enterprise_name`
									from `user_login_history`
									inner join `enterprise`
									ON `enterprise`.`id`=`user_login_history`.`enterprise_id`
									where date_format(`login_date`, '%m')=3 and `login_type`=1
									group by `enterprise`.`razon_social`
									union all
									select COALESCE(COUNT(`user_login_history`.`id`),0) cantidad, `enterprise`.`razon_social` `enterprise_name`
									from `user_login_history`
									inner join `enterprise`
									ON `enterprise`.`id`=`user_login_history`.`enterprise_id`
									where date_format(`login_date`, '%m')=4 and `login_type`=1
									group by `enterprise`.`razon_social`
									union all
									select COALESCE(COUNT(`user_login_history`.`id`),0) cantidad, `enterprise`.`razon_social` `enterprise_name`
									from `user_login_history`inner join `enterprise`
									ON `enterprise`.`id`=`user_login_history`.`enterprise_id`
									where date_format(`login_date`, '%m')=5 and `login_type`=1
									group by `enterprise`.`razon_social`
									union all
									select COALESCE(COUNT(`user_login_history`.`id`),0) cantidad, `enterprise`.`razon_social` `enterprise_name`
									from `user_login_history`inner join `enterprise`
									ON `enterprise`.`id`=`user_login_history`.`enterprise_id`
									where date_format(`login_date`, '%m')=6 and `login_type`=1
									group by `enterprise`.`razon_social`
									union all
									select COALESCE(COUNT(`user_login_history`.`id`),0) cantidad, `enterprise`.`razon_social` `enterprise_name`
									from `user_login_history`inner join `enterprise`
									ON `enterprise`.`id`=`user_login_history`.`enterprise_id`
									where date_format(`login_date`, '%m')=7 and `login_type`=1
									group by `enterprise`.`razon_social`
									union all
									select COALESCE(COUNT(`user_login_history`.`id`),0) cantidad, `enterprise`.`razon_social` `enterprise_name`
									from `user_login_history`inner join `enterprise`
									ON `enterprise`.`id`=`user_login_history`.`enterprise_id`
									where date_format(`login_date`, '%m')=8 and `login_type`=1
									group by `enterprise`.`razon_social`
									union all
									select COALESCE(COUNT(`user_login_history`.`id`),0) cantidad, `enterprise`.`razon_social` `enterprise_name`
									from `user_login_history`inner join `enterprise`
									ON `enterprise`.`id`=`user_login_history`.`enterprise_id`
									where date_format(`login_date`, '%m')=9 and `login_type`=1
									group by `enterprise`.`razon_social`
									union all
									select COALESCE(COUNT(`user_login_history`.`id`),0) cantidad, `enterprise`.`razon_social` `enterprise_name`
									from `user_login_history`inner join `enterprise`
									ON `enterprise`.`id`=`user_login_history`.`enterprise_id`
									where date_format(`login_date`, '%m')=10 and `login_type`=1
									group by `enterprise`.`razon_social`
									union all
									select COALESCE(COUNT(`user_login_history`.`id`),0) cantidad, `enterprise`.`razon_social` `enterprise_name`
									from `user_login_history`inner join `enterprise`
									ON `enterprise`.`id`=`user_login_history`.`enterprise_id`
									where date_format(`login_date`, '%m')=11 and `login_type`=1
									group by `enterprise`.`razon_social`
									union all
									select COALESCE(COUNT(`user_login_history`.`id`),0) cantidad, `enterprise`.`razon_social` `enterprise_name`
									from `user_login_history`inner join `enterprise`
									ON `enterprise`.`id`=`user_login_history`.`enterprise_id`
									where date_format(`login_date`, '%m')=12 and `login_type`=1
									group by `enterprise`.`razon_social`
							) a;";

				//echo $sQuery;

  				$stmt = $conexion->conectar()->prepare($sQuery);

				$stmt -> execute();

				$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

			return $resultado;

		}

		static public function LoginHistory($enterprise_id) {

			$conexion = new Conexion("ficu");

  			try {

  				$sQuery = "select cantidad, `enterprise_name`
							from (
							    select COALESCE(COUNT(`user_login_history`.`id`),0) cantidad, `enterprise`.`razon_social` `enterprise_name`
							    from `user_login_history`
							    inner join `enterprise`
							    ON `enterprise`.`id`=`user_login_history`.`enterprise_id`
							    where  1=1
							    and `user_login_history`.`enterprise_id`=$enterprise_id
							    and date_format(`login_date`, '%m')=1 and `login_type`=1
 								union all
							    select COALESCE(COUNT(`user_login_history`.`id`),0) cantidad, `enterprise`.`razon_social` `enterprise_name`
							    from `user_login_history`
							    inner join `enterprise`
							    ON `enterprise`.`id`=`user_login_history`.`enterprise_id`
							    where  1=1
							    and `user_login_history`.`enterprise_id`=$enterprise_id
							    and date_format(`login_date`, '%m')=2 and `login_type`=1
 								union all
							    select COALESCE(COUNT(`user_login_history`.`id`),0) cantidad, `enterprise`.`razon_social` `enterprise_name`
							    from `user_login_history`
							    inner join `enterprise`
							    ON `enterprise`.`id`=`user_login_history`.`enterprise_id`
							    where  1=1
							    and `user_login_history`.`enterprise_id`=$enterprise_id
							    and date_format(`login_date`, '%m')=3 and `login_type`=1
 								union all
							    select COALESCE(COUNT(`user_login_history`.`id`),0) cantidad, `enterprise`.`razon_social` `enterprise_name`
							    from `user_login_history`
							    inner join `enterprise`
							    ON `enterprise`.`id`=`user_login_history`.`enterprise_id`
							    where  1=1
							    and `user_login_history`.`enterprise_id`=$enterprise_id
							    and date_format(`login_date`, '%m')=4 and `login_type`=1
 								union all
							    select COALESCE(COUNT(`user_login_history`.`id`),0) cantidad, `enterprise`.`razon_social` `enterprise_name`
							    from `user_login_history`inner join `enterprise`
							    ON `enterprise`.`id`=`user_login_history`.`enterprise_id`
							    where  1=1
							    and `user_login_history`.`enterprise_id`=$enterprise_id
							    and date_format(`login_date`, '%m')=5 and `login_type`=1
 								union all
							    select COALESCE(COUNT(`user_login_history`.`id`),0) cantidad, `enterprise`.`razon_social` `enterprise_name`
							    from `user_login_history`inner join `enterprise`
							    ON `enterprise`.`id`=`user_login_history`.`enterprise_id`
							    where  1=1
							    and `user_login_history`.`enterprise_id`=$enterprise_id
							    and date_format(`login_date`, '%m')=6 and `login_type`=1
 								union all
							    select COALESCE(COUNT(`user_login_history`.`id`),0) cantidad, `enterprise`.`razon_social` `enterprise_name`
							    from `user_login_history`inner join `enterprise`
							    ON `enterprise`.`id`=`user_login_history`.`enterprise_id`
							    where  1=1
							    and `user_login_history`.`enterprise_id`=$enterprise_id
							    and date_format(`login_date`, '%m')=7 and `login_type`=1
 								union all
							    select COALESCE(COUNT(`user_login_history`.`id`),0) cantidad, `enterprise`.`razon_social` `enterprise_name`
							    from `user_login_history`inner join `enterprise`
							    ON `enterprise`.`id`=`user_login_history`.`enterprise_id`
							    where  1=1
							    and `user_login_history`.`enterprise_id`=$enterprise_id
							    and date_format(`login_date`, '%m')=8 and `login_type`=1
 								union all
							    select COALESCE(COUNT(`user_login_history`.`id`),0) cantidad, `enterprise`.`razon_social` `enterprise_name`
							    from `user_login_history`inner join `enterprise`
							    ON `enterprise`.`id`=`user_login_history`.`enterprise_id`
							    where  1=1
							    and `user_login_history`.`enterprise_id`=$enterprise_id
							    and date_format(`login_date`, '%m')=9 and `login_type`=1
								union all
							    select COALESCE(COUNT(`user_login_history`.`id`),0) cantidad, `enterprise`.`razon_social` `enterprise_name`
							    from `user_login_history`inner join `enterprise`
							    ON `enterprise`.`id`=`user_login_history`.`enterprise_id`
							    where 1=1
							    and `user_login_history`.`enterprise_id`=$enterprise_id
							    and date_format(`login_date`, '%m')=10 and `login_type`=1
 								union all
							    select COALESCE(COUNT(`user_login_history`.`id`),0) cantidad, `enterprise`.`razon_social` `enterprise_name`
							    from `user_login_history`inner join `enterprise`
							    ON `enterprise`.`id`=`user_login_history`.`enterprise_id`
							    where 1=1
							    and `user_login_history`.`enterprise_id`=$enterprise_id
							    and date_format(`login_date`, '%m')=11 and `login_type`=1
 								union all
							    select COALESCE(COUNT(`user_login_history`.`id`),0) cantidad, `enterprise`.`razon_social` `enterprise_name`
							    from `user_login_history`inner join `enterprise`
							    ON `enterprise`.`id`=`user_login_history`.`enterprise_id`
							    where 1=1
							    and `user_login_history`.`enterprise_id`=$enterprise_id
							    and date_format(`login_date`, '%m')=12 and `login_type`=1
							) a;";

				//echo $sQuery;

  				$stmt = $conexion->conectar()->prepare($sQuery);

				$stmt -> execute();

				$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

				$stmt = null;

			} catch(Exception $e) {

				print "¡ERROR!: ".$e -> getMessage();
				die("<script>window.location='error-page'</script>");

			}

			return $resultado;

		}

	}