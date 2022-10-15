<?php
include_once 'conexion.php';

$sql = "(SELECT usuario.acceso, usuario.contrasenia,usuario.perfil, usuario.nombre,usuario.apellido FROM usuario)";
$resultado = $conectarBaseDatos ->query($sql);


session_start();


	$login=0;	

	$acceseso =(isset($_POST['acceseso']) && !empty($_POST['acceseso']))? trim($_POST['acceseso']):"";
	$contrasenia =(isset($_POST['contrasenia']) && !empty($_POST['contrasenia']))? trim($_POST['contrasenia']):"";
	
	$user_contrasenia="";	
	
	foreach ($resultado as $usuarios) {
		
		if ($usuarios["acceso"]==$acceseso) {
			$contrasenia_user=$usuarios["contrasenia"];
			if ($contrasenia_user == $contrasenia) {
				$login=1;				
				$_SESSION['usuario'] = $acceseso;
				$_SESSION['perfil'] = $usuarios["perfil"];
				$_SESSION['nombreDeSesion'] = "{$usuarios["nombre"]} {$usuarios["apellido"]}";
				break;
			}
		}

	}
	if ($login==0) {
		$_SESSION["usuario"]="";
	}
	header("location:index.php");	
?>
