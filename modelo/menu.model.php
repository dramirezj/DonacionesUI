<?php

	namespace App\Modelo;

	use App\Modelo\Conexion;
	use \PDO;

	class MenuModel {

		//funcion para traer los menus principales
		static public function findMenuByUser($email) {

			$conexion = new Conexion("ficu");

			try {

				$sql = "SELECT `m`.`id`, `m`.`name`, `m`.`url`, `m`.`icon`, `m`.`class`, `m`.`parent_id`
						FROM `user` `u`
						INNER JOIN `user_role` `ur` ON `ur`.`user_id`=`u`.`id`
						INNER JOIN `menu_role` `mr` ON `mr`.`role_id`=`ur`.`role_id`
						INNER JOIN `menu` `m` ON `m`.`id`=`mr`.`menu_id`
						WHERE 1=1
						AND `u`.`email`=:email
						AND `m`.`enabled`=1
						AND `u`.`enabled`=1
						AND `m`.`parent_id` IS NULL
						ORDER BY `m`.`order` ASC";

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

		//funcion para traer los submenus por id
		static public function findSubMenuById($id,$role_id) {

			$conexion = new Conexion("ficu");

			try {

				$sql = "SELECT `m`.`id`, `m`.`name`, `m`.`url`, `m`.`icon`, `m`.`class`, `m`.`parent_id`
						FROM `menu` `m`
						INNER JOIN `menu_role` `mr` ON `mr`.`menu_id`=`m`.`id`
						WHERE 1=1
						AND `m`.`enabled` = 1
						AND `m`.`parent_id`=:id
						AND `mr`.`role_id`=:role_id
						ORDER BY `m`.`order` ASC";

				$stmt = $conexion->conectar()->prepare($sql);

				$stmt->bindParam(':id', $id);
				
				$stmt->bindParam(':role_id', $role_id);

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