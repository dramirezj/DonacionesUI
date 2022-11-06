<?php

	namespace App\Controlador;

	use App\Modelo\MenuModel;

	class MenuController {
		
		public function findMenuByUser($email) {

			$resultado = MenuModel::findMenuByUser($email);

			return $resultado;

		}

		public function findSubMenuById($id,$role_id) {

			$resultado = MenuModel::findSubMenuById($id,$role_id);

			return $resultado;

		}

	}