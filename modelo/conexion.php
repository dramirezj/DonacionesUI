<?php

	namespace App\Modelo;

	use \PDO;

	class Conexion {

		private $dbname;

		public function __construct($dbname) {

			$this->dbname = $dbname;

		}

		public function conectar() {

			$link = new PDO("mysql:host=localhost;dbname=".$this->dbname,"phpmyadmin","C0rt3lc0prZo21!",
							array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
						);

			return $link;

		}

	}
