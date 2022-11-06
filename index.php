<?php

    session_start();

   	/*=============================================
	MODELOS
	=============================================*/	
	include_once("modelo/config.php");
	include_once("modelo/conexion.php");
	include_once("modelo/login.model.php");
	include_once("modelo/menu.model.php");
	include_once("modelo/role.model.php");
	include_once("modelo/user.model.php");
	include_once("modelo/uuid.php");
	include_once("modelo/categoria.model.php");
	include_once("modelo/producto.model.php");
	include_once("modelo/persona.model.php");
	include_once("modelo/entrada.model.php");
	include_once("modelo/departamento.model.php");
	include_once("modelo/municipio.model.php");
	include_once("modelo/tipoDocumento.model.php");
	include_once("modelo/empresa.model.php");
	include_once("modelo/documentoEmpresa.model.php");
	
	/*=============================================
	CONTROLADORES
	=============================================*/	
	include_once("controlador/template.controller.php");
	include_once("controlador/login.controller.php");
	include_once("controlador/menu.controller.php");
	include_once("controlador/role.controller.php");
	include_once("controlador/user.controller.php");
	include_once("controlador/categoria.controller.php");
	include_once("controlador/producto.controller.php");
	include_once("controlador/persona.controller.php");
	include_once("controlador/entrada.controller.php");
	include_once("controlador/departamento.controller.php");
	include_once("controlador/municipio.controller.php");
	include_once("controlador/tipoDocumento.controller.php");
	include_once("controlador/empresa.controller.php");
	include_once("controlador/documentoEmpresa.controller.php");

	/*=============================================
	SERVICIOS
	=============================================*/	
	include_once("servicios/securityService.php");

	/*=============================================
	ENTIDADES
	=============================================*/	
	include_once("entidades/categoria.entity.php");
	include_once("entidades/persona.entity.php");
	include_once("entidades/departamento.entity.php");
	include_once("entidades/municipio.entity.php");
	include_once("entidades/tipoDocumento.entity.php");
	include_once("entidades/empresa.entity.php");
	include_once("entidades/documentoEmpresa.entity.php");
	
	$template = new TemplateController();
	$template -> startTemplate();
	