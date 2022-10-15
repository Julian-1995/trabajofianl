<?php
#Modificar datos del usuario
include_once 'conexion.php';
include("editar.php"); 

    $id = $_GET['id'];

    $nombre = $_GET['nombre'];
    $nombre_sin_espacio=trim($nombre);

    $apellido = $_GET['apellido'];
    $apellido_sin_espacio=trim($apellido);

    $estado = $_GET['estado'];
    $estado_sin_espacio=trim($estado);

    $acceso = $_GET['acceso'];
    $acceso_sin_espacio=trim($acceso);

    $perfil = $_GET['perfil'];

/*

cargan las el tipo de pago
if(!empty(trim($_GET['debito']))){
    $debito_sin_espacio = 'debito';
}else{
    $debito_sin_espacio = null;
};

if(!empty(trim($_GET['efectivo']))){
    $efectivo_sin_espacio = 'efectivo';
}else{
    $efectivo_sin_espacio = null;
};

if(!empty(trim($_GET['credito']))){
    $credito_sin_espacio = 'credito';
}else{
    $credito_sin_espacio = null;
};
*/
   
   
    $insertar = $conectarBaseDatos->prepare("UPDATE usuario SET nombre='$nombre_sin_espacio', apellido='$apellido_sin_espacio', acceso='$acceso_sin_espacio', estado='$estado_sin_espacio',  perfil='$perfil' WHERE id = '$id'");
    $insertar->execute();

    
    
   # quiero salir de esta parte pero no me deja, cuando modifico el campo me figura un erro porque busca los datos y no los encuentro, de este sitio se tendria que dirigir a modificarUsuario.php

   header("location:modificarUsuario.php");

 
?>
