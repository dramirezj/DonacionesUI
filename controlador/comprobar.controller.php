<?php

	include_once("user.controller.php");

	session_start();

	$email = $_POST["email"];

	$userCtrl = new UserController();
	
	$resultado = $userCtrl->comprobar($email, $_SESSION['enterprise_id']);

	if($resultado > 0) {
		echo "Existe";
	} else {
		echo "Disponible";
	}

	