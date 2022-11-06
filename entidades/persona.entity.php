<?php

	namespace App\Entidades;

	class Persona {

		private $id;
		private $id_tipo_doc;
		private $identificacion;
		private $primer_nombre;
		private $segundo_nombre;
		private $primer_apellido;
		private $segundo_apellido;
		private $direccion;
		private $telefono;
		private $email;
		private $departamento_id;
		private $municipio_id;
		private $enabled;
		private $createAt;

		public function __construct() { }

		public function __construct0($id_tipo_doc, $identificacion, $primer_nombre, $segundo_nombre, $primer_apellido,
				$segundo_apellido, $direccion, $telefono, $email, $departamento_id, $municipio_id) {

			$this->id_tipo_doc=$id_tipo_doc;
			$this->identificacion=$identificacion;
			$this->primer_nombre=$primer_nombre;
			$this->segundo_nombre=$segundo_nombre;
			$this->primer_apellido=$primer_apellido;
			$this->segundo_apellido=$segundo_apellido;
			$this->direccion=$direccion;
			$this->telefono=$telefono;
			$this->email=$email;
			$this->departamento_id=$departamento_id;
			$this->municipio_id=$municipio_id;

		}

		public function __construct1($id, $id_tipo_doc, $identificacion, $primer_nombre, $segundo_nombre, $primer_apellido,
				$segundo_apellido, $direccion, $telefono, $email, $departamento_id, $municipio_id, $enabled) {

			$this->id=$id;
			$this->id_tipo_doc=$id_tipo_doc;
			$this->identificacion=$identificacion;
			$this->primer_nombre=$primer_nombre;
			$this->segundo_nombre=$segundo_nombre;
			$this->primer_apellido=$primer_apellido;
			$this->segundo_apellido=$segundo_apellido;
			$this->direccion=$direccion;
			$this->telefono=$telefono;
			$this->email=$email;
			$this->departamento_id=$departamento_id;
			$this->municipio_id=$municipio_id;
			$this->enabled=$enabled;

		}

		public function __construct2($id, $id_tipo_doc, $identificacion, $primer_nombre, $segundo_nombre, $primer_apellido,
				$segundo_apellido, $direccion, $telefono, $email, $departamento_id, $municipio_id, $enabled, $createAt) {

			$this->id=$id;
			$this->id_tipo_doc=$id_tipo_doc;
			$this->identificacion=$identificacion;
			$this->primer_nombre=$primer_nombre;
			$this->segundo_nombre=$segundo_nombre;
			$this->primer_apellido=$primer_apellido;
			$this->segundo_apellido=$segundo_apellido;
			$this->direccion=$direccion;
			$this->telefono=$telefono;
			$this->email=$email;
			$this->departamento_id=$departamento_id;
			$this->municipio_id=$municipio_id;
			$this->enabled=$enabled;
			$this->createAt=$createAt;

		}

		public function getId() {
			return $this->id;
		}
		
		public function setId($id) {
			$this->id = $id;
		}

		public function getId_tipo_doc() {
			return $this->id_tipo_doc;
		}
		
		public function setId_tipo_doc($id_tipo_doc) {
			$this->id_tipo_doc = $id_tipo_doc;
		}
			
		public function getIdentificacion() {
			return $this->identificacion;
		}
		
		public function setIdentificacion($identificacion) {
			$this->identificacion = $identificacion;
		}
	
		public function getPrimer_nombre() {
			return $this->primer_nombre;
		}
		
		public function setPrimer_nombre($primer_nombre) {
			$this->primer_nombre = $primer_nombre;
		}

		public function getSegundo_nombre() {
			return $this->segundo_nombre;
		}
		
		public function setSegundo_nombre($segundo_nombre) {
			$this->segundo_nombre = $segundo_nombre;
		}

		public function getPrimer_apellido() {
			return $this->primer_apellido;
		}
					
		public function setPrimer_apellido($primer_apellido) {
			$this->primer_apellido = $primer_apellido;
		}

		public function getSegundo_apellido() {
			return $this->segundo_apellido;
		}
		
		public function setSegundo_apellido($segundo_apellido) {
			$this->segundo_apellido = $segundo_apellido;
		}
		
		public function getDireccion() {
			return $this->direccion;
		}
		
		public function setDireccion($direccion) {
			$this->direccion = $direccion;
		}

		public function getTelefono() {
			return $this->telefono;
		}
		
		public function setTelefono($telefono) {
			$this->telefono = $telefono;
		}

		public function getEmail() {
			return $this->email;
		}
		
		public function setEmail($email) {
			$this->email = $email;
		}
		
		public function getDepartamento_id() {
			return $this->departamento_id;
		}
		
		public function setDepartamento_id($departamento_id) {
			$this->departamento_id = $departamento_id;
		}

		public function getMunicipio_id() {
			return $this->municipio_id;
		}
		
		public function setMunicipio_id($municipio_id) {
			$this->municipio_id = $municipio_id;
		}

		public function getCreateAt() {
			return $this->createAt;
		}
		
		public function setCreateAt($createAt) {
			$this->createAt = $createAt;
		}

		public function getEnabled() {
			return $this->enabled;
		}
		
		public function setEnabled($enabled) {
			$this->enabled = $enabled;
		}

	}