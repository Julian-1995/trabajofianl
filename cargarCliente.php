<!DOCTYPE html>
<html lang="es">
<?php
require_once('sesion.php');
require_once('conexion.php');
include("encabezado.php");

    if($_SESSION['perfil']!="empleado"){
        header("Location: login.php");
        exit();
    };

crearMenuOpciones($menuContiene,0);

#cargar datos del emprendedor
include_once 'conexion.php';

if(isset($_POST['nombreCliente'])&&(isset($_POST['apellidoCliente']))&&(isset($_POST['direccionCliente']))&&(isset($_POST['accesoCliente']))&&(isset($_POST['contraseniaCliente']))){
    $nombre = $_POST['nombreCliente'];
    $apellido = $_POST['apellidoCliente'];
    $direccion = $_POST['direccionCliente'];
    $telefono = $_POST['telefonoCliente'];
    $acceso = $_POST['accesoCliente'];
    $contrasenia =$_POST['contraseniaCliente'];

    $insertar = $conectarBaseDatos->prepare("INSERT INTO usuario(id,nombre,apellido,estado,acceso,contrasenia,perfil) 
                                        values(null,'$nombre','$apellido',0,'$acceso','$contrasenia','cliente')");
    
	$insertar->execute();
	$id_usuario = $conectarBaseDatos->lastInsertId();
	
	$insertarClient = $conectarBaseDatos->prepare("INSERT INTO cliente(id_cliente,direccion,telefono,id_usuario) 
	values(null,'$direccion','$telefono','$id_usuario')");
	$insertarClient->execute();
};

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
			   <?php echo crearMenuSesion(); ?>
              </ul> 
             </div> 
            </div> 
        </nav> 
    <main  id = "contenedor">
    <fieldset>
		<h3>Cargar Cliente</h3>	
		<form action="cargarCliente.php" method="POST" >
				<div class="cargarCliente">
					<label for="nombreCliente">Nombre</label>
					<input type="text" name="nombreCliente" id="nombreCliente" value="" required>
				</div>
				<br>
				<div class="cargarCliente">
					<label for="apellidoCliente">Apellido</label>
					<input type="text" name="apellidoCliente" id="apellidoCliente" value="" required>
				</div>
				<br>
				<div class="cargarCliente">
					<label for="direccionCliente">Direccion</label>
					<input type="text" name="direccionCliente" id="direccionCliente" value="" required>
				</div>
				<br>
				<div class="cargarCliente">
					<label for="telefonoCliente">Telefono</label>
					<input type="number" name="telefonoCliente" id="telefonoCliente" value="" required>
				</div>
				<br>		
				<div class="cargarCliente">
					<label for="accesoCliente">Acceso</label>				
					<input type="text"  name="accesoCliente" id="accesoCliente" value="" maxlength="20" required>
				</div>
				<br>		
				<div class="cargarCliente">
					<label for="contraseniaCliente">Contraseña</label>				
					<input type="password"  name="contraseniaCliente" id="contraseniaCliente" value="" maxlength="20" required>
				</div>
				<br>
				<br>
				<div class="cargarCliente">
					<input type="submit" name="cargar" value="cargar Cliente">
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
