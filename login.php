<!DOCTYPE html>
<html lang="es">
<?php

require_once('sesion.php');
include("encabezado.php"); 
crearMenuOpciones($menuContiene,0);



?>
<head>
	<meta charset="UTF-8">
	<title>tienda emprendedora</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <!-- link de archivos -->
    <script src="javascrip.js"></script>
    <link rel="stylesheet" href="disenio.css">
   <!--bostrap CSS y JS-->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light navbar-dark bg-dark"> 
            <div class="container-fluid"> 
            <figure id = "logo" > <img src = "logo.png" alt="logo" style="height: 55px"></figure>
             <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Navegación de palanca"> <span class="navbar-toggler-icon"></span> </button> 
             <div class="navbar-collapse collapse" id="navbarNav"> 
              <ul class="navbar-nav"> 
               <?=$menuContiene?>
                <?php echo crearMenuSesion();?>
              </ul> 
             </div> 
            </div> 
        </nav> 
	
	<main  id = "contenedor">
	<fieldset>
	<legend><h1>Iniciar Sesión</h1>	</legend>
		<form action="iniciarsesion.php" method="post">
			<div class="iniciarsesion">
				<label for="acceseso">acceseso</label>
				<input type="text" name="acceseso" id="acceseso" value="" required>
			</div>
			<br>			
			<div class="iniciarsesion">
				<label for="contrasenia">Contraseña</label>				
				<input type="password"  name="contrasenia" id="contrasenia" value="" maxlength="20" required>
			</div>
			<br>
			<br>
			<div class="iniciarsesion">
				<input type="submit" name="iniciar" value="Iniciar Sección">
			</div>			
		</form>	
	</fieldset>
	</main>
	<footer>
		<div class="central">
		   <div class="contendor-footer">
			  <div class="montserrat-regular-footer"> © pagina emprendedora - By Julian Vidal.</div>
		   </div>
		 </div>
	 </footer>	
</body>
</html>