<?php

	namespace App\Entidades;

	class DocumentoEmpresa {

		private $id;
		private $empresa_id;
		private $tipo_documento_id;
		private $nombre_archivo;
		private $createAt;
		private $modifiedAt;

		public function __construct() { }

		public function __construct0($empresa_id,$tipo_documento_id,$nombre_archivo) {

			$this->empresa_id = $empresa_id;
			$this->tipo_documento_id = $tipo_documento_id;
			$this->nombre_archivo = $nombre_archivo;

		}

		public function __construct1($id,$empresa_id,$tipo_documento_id,$nombre_archivo) {

			$this->id = $id;
			$this->empresa_id = $empresa_id;
			$this->tipo_documento_id = $tipo_documento_id;
			$this->nombre_archivo = $nombre_archivo;

		}

		public function __construct2($id,$empresa_id,$tipo_documento_id,$nombre_archivo,$createAt,$modifiedAt) {

			$this->id = $id;
			$this->empresa_id = $empresa_id;
			$this->tipo_documento_id = $tipo_documento_id;
			$this->nombre_archivo = $nombre_archivo;
			$this->createAt = $createAt;
			$this->modifiedAt = $modifiedAt;

		}

		public function getId() {
			return $this->id;
		}
		
		public function setId($id) {
			$this->id = $id;
		}

		public function getEmpresa_id() {
			return $this->empresa_id;
		}
		
		public function setEmpresa_id($empresa_id) {
			$this->empresa_id = $empresa_id;
		}
		
		public function getTipo_documento_id() {
			return $this->tipo_documento_id;
		}
		
		public function setTipo_documento_id($tipo_documento_id) {
			$this->tipo_documento_id = $tipo_documento_id;
		}
		
		public function getNombre_archivo() {
			return $this->nombre_archivo;
		}
		
		public function setNombre_archivo($nombre_archivo) {
			$this->nombre_archivo = $nombre_archivo;
		}

		public function getCreateAt() {
			return $this->createAt;
		}
		
		public function setCreateAt($createAt) {
			$this->createAt = $createAt;
		}

		public function getModifiedAt() {
			return $this->modifiedAt;
		}
		
		public function setModifiedAt($modifiedAt) {
			$this->modifiedAt = $modifiedAt;
		}

	}