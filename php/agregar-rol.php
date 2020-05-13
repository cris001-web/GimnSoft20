<?php
include('../database.php');

$descripcion = $_POST['descripcion'];
$query_repetir = "SELECT * FROM rol WHERE descripcion='$descripcion'";
$result_repetir =  mysqli_query($conexion,$query_repetir);
$cant_row= mysqli_num_rows($result_repetir);
    if($cant_row==0){
        $query = "INSERT INTO rol (descripcion) VALUES ('$descripcion')";
        $result =  mysqli_query($conexion,$query);

        if (!$result) {
            echo('ERROR DE BASE DE DATOS');//mysqli_error($conexion)
        }else{
            echo 'SE AGREGO EXITOSAMENTE!';
        }
    }else{
        echo 'YA EXISTE ESTE DESCRIPCIÓN, INTENTE CON OTRA!';
    }

?>