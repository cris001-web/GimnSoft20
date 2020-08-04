<?php
include('../database.php');

$nombreAc = $_POST['nombreAc'];
$profesor_id = $_POST['profesor_id'];
$dias = $_POST['dias'];
$horario = $_POST['horario'];
$costo = $_POST['costo'];

$query_repetir = "SELECT * FROM actividad WHERE nombreAc='$nombreAc'";
$result_repetir =  mysqli_query($conexion,$query_repetir);
$cant_row= mysqli_num_rows($result_repetir);
    if($cant_row==0){
        $query = "INSERT INTO actividad (nombreAc,dias,horario,costo,profesor_id) VALUES ('$nombreAc','$dias','$horario','$costo','$profesor_id')";
        $result =  mysqli_query($conexion,$query);

        if (!$result) {
            echo('ERROR DE BASE DE DATOS');//mysqli_error($conexion)
            //echo"INSERT INTO actividad (nombreAc,nombre,dias,horario,costo) VALUES ('$nombreAc','$nombre','$dias','$horario','$costo')";
        }else{
            echo 'SE AGREGÓ EXITOSAMENTE!';
        }
    }else{
        echo 'YA EXISTE ESTA ACTIVIDAD, INTENTE CON OTRA!';
    }

?>
