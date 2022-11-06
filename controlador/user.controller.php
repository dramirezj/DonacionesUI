<?php

	namespace App\Controlador;

	use App\Modelo\UserModel;

	class UserController {

		public function newUser($email,$password,$firstname,$lastname,$role_id,$enabled) {

			return (UserModel::newUser($email,$password,$firstname,$lastname,$role_id,$enabled));

		}

		public function listarUsuarios($start,$limit) {

			return (UserModel::listarUsuarios($start,$limit));

		}

		public function listarTodosUsuarios($start,$limit) {

			return (UserModel::listarTodosUsuarios($start,$limit));

		}

		public function getTotalRecords() {

			return (UserModel::getTotalRecords());

		}

		public function getTotalRegistros() {

			return (UserModel::getTotalRegistros());

		}

		public function updateUser($id, $email, $firstname, $lastname, $enterprise_id, $department_id, $extension, $enabled, $locked, $online, $change) {

			return (UserModel::updateUser($id, $email, $firstname, $lastname, $enterprise_id, $department_id, $extension, $enabled, $locked, $online, $change));

		}

		public function updateUser1($id, $email, $password, $firstname, $lastname, $enterprise_id, $department_id, $extension, $enabled, $locked, $online, $change) {

			return (UserModel::updateUser1($id, $email, $password, $firstname, $lastname, $enterprise_id, $department_id, $extension, $enabled, $locked, $online, $change));

		}

		public function deleteUser($id, $enterprise_id) {

			return (UserModel::deleteUser($id, $enterprise_id));

		}

		public function findById($id, $enterprise_id) {

			return (UserModel::findById($id, $enterprise_id));

		}

		public function findByEmail($email) {

			return (UserModel::findByEmail($email));

		}

		public function passwordChange($id, $password, $enterprise_id) {

			return (UserModel::passwordChange($id, $password, $enterprise_id));

		}

		public function comprobar($email, $enterprise_id) {

			return (UserModel::comprobar($email, $enterprise_id));

		}

		public function LoginHistory($enterprise_id) {

			return (UserModel::LoginHistory($enterprise_id));

		}

		public function LoginHistoryAll() {

			return (UserModel::LoginHistoryAll());

		}

	}