<?php

	namespace App\Entidad;

	class Categoria {

		private $id;
		private $name;
		private $description;
		private $enabled;
		private $createAt;

		public function __construct($id, $name, $description, $enabled, $createAt) {

			$this->id=$id;
			$this->name=$name;
			$this->description=$description;
			$this->enabled=$enabled;
			$this->createAt=$createAt;

		}

		public function getId() {

			return $this->id;

		}

		public function setId($id) {

			$this->id=$id;

		}

		public function getName() {

			return $this->name;

		}

		public function setName($name) {

			$this->name=$name;

		}

		public function getDescription() {

			return $this->description;

		}

		public function setDescription($description) {

			$this->description=$description;

		}

		public function getEnabled() {

			return $this->enabled;

		}

		public function setEnabled($enabled) {

			$this->enabled=$enabled;

		}

		public function getCreateAt() {

			return $this->createAt;

		}

		public function setCreateAt($createAt) {

			$this->createAt=$createAt;

		}
		

	}