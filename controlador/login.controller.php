<?php

	namespace App\Controlador;

	use App\Modelo\LoginModel;

	class LoginController {

		public function findByEmail() {

			if(isset($_POST["email"])) {

				$email = $_POST["email"];
				$pass = $_POST["password"];

				if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $email)) {

					$passEncriptado = md5($pass);

					$table = "user";
					$item = "email";
					$valor = $email;

					$id = 0;

					$respuesta = LoginModel::findByEmail($email,$passEncriptado);

					print("<pre>".print_r($respuesta,true)."</pre>");

					if($respuesta["account_locked"] == 0) {

						if($respuesta["enabled"] == 1) {

							if($respuesta["online"] == 0) {

								if($respuesta["email"] === $email && $respuesta["password"] === $passEncriptado) {

									$id = $respuesta["id"];

									$_SESSION["validarSesion"] = "ok";
									$_SESSION["user_id"] = $id;
									$_SESSION["email"] = $respuesta["email"];
									$_SESSION["firstname"] = $respuesta["firstname"];
									$_SESSION["lastname"] = $respuesta["lastname"];
									$_SESSION["role_id"] = $respuesta["role_id"];

									echo '<script>window.location="inicio"</script>';

								} else {

									$username = str_replace(".", "_", $email);

									if(isset($_COOKIE["$username"])) {
										$intentos = $_COOKIE["$username"];
										$intentos++;
										setcookie($username,$intentos,time() + 120);
										if($intentos >= 3) {
											LoginModel::updateAccountLocked($email);
										}
									} else {
										setcookie($username,1,time() + 120);
									}

									echo '<div class="alert alert-danger">Error usuario y/o contrase&ntilde;a son inv&aacute;lidas.</div>';
								}

							} else {
								echo '<div class="alert alert-danger">Error al ingresar el usuario ya inicio sesión en otra máquina.</div>';
							}


						} else {
							echo '<div class="alert alert-danger">Error el usuario se encuentra inactivo, contacte al administrador.</div>';
						}
					}
					else {
						echo '<div class="alert alert-danger">Error la cuenta se encuentra bloqueada, contacte al administrador.</div>';
					}

				}

			}

		}

	}
