<!DOCTYPE html>
<html lang="es">

<?php
include_once 'conexion.php';
?>
<script>
			window.print();
</script>
<?php
			if(!empty($_POST['datos'])){
				$buscar = $_POST['datos'];
                ?>
				<fieldset>
					<table style= "border: 1px solid black"> 
							<?PHP 
								$resultado = $conectarBaseDatos ->query($buscar);
					
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
			
					</table>
				<fieldset>
			
			<?php }
			
			else{
			echo "No hay datos a exportar";
			};
			#header("Location:consultas.php");
			exit();
	
			
?>
</html>