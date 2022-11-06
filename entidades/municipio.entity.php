<?php

	namespace App\Entidades;

	class Municipio {

		private $id;
		private $nombre;
		private $departmento_id;
		private $enabled;
		private $createAt;

				public function __construct() { }

		public function __construct0($id, $nombre, $departmento_id) {

			$this->id=$id;
			$this->nombre=$nombre;
			$this->departmento_id=$departmento_id;

		}

		public function __construct1($id, $nombre, $departmento_id, $enabled, $createAt) {

			$this->id=$id;
			$this->nombre=$nombre;
			$this->departmento_id=$departmento_id;
			$this->enabled=$enabled;
			$this->createAt=$createAt;

		}

		public function getId() {
			return $this->id;
		}
		
		public function setId($id) {
			$this->id = $id;
		}

		public function getNombre() {
			return $this->nombre;
		}
		
		public function setNombre($nombre) {
			$this->nombre = $nombre;
		}

		public function getCreateAt() {
			return $this->createAt;
		}

		public function getDepartmento_id() {
			return $this->departmento_id;
		}
		
		public function setDepartmento_id($departmento_id) {
			$this->departmento_id = $departmento_id;
		}

		public function getEnabled() {
			return $this->enabled;
		}
		
		public function setEnabled($enabled) {
			$this->enabled = $enabled;
		}
		
		public function setCreateAt($createAt) {
			$this->createAt = $createAt;
		}

	}