<?php

session_start();  #iniciar o reanuda la sesión

	$usuario = (isset($_SESSION["usuario"]) && !empty($_SESSION["usuario"]))? trim($_SESSION["usuario"]):""; 
	$perfil = (isset($_SESSION["perfil"]) && !empty($_SESSION["perfil"]))? trim($_SESSION["perfil"]):""; 

	if ($usuario=="") {
		unset($_SESSION["usuario"]);		
		session_destroy();	
	}

	
?>