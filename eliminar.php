<?php
#Información de la pagina
require_once('sesion.php');
include_once ('conexion.php');
include_once ('modificarUsuario.php');

$id = $_GET['id'];
$perfil = $_GET['perfil'];

 
    if($perfil == 'cliente'){
        #elimina cliente
        $insertarCl = $conectarBaseDatos->prepare("DELETE FROM cliente WHERE id_usuario ='$id'");
        $insertarClUser = $conectarBaseDatos->prepare("DELETE FROM usuario WHERE id ='$id'");
        $insertarCl->execute();
        $insertarClUser->execute();

        echo '<script language="javascript">alert("SE HAN ELIMINADO LOS DATOS!");
        window.location="modificarUsuario.php";</script>'; 

    }else if($perfil == 'emprendedor'){
        #elimina el emprendedor
       
        $deleteProducto = $conectarBaseDatos ->query("DELETE productos FROM productos INNER JOIN emprendedor on productos.id_emprendedor_producto = emprendedor.id_emprendedor WHERE emprendedor.id_usuario = $id;");
        $deleteProducto->execute();
        $deleteEmprende = $conectarBaseDatos->prepare("DELETE FROM emprendedor WHERE id_usuario ='$id'");
        $deleteEmprende->execute();
        $insertarEmpre = $conectarBaseDatos->prepare("DELETE FROM usuario WHERE id ='$id'");
        $insertarEmpre->execute();
        echo '<script language="javascript">alert("SE HAN ELIMINADO LOS DATOS!");
        window.location="modificarUsuario.php";</script>'; 
    }

    

?>
