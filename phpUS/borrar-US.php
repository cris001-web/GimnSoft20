<?php 
include('../database.php');
error_reporting(E_ALL ^ E_NOTICE);//no mostrar notice o warnning
$id_usuario= $_POST['id_usuario'];


$query_usuario = "DELETE FROM usuario WHERE id_usuario ='$id_usuario'";
$result_usuario =  mysqli_query($conexion,$query_usuario);

        if($query_usuario){
            
            echo 'SE BORRÓ CORRECTAMENTE';
            //echo "DELETE FROM usuario WHERE id_usuario ='$id_usuario'";
            
        }else{
            echo 'ERROR EN LA BASE DE DATOS';
        }
?>