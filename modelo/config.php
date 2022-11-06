<?php

	namespace App\Modelo;

	class Config {

		/*=============================================
		RUTA FRONTEND
		=============================================*/

		public function ctrRuta() {

			$server = $_SERVER['SERVER_NAME'];
			$port = $_SERVER["SERVER_PORT"];

			return "https://".$server.":".$port."/DonacionesUI/app/";

		}


		/*=============================================
		RUTA BACKEND
		=============================================*/
		
		public function ctrRutaServidor() {

			$server = $_SERVER['SERVER_NAME'];
			$port = $_SERVER["SERVER_PORT"];

			return "https://".$server.":".$port."/DonacionesUI/app/";

		}

	}