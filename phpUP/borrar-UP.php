<?php
include('../database.php');
$id_usuario= $_POST['id_usuario'];
$id_profesor= $_POST['id_profesor'];

$query_profesor = "DELETE FROM profesor WHERE id_profesor ='$id_profesor'";
$result_profesor =  mysqli_query($conexion,$query_profesor);

        if($query_profesor){
            $query_usuario = "DELETE FROM usuario WHERE id_usuario ='$id_usuario'";
            $result_usuario =  mysqli_query($conexion,$query_usuario);
            if($query_usuario){
                echo 'SE BORRO EXITOSAMENTE';
            }
        }else{
            echo 'ERROR EN LA BASE DE DATOS';
        }

?>