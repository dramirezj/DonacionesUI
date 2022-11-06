<?php

	$config = new Config();
  	$rutaServer = $config->ctrRutaServidor();

	@session_start();

	$autenticado = false;

	if(isset($_SESSION['validarSesion']) && $_SESSION['validarSesion'] === 'ok') {

		$fechaGuardada = $_SESSION['fecha_inicio'];

		if((time() - $fechaGuardada) >= 300) {

			$autenticado = false;
			
			$login = new LoginController();
		   	$login->updateOffline($_SESSION['user_id'],$_SESSION['enterprise_id']);

		   	echo "<script> alert('A excedido el tiempo de inactividad. La sesión sera cerrada por seguridad.'); </script>";
		   	
			session_destroy();

			$url = $rutaServer.'/ingreso';
			
			echo "<script> window.location='".$url."'</script>";


		} else {

			$autenticado = true;
			$_SESSION['fecha_inicio'] = time();

		}
		
	}

?>