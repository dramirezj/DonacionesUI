<?php

	namespace App\Entidades;

	class Departamento {

		private $id;
		private $nombre;
		private $createAt;

		public function __construct() { }

		public function __construct0($id, $nombre) {

			$this->id=$id;
			$this->nombre=$nombre;

		}

		public function __construct1($id, $nombre, $createAt) {

			$this->id=$id;
			$this->nombre=$nombre;
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
		
		public function setCreateAt($createAt) {
			$this->createAt = $createAt;
		}

	}