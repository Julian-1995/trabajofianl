<!DOCTYPE html>
<html lang="es">
<?php
#Información de la pagina
require_once('sesion.php');
include("encabezado.php");
include_once ('conexion.php');
if($_SESSION['perfil']!="empleado"){
    header("Location: login.php");
    exit();
};
crearMenuOpciones($menuContiene,0);


#lo pegue aca porque si no cuando busco si existe el usuario me figura error.

#buscar si existe el usuario

#echo $accesoEmprende;
#$existeAcceso = false;
#$sql = "SELECT acceso FROM usuario";
#$resultado = $conectarBaseDatos ->query($sql);
#foreach ($resultado as $mostrar) {
#    if ($mostrar["acceso"]==$accesoEmprende){
#      $existeAcceso = true;
#      echo $existeAcceso;
#    };
#};

#if($existeAcceso == false){
        #cargar datos del emprendedor
        date_default_timezone_set("America/Argentina/Buenos_Aires");
        $fecha = date('d-m-Y h:i:s a', time()); 
        if(isset($_POST['nombreEmprendedor'])&&(isset($_POST['apellidoEmprendedor']))&&(isset($_POST['emprendimiento']))&&(isset($_POST['accesoEmprendedor']))&&(isset($_POST['contraseniaEmprendedor']))){
            $Efectivo = "";
            if(!empty($_POST['formaDePagoEmprendedorefectivo'])){
                    $efectivo ='Efectivo';       
            }else{$efectivo =null;};
            $Debito = "";
            if(!empty($_POST['formaDePagoEmprendedordebito'])){
                    $debito ='Debito';
            }else{$debito =null;};
            $Credito ="";
            if(!empty($_POST['formaDePagoEmprendedorcredito'])){
                    $credito ='Credito';
                }else{$credito =null;};
            $nombreEmprendedor = $_POST['nombreEmprendedor'];
            $apellidoEmprendedor = $_POST['apellidoEmprendedor'];
            $emprendimiento = $_POST['emprendimiento'];
            $accesoEmprende = $_POST['accesoEmprendedor'];
            $contraseniaEmprendedor =$_POST['contraseniaEmprendedor'];

            
            $insertar = $conectarBaseDatos->prepare("INSERT INTO usuario(id,nombre,apellido,estado,acceso,contrasenia,perfil) 
                                                    value (null,'$nombreEmprendedor','$apellidoEmprendedor','0','$accesoEmprende','$contraseniaEmprendedor','emprendedor')");
            
            $insertar->execute();
            #busca el ultimo id y lo vincula con la tabla relacionada
            $id_usuario = $conectarBaseDatos->lastInsertId();

            $insertarEmprende = $conectarBaseDatos->prepare("INSERT INTO emprendedor(id_emprendedor,emprendimiento,credito,debito,efectivo,id_usuario,fecha_emprendimiento) 
            values(null,'$emprendimiento','$credito','$debito','$efectivo','$id_usuario','$fecha')");

            $insertarEmprende->execute();
        };
#};
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
        <br>
        <form action="cargarEmprendedor.php" method="POST">
                <div class="cargarEmprendedor">
                    <label for="nombreEmprendedor">Nombre</label>
                    <input type="text" name="nombreEmprendedor" id="nombreEmprendedor" value="" aria-label= "Nombre" placeholder="Ingresar Nombre" required>
                </div>
                <br>
                <div class="cargarEmprendedor">
                    <label for="apellidoEmprendedor">Apellido</label>
                    <input type="text" name="apellidoEmprendedor" id="apellidoEmprendedor" value="" aria-label= "Apellido" placeholder="Ingresar Apellido"  required>
                </div>
                <br>
                <div class="cargarEmprendedor">
                    <label for="emprendimiento">Emprendimiento</label>
                    <input type="text" name="emprendimiento" id="emprendimiento" value="" placeholder="Ingresar Emprendimiento" required>
                </div>
                <br>
                <div class="cargarEmprendedor">
                    <fieldset>
                        <legend>Forma de pago</legend>
                        <br>
                        <!-- for agregar-->
                        <label for="efectivo">Efectivo</label>
                        <input type="checkbox" name="formaDePagoEmprendedorefectivo" id="efectivo" value="efectivo">
                        <label for="debito">Debito</label>
                        <input type="checkbox" name="formaDePagoEmprendedordebito" id="debito" value="debito">
                        <label for="credito">Credito</label>
                        <input type="checkbox" name="formaDePagoEmprendedorcredito" id="credito" value="credito">
                    </fieldset>
                </div>
                <br>
                <div class="cargarEmprendedor">
                    <label for="accesoEmprendedor">Nombre de acceso</label>
                    <input type="text" name="accesoEmprendedor" id="accesoEmprendedor" value="" aria-label= "acceso" placeholder="Ingresar nombre de acceso" required>
                </div>
                <br>		
                <div class="cargarEmprendedor">
                    <label  for="contraseniaEmprendedor">Contraseña</label>				
                    <input type="password"  name="contraseniaEmprendedor" id="contraseniaEmprendedor" value="" maxlength="20" placeholder="Ingresar contraseña" required>
                </div>
                <br>
                <br>
                <div class="cargarEmprendedor">
                    <input type="submit" name="cargar" value="Cargar emprendedor">
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
