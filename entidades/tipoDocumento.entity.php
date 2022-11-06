<?php

	namespace App\Entidades;

	class TipoDocumento {
	
		private $id;
		private $nombre;
		private $description;
		private $tipo_persona;
		private $enabled;
		private $createAt;

		public function __construct() { }

		public function __construct0($nombre, $description, $tipo_persona) {

			$this->nombre = $nombre;
			$this->description = $description;
			$this->tipo_persona = $tipo_persona;

		}

		public function __construct1($id, $nombre, $description, $tipo_persona, $enabled) {

			$this->id = $id;
			$this->nombre = $nombre;
			$this->description = $description;
			$this->tipo_persona = $tipo_persona;
			$this->enabled = $enabled;

		}

		public function __construct2($id, $nombre, $description, $tipo_persona, $enabled, $createAt) {

			$this->id = $id;
			$this->nombre = $nombre;
			$this->description = $description;
			$this->tipo_persona = $tipo_persona;
			$this->enabled = $enabled;
			$this->createAt = $createAt;

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

		public function getDescription() {
			return $this->description;
		}
		
		public function setDescription($description) {
			$this->description = $description;
		}

		public function getTipo_persona() {
			return $this->tipo_persona;
		}
		
		public function setTipo_persona($tipo_persona) {
			$this->tipo_persona = $tipo_persona;
		}

		public function getEnabled() {
			return $this->enabled;
		}
		
		public function setEnabled($enabled) {
			$this->enabled = $enabled;
		}

		public function getCreateAt() {
			return $this->createAt;
		}
		
		public function setCreateAt($createAt) {
			$this->createAt = $createAt;
		}

	}