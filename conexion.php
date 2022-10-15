<?php
#datos local
$usuario="julian";
$password="123456789";
# conexión a la bd (data source name)
$strCnx = "mysql:host=localhost;dbname=tienda_emprendedora";
# crea el objeto PDO, con la conexión a la bd
$conectarBaseDatos = new PDO($strCnx, $usuario, $password);

try {
    $conectarBaseDatos = new PDO($strCnx, $usuario, $password);
    } catch (PDOException $e) {
    #para el usuario, cambiar por un error personalizado
     print "Error: " . $e->getMessage() . "<br/>"; 
     #termina la ejecución del script
    die();
    } 

?>
