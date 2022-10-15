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
    <style>
   	#contenedor{
	width: 100%;
    height: 100%;
    margin-left: auto;
    margin-right: auto;
    margin-top: 175px;
    background-color: #FFFFFF;
	}

	.contendor-footer {
    margin-top: 30px;
	width: 960px;
	padding-bottom: 15px;
	}

	form{
	width:450px;
	margin:auto;
	background: #324148;
	padding: 10px 20px;
	box-sizing:border-box;
	border-radius:7px;
	}
	h2{
	color:#fff;
	text-align:center;
	margin:0;
	font-size:30px;
	margin-bottom:20px;
	}
	textarea {
	width:100%;
	margin-bottom:20px;
	padding:7px;
	box-sizing:border-box;
	font-size:17px;
	border:none;
	min-height:100px;
	max-height:200px;
	max-width:100%;
	}
	input{
	width:100%;
	margin-bottom:20px;
	padding:7px;
	box-sizing:border-box;
	font-size:17px;
	border:none;
	}
	#boton-enviar{
	background:#31384A;
	color:#fff;
	padding:20px
	}
	#boton-enviar:hover{
	cursor:pointer;
	}
	h1 {
	color: #324148;
    font-family: 'Montserrat', sans-serif;
    font-size: 30px;
    font-weight: 600;
    margin-left: 38%;
    margin-right: 40%;
	}
	#biografia{
	width: 1114px;
    margin-left: auto;
    margin-right: auto;
	}
    </style>
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
              <ul class="nav justify-content-end"> 
                <?=$menuContiene?>
                <?php echo crearMenuSesion(); ?>
              </ul> 
             </div> 
            </div> 
        </nav> 
    <main id = "contenedor">
        <h1>¿quienes somos?</h1>
		<!-- le agregue h3 porque me solicitaba en el validator un h3 pero para mi iria strong--> 
        <section id="biografia">
			<h3>"Este sitio esta pensado para que emprendedores puedan subir y vender sus productos a 
            través de un sitio web, este sitio funcionaria como intermediario entre ambas partes intentando 
            lograr que emprendedores logren ser conocidos y comenzar a crecer con sus ventas."</h3>
		</section>
    </main>  
     <br><br>
	<form action="contacto">
		<h2>contacto</h2>
		<input type="text" name="Nombre" placeholder="Nombre">
		<input type="text" name="Correo" placeholder="Correo">
		<input type="text" name="Telefono" placeholder="telefono">
		<input type="text" name="Direccion" placeholder="Direccion">
		<textarea name="mensaje" placeholder="Escriba su mensaje"></textarea>
		<input type="button" value="enviar" id="boton-enviar">
	</form>
    <footer>
		<div class="central">
		   <div class="contendor-footer">
			  <div class="montserrat-regular-footer"> © pagina emprendedora - By Julian Vidal.</div>
		   </div>
		 </div>
	 </footer>
</body>
</html>