<?php
	session_start();
	ini_set('display_errors', 'On');
    ini_set('display_errors', 1);
	
	require_once 'controllers/mail.controller.php';
	require_once 'controllers/plantilla.controller.php';
	require_once 'controllers/auth.controller.php';
	require_once 'controllers/perfiles.controller.php';
	require_once 'controllers/utilidades.controller.php';

	require_once 'models/dao.modelo.php';
	require_once 'models/auth.modelo.php';
	require_once 'models/perfiles.modelo.php';


	/* ==== ZONA PARA EXTENSIONES ==== */
	$plantilla = new ControladorPlantilla();
	$plantilla->ctrPlantilla();