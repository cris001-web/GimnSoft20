<?php 
include('../database.php');
$id_alumno= $_POST['id_alumno'];
$id_usuario= $_POST['id_usuario'];

    $query_alumno = "DELETE FROM alumno WHERE id_alumno ='$id_alumno'";
    $result_alumno =  mysqli_query($conexion,$query_alumno);

        if($query_alumno){
            $query_usuario = "DELETE FROM usuario WHERE id_usuario ='$id_usuario'";
            $result_usuario =  mysqli_query($conexion,$query_usuario);
            if($query_usuario){
                echo 'SE BORRO EXITOSAMENTE';
            }
        }else{
            echo 'ERROR EN LA BASE DE DATOS';
        }
?>