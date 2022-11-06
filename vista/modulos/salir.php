<?php

	use App\Modelo\Config;
	
	$config = new Config();
  	$rutaServer = $config->ctrRutaServidor();
 
	session_destroy();

	$url = $rutaServer.'/ingreso';
	
	echo "<script> window.location='".$url."'</script>";