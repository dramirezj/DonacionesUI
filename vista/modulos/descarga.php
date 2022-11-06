<?php

	if(isset($_GET['ruta'])) {
		$url = explode("/", $_GET['ruta']);
		$file = $url[1];
	}

	$directorio = $_SERVER['DOCUMENT_ROOT']."/DonacionesUI/app/documentos";

	header('Content-type: application/pdf');
	header('Content-Disposition: inline; filename="' . $file . '"');
	header('Content-Transfer-Encoding: binary');
	header('Accept-Ranges: bytes');
	@readfile($directorio."/".$file.".pdf");