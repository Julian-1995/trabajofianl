<!DOCTYPE html>
<html lang="es">
<?php
require_once('sesion.php');
include("encabezado.php");
include_once 'conexion.php';

if($_SESSION['perfil']!="emprendedor"){
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
        <div>  
            <h1>Prodcutos de la pagina</h1>
            <table   style= "border: 1px solid black">
                <tr>
                    <th>nombre</th>
                    <th>marca</th>
                    <th>Codigo</th>
                    <th>stock</th>
            
                </tr>
                <?php
                    $sql = "SELECT * FROM `productos` WHERE 1";
                    $resultado = $conectarBaseDatos ->query($sql);
                    foreach ($resultado as $mostrar) {
                ?>
                    <tr>
                        <td><?php echo $mostrar['1'] ?></td>
                        <td><?php echo $mostrar['2'] ?></td>
                        <td><?php echo $mostrar['3'] ?></td>
                        <td><?php echo $mostrar['4'] ?></td>
                        <td>Editar</td>
                        <td>Eliminar</td>
                    </tr>
                 <?php }; ?>
            </table>
        </div>
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