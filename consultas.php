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
    <style>
     @media print {
                #encabezado { display:none;}
                #logo { display:none;}
                #contenedor-boton { display:none;}
                .menu{ display:none;}
                .boton { display:none;}			
                #barra_superior { display:none;}
                #barraDeSesion {  display:none;}
                #consultas{  display:none;}
                #exel{  display:none;}
                #imprime{  display:none;}
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
              <ul class="navbar-nav"> 
               <?=$menuContiene?>
               <?php echo crearMenuSesion(); ?>
              </ul> 
             </div> 
            </div> 
        </nav> 
    <main id = "contenedor">
        
        <!-- formulario para consultas-->
        <h1>Nuestras personas asociadas</h1>
        
        <form action="consultas.php" id="consultas" method="POST">
            <fieldset >
                <legend>Consultar</legend> 
                <fieldset>
                    <strong>Seleccionar emprendedor:</strong>

                    <select name="perfil">
                        <option value="todos">todos</option>
                        <?php
                            $resultadoEmprendimiento = "SELECT * FROM `emprendedor`";
                            $emprendiminetos = $conectarBaseDatos ->query($resultadoEmprendimiento);
                            foreach ($emprendiminetos as $mostrarEmprendimiento) {
                                echo $mostrarEmprendimiento['emprendimiento'];
                                #salta un error en el selec porque dice que hay espacio pero pruebo sacandole 
                                #los espacios con trim pero sigue apareciendo
                                #y tambien probe con ponerle solo variable con trim y no modifica el error.
                        ?>
                                <option value="<?=($mostrarEmprendimiento['emprendimiento'])?>"><?=$mostrarEmprendimiento['emprendimiento']?></option>   
                        <?php };?>
                    </select>
                    <br>
                    <br>
                    <strong>Ordenar por:</strong>
                    <input type="radio" required value="Fecha" name="orden">
                    <strong>Fecha</strong>
                    <input type="radio" required  value="Nombre" name="orden" checked >
                    <strong>Nombre</strong>
                    <button type="submit" name="filtro" id="filtro">Filtrar</button>
                </fieldset>
            </fieldset>
        </form>
        <fieldset>
            <legend>Datos seleccionados</legend> 
                <table style= "border: 1px solid black"> 
                    <?php
                    $sql="";
                    if((isset($_POST['filtro']))){
                        if(!empty($_POST['perfil'])){
                            $seleccion = $_POST['perfil'];

                            if($seleccion =="todos"){
                                $sql = "SELECT * FROM emprendedor";
                                $individual = 0; 
                            #  $sqlProducto ="SELECT * FROM productos";
                            }else{
                                $sql = "SELECT * FROM emprendedor WHERE emprendedor.emprendimiento = '$seleccion'";
                                $individual = 1; 
                                };
                            if(isset($sql)){
                                if($_POST['orden'] == "Nombre"){

                                    $sql .= " ORDER by emprendimiento" ;
                                };
                                if($_POST['orden']== "Fecha"){
                                    $sql .= " ORDER BY fecha_emprendimiento";
                                };
                            };
                        $resultado = $conectarBaseDatos ->query($sql);
                        #contadores sin ++
                        $contar = 0;
                        $TotalcontarProducto=0;
                        foreach ($resultado as $mostrar) {
                            $contar = $contar + 1;
                            ?>
                            <tr>
                                <th>Emprendedor<hr></th>
                                <td><?php echo ($mostrar['emprendimiento']) ?><hr><td>
                                <td>.<hr></td>
                            </tr>
                            <tr>
                                <th>Fecha de inicio<hr></th>
                                <td><?php echo $mostrar['fecha_emprendimiento']?><hr><td>
                                <td>.<hr></td>
                            </tr>
                            <tr>
                                <th>Forma de pago <hr></th>
                                <td><?php echo $mostrar['efectivo'] ?> <?php echo $mostrar['debito'] ?> <?php echo $mostrar['credito'] ?><hr></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Productos<hr></th>
                                <th>.<hr></th>
                                <th>Precio<hr></th>
                            </tr>
                            <?php
                                $contarProducto = 0;
                                $contadorPrecio = 0;
                                $sqlProducto ="SELECT nombreProducto, presio FROM emprendedor INNER JOIN productos WHERE emprendedor.emprendimiento = '$mostrar[emprendimiento]' AND productos.id_emprendedor_producto = emprendedor.id_emprendedor ORDER by nombreProducto";                      
                                
                                $resultadoProducto = $conectarBaseDatos ->query($sqlProducto);
                                foreach ($resultadoProducto as $mostrarProducto) {
                                        $contarProducto = $contarProducto + 1;
                            ?>       
                                    <tr>   
                                        <td></td>
                                        <td><?php echo $mostrarProducto['nombreProducto'] ?></td>
                                        <td><?php echo $mostrarProducto['presio'] ?></td>
                                    </tr>   
                                    
                                 <?php 
                                    $contadorPrecio = $contadorPrecio+ $mostrarProducto['presio'];
                                }; ?>
                                <tr>   
                                    <th><hr>Total de precio<hr></th>
                                    <th><hr>.<hr></th>
                                    <th><hr><?php echo $contadorPrecio;?><hr></th>
                                </tr>
                                <tr>   
                                    <th ><hr>Subtotal<hr></th>
                                    <th ><hr><?php echo $contarProducto;
                                    $TotalcontarProducto = $TotalcontarProducto + $contarProducto; ?><hr></th>
                                </tr>
                 <?php };?>
                        <tr>
                            <th><hr style= "border: 1px solid black">.</th>
                            <th><hr style= "border: 1px solid black">.</th>
                            <th><hr style= "border: 1px solid black">.</th>
                        </tr>
                        <tr>
                            <th>Total de subtotales<hr></th>
                            <th><?php echo $TotalcontarProducto;?><hr></th>
                        </tr>
                        <tr>
                            <th>Total emprendimientos</th>
                            <th><?php echo $contar;?></th>
                        </tr>
                    <?php };}; ?>
                </table>
        </fieldset>

        <form  method="post" action="exel.php">
            <input type="hidden"  id="datos"  name="datos" value="<?php echo $sql?>">
            <button type="submit" id="exel" name="exel">Exportar en EXEL</button>
        </form>
                  <!--  esta opcion puesta en comentario funciona como lo solicita la consigana, pero al momento de redireccionar a la pagina constultas.php,
        se queda mostrando la tabla que envie a imprimir en la estructura html de la pag. imprimir.php 

        <form  method="post" action="imprimir.php">
            <input type="hidden"  id="datos"  name="datos" value="<?php #echo $sql?>">
            <button type="submit" id="imprimir" name="imprimir" value="imprimir">Imprimir como lo planteo pero queda en la pagina imprimir</button>
        </form>
        -->
        <a  href="javascript:window.print();" id="imprime" title="Imprimir">Imprimir</a>
        
        <br><br>
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