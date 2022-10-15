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
   <link href="disenio.css" rel="stylesheet">

<style>

    #contenedor-productos{
        float: left;
        width: 100%;
        }
    .sub-titulo{
        margin-left: 437px;
        margin-top: 80px;
        }   
    .producto{
        float: left;
        width: 315px;
        height: 100%;
    }
    .alinear-descripcion{
        float: left;
    }
    .alinear-precio {
        float: left;
        padding: 5px;
        background: #31384A;
        color: #fff;
    }
    .boton-Comprar{
        background:#31384A;
        color:#fff;
        padding:5px;
    }
    .izquierda{
        margin-left:auto;
        margin-right:auto;
        float: left;
    }
</style>

   <!--bostrap CSS y JS-->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg bg-light navbar-dark bg-dark fixed-top"> 
            <div class="container-fluid"> 
            <figure id = "logo" > <img src = "logo.png" alt="logo" style="height: 55px"></figure>
             <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Navegación de palanca"> <span class="navbar-toggler-icon"></span> </button> 
             <div class="navbar-collapse collapse" id="navbarNav"> 
              <ul class="navbar-nav"> 
              <li>
              <?=$menuContiene?>
              </li> 
             <?php echo crearMenuSesion(); ?>
                
              </ul> 
             </div> 
            </div> 
        </nav> 
    <main id = "contenedor">
        <h1>Tienda emprendedora</h1>
        <div id="buscador">
            <label >Buscar</label>
            <input type="search" placeholder="Buscar producto" style="margin-top: 27px;">
		    <input type="button" value="Buscar" id="boton-buscar" onclick="buscarProducto()">
        </div>
        <br><br>
        <div id="contenedor-productos" style= "border: 1px solid black">
           
                <!-- No le pongo h2 o h6 porque rompe la estetica -->
                <h3>Productos mas vendidos</h3>
                <article class="producto">
                    <div style=" height: 255px">
                    <legend>Impresion 3D</legend>
                    <img src="productos/maceta-gato.jpg" alt="maceta de gato" style=" height: 170px;">
                        <strong class="alinear-descripcion">Maceta de gato</strong>
                        <br>
                        <br>
                        <em class="alinear-precio">150$</em>
                        <input type="button" value="Comprar" class="boton-Comprar">
                    </div>
                </article>
                <article class="producto">
                    <div style=" height: 255px;" >
                    <legend>Impresion 3D</legend>
                    <img src="productos/maceta-dientes.jpg" alt="maceta de dientes" style=" height: 170px;">
                        <strong class="alinear-descripcion">Maceta de pulpos</strong>
                        <br>
                        <br>
                        <em class="alinear-precio">500$</em>
                        <input type="button" value="Comprar" class="boton-Comprar">
                    </div>
                </article>
                <article class="producto">
                    <div style=" height: 255px;" >
                    <legend>Impresion 3D</legend>
                    <img src="productos/mario-bros.jpg" alt="Mario bros" style=" height: 170px;">
                        <strong class="alinear-descripcion">Mario Bros</strong>
                        <br>
                        <br>
                        <em class="alinear-precio">950$</em>
                        <input type="button" value="Comprar" class="boton-Comprar">
                    </div>
                </article>
                <article class="producto">
                    <div style=" height: 255px;" >
                    <legend>Lamina de diseño</legend>
                    <img src="productos/lamina1.jpg" alt="Lamina minimalista" style=" height: 170px;">
                        <strong class="alinear-descripcion">Cuadro minimalista</strong>
                        <br>
                        <br>
                        <em class="alinear-precio">1700$</em>
                        <input type="button" value="Comprar" class="boton-Comprar">
                    </div>
                </article>
                <article class="producto">
                    <div style=" height: 255px;" >
                    <legend>Lamina de diseño</legend>
                    <img src="productos/lamina2.jpg" alt="Lamina con nubes y agua" style=" height: 170px;">
                        <strong class="alinear-descripcion">Lamina 30cm X 25cm</strong>
                        <br>
                        <br>
                        <em class="alinear-precio">2500$</em>
                        <input type="button" value="Comprar" class="boton-Comprar">
                    </div>
                </article>
                <article class="producto">
                    <div style=" height: 255px;" >
                    <legend>Lamina de diseño</legend>
                    <img src="productos/lamina3.jpg" alt="Lamina de mar" style=" height: 170px;">
                        <strong class="alinear-descripcion">Lamina 23cm X 10xm</strong>
                        <br>
                        <br>
                        <em class="alinear-precio">2150$</em>
                        <input type="button" value="Comprar" class="boton-Comprar">
                    </div>
                </article>
           
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