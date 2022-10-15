
  <!-- link de archivos -->
  <script src="javascrip.js"></script>
	<link rel="stylesheet" href="disenio.css">

<?php
	function crearMenuSesion() {
	global $usuario;
	
	if ($usuario=="") {
		$links ="<a href='login.php' title='iniciar sesion'> iniciar sesion</a>";
	} else {
		$links = "<span> {$_SESSION['nombreDeSesion']} </span> &nbsp;".
				 "<a href='cerrarSesion.php' title='cerrar sesión de usuario' style='color:red;'>X</a>";
	}		 

	$barraDeSesion ="<div class='boton navbar navbar-expand-lg' id='barraDeSesion' style='margin-top:4%;'>$links</div> ";
	return  $barraDeSesion;
	};
	
	function crearMenuOpciones(&$menuContiene,$menuSeleccionado) {
		global $perfil;	
		$menu="";	
				$menu.= "<div class='boton'><a href='index.php'  title='página publica'>Inicio</a></div>".
				"<div class='boton' ><a href='quienessomos.php'  title='página publica'>quienes somos?</a></div>";	
			
				#verifica si tiene un perfil valido para mostrar la opción del menú
				if ($perfil=="emprendedor") {
					$menu.= " <div class='boton' ><a href='subirproducto.php'   title='Administración de emprendedor' >Subir producto</a></div>";
					$menu.= " <div class='boton'><a href='modificarproducto.php'    title='Administración de emprendedor' >Modificar producto </a></div>";	
				}
				
				
				if ($perfil=="empleado"){
					$menu.= " <div class='boton'><a href='consultas.php' title='Administración de empleado'>Consultar Datos</a></div>";
					$menu.= " <div class='boton'><a href='cargarCliente.php' title='Administración de empleado'>Cargar Cliente</a></div>";
					$menu.= " <div class='boton'><a href='cargarEmprendedor.php'  title='Administración de empleado'>Cargar emprendedor</a></div>";
					$menu.= " <div class='boton'><a href='modificarUsuario.php'  title='Administración de empleado'>modificar Usuario</a></div>";
				}	
			
				
				if ($perfil=="cliente") {
					
					$menu.= "<div class='boton'><a href='ofertas.php' title='perfil de cliente' >Ofertas</a></div>";
				}	
						
				$menuContiene = "<nav class='menu navbar navbar-expand-lg'>$menu</nav>";
					
	}
	

	

?>


