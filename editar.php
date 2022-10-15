<!DOCTYPE html>
<html lang="es">
<?php
require_once('sesion.php');
include("encabezado.php"); 
include_once 'conexion.php';
if($_SESSION['perfil']!="empleado"){
    header("Location: login.php");
    exit();
};
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
<?php
    $id = $_GET['id'];
    $nombre = $_GET['nombre'];
    $apellido = $_GET['apellido'];
    $estado = $_GET['estado'];
    $acceso = $_GET['acceso'];
    $perfil = $_GET['perfil'];

    #lo buca por id
    #$sql = $conectarBaseDatos->prepare("SELECT * FROM emprendedor WHERE id_emprendedor = '$id'");
    #$editar = $conectarBaseDatos ->query($sql);
    
    
?>


    <nav class="navbar navbar-expand-lg bg-light navbar-dark bg-dark"> 
            <div class="container-fluid"> 
            <figure id = "logo" > <img src = "logo.png" alt="logo" style="height: 55px"></figure>
             <div class="navbar-collapse collapse" id="navbarNav"> 
              <ul class="navbar-nav"> 
               <?=$menuContiene?>
               <?php echo crearMenuSesion(); ?>
              </ul> 
             </div> 
            </div> 
        </nav> 
    <main id = "contenedor">
        <form action="carga_edicion.php" method="GET">
          
            <table  style= "border: 1px solid black">
                 <tr>
                    <td>id</td>
                    <td><input type="text" name="id" id="id" value="<?=$id?>" readonly="readonly"></td>
                </tr>
                <tr>
                    <td>nombre</td>
                    <td><input type="text"  name="nombre" id="nombre" value="<?=$nombre?>"></td>
                </tr>
                <tr>
                    <td>apellido</td>
                    <td><input type="text" name="apellido" id="apellido"  value="<?=$apellido?>"></td>
                </tr>
                <tr>
                    <td>Estado</td>
                    <td><input type="text" name="estado" id="estado" value="<?=$estado?>"></td>
                </tr>
                <tr>
                    <td>acceso</td>
                    <td><input type="text" name="acceso" id="acceso" value="<?=$acceso?>"></td>
                </tr>
                <tr>
                    <td>perfil</td>
                    <td><input type="text" name="perfil" id="perfil" value="<?=$perfil?>"readonly="readonly"></td>
                </tr>
                <th> <input type="submit" value="Guardar" onclick="alert('Modicado con exito!')"></input></th>
                <th><a href ="modificarUsuario.php">Volver</a></th>                
            </table>
        </form>
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