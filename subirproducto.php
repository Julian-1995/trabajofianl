<!DOCTYPE html>
<html lang="es">
<?php
require_once('sesion.php');
require_once('conexion.php');
include("encabezado.php");

    if($_SESSION['perfil']!="emprendedor"){
        header("Location: login.php");
        exit();
    };

crearMenuOpciones($menuContiene,0);



#cargar datos del emprendedor
include_once 'conexion.php';

if(isset($_POST['nombreProducto'])&&(isset($_POST['marcaProducto']))&&(isset($_POST['codigoProducto']))&&(isset($_POST['stockProducto']))&&(isset($_POST['precioProducto']))){
    $nombre = $_POST['nombreProducto'];
    $marca = $_POST['marcaProducto'];
    $codigo = $_POST['codigoProducto'];
    $stok = $_POST['stockProducto'];
    $presio = $_POST['precioProducto'];

    $usuario = $_SESSION['usuario'];
    $sql = "SELECT emprendedor.id_emprendedor FROM emprendedor INNER JOIN usuario ON emprendedor.id_usuario = usuario.id WHERE usuario.acceso = '$usuario'";
    echo $sql;
    echo $resultado = $conectarBaseDatos ->query($sql);

    echo $resultado;
    $insertar = $conectarBaseDatos->prepare("INSERT INTO productos(id_producto,nombreProducto,marca,codigo,stok,presio,id_emprendedor_producto) 
                                        value (null,'$nombre','$marca','$codigo','$stok','$presio','$id_emprendedorProducto')");
    $insertar->execute();
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
    <nav class="navbar navbar-expand-lg bg-light navbar-dark bg-dark "> 
            <div class="container-fluid"> 
            <figure id = "logo"> <img src = "logo.png" alt="logo"></figure>
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
    <legend>  <h1>Subir producto</h1>		</legend>
  
    <form action="subirproducto.php" method="post">
			<div class="cargarEmprendedor">
				<label for="nombreProducto">Nombre de producto</label>
				<input type="text" name="nombreProducto" id="nombreProducto" value="" required>
			</div>
			<br>
            <div class="cargarEmprendedor">
				<label for="marcaProducto">Marca</label>
				<input type="text" name="marcaProducto" id="marcaProducto" value="" required>
			</div>
			<br>
            <div class="cargarEmprendedor">
				<label for="codigoProducto">Codigo</label>
				<input type="number" name="codigoProducto" id="codigoProducto" value="" required>
			</div>
			<br>
            <div class="cargarEmprendedor">
				<label for="stockProducto">Cantidad de stock</label>
				<input type="number" name="stockProducto" id="stockProducto" value="" required>
			</div>
			<br>
            <div class="cargarEmprendedor">
				<label for="precioProducto">Precio</label>
				<input type="number" name="precioProducto" id="precioProducto" value="" required>
			</div>
            <br>
			<br>
			<div class="cargarEmprendedor">
				<input type="submit" name="cargar" value="Subir producto">
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