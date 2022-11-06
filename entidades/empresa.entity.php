<?php

	namespace App\Entidades;

	class Empresa {

		private $id;
		private $id_tipo_doc_id;
		private $identificacion;
		private $razon_social;
		private $direccion;
		private $telefono;
		private $email;
		private $departamento_id;
		private $municipio_id;
		private $representante_id;
		private $tipo_persona;
		private $enabled;
		private $createAt;

		public function __construct() { }

		public function __construct0($id_tipo_doc,$identificacion,$razon_social,$direccion,$telefono,$email,$departamento_id,$municipio_id,$representante_id,$tipo_persona,$enabled) {

			$this->id_tipo_doc=$id_tipo_doc;
			$this->identificacion=$identificacion;
			$this->razon_social=$razon_social;
			$this->direccion=$direccion;
			$this->telefono=$telefono;
			$this->email=$email;
			$this->departamento_id=$departamento_id;
			$this->municipio_id=$municipio_id;
			$this->representante_id=$representante_id;
			$this->tipo_persona=$tipo_persona;
			$this->enabled=$enabled;

		}

		public function __construct1($id,$id_tipo_doc,$identificacion,$razon_social,$direccion,$telefono,$email,$departamento_id,$municipio_id,$representante_id,$tipo_persona,$enabled) {

			$this->id=$id;
			$this->id_tipo_doc=$id_tipo_doc;
			$this->identificacion=$identificacion;
			$this->razon_social=$razon_social;
			$this->direccion=$direccion;
			$this->telefono=$telefono;
			$this->email=$email;
			$this->departamento_id=$departamento_id;
			$this->municipio_id=$municipio_id;
			$this->representante_id=$representante_id;
			$this->tipo_persona=$tipo_persona;
			$this->enabled=$enabled;

		}

		public function __construct2($id,$id_tipo_doc,$identificacion,$razon_social,$direccion,$telefono,$email,$departamento_id,$municipio_id,$representante_id,$tipo_persona,$enabled,$createAt) {

			$this->id=$id;
			$this->id_tipo_doc=$id_tipo_doc;
			$this->identificacion=$identificacion;
			$this->razon_social=$razon_social;
			$this->direccion=$direccion;
			$this->telefono=$telefono;
			$this->email=$email;
			$this->departamento_id=$departamento_id;
			$this->municipio_id=$municipio_id;
			$this->representante_id=$representante_id;
			$this->tipo_persona=$tipo_persona;
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

		public function getRazon_social() {
			return $this->razon_social;
		}
		
		public function setRazon_social($razon_social) {
			$this->razon_social = $razon_social;
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

		public function getRepresentante_id() {
			return $this->representante_id;
		}
		
		public function setRepresentante_id($representante_id) {
			$this->representante_id = $representante_id;
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