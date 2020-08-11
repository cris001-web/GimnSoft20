<?php
include('../database.php');

$alumno_id = $_POST['alumno_id'];
$actividad_id = $_POST['actividad_id'];
$fecha_vencimiento = $_POST['fecha_vencimiento'];
$resto = $_POST['resto'];
$fecha_pago = $_POST['fecha_pago'];

    $query_repetir = "SELECT * FROM `pago` where alumno_id='$alumno_id' AND actividad_id='$actividad_id'";
    $result_repetir =  mysqli_query($conexion,$query_repetir);
    $cant_row= mysqli_num_rows($result_repetir);
        if($cant_row==0){
        $query = "INSERT INTO pago (alumno_id,actividad_id,fecha_vencimiento,resto,fecha_pago) VALUES ('$alumno_id','$actividad_id','$fecha_vencimiento','$resto','$fecha_pago')";
        $result =  mysqli_query($conexion,$query);

        if (!$result) {
            echo mysqli_errno($conexion);
            echo('ERROR DE BASE DE DATOS');//mysqli_error($conexion)
            echo"INSERT INTO pago (alumno_id,actividad_id,fecha_vencimiento,resto,fecha_pago,) VALUES ('$alumno_id','$actividad_id','$fecha_vencimiento','$resto','$fecha_pago')";
        }else{
            echo 'EL PAGO SE HIZO EXITOSAMENTE';
        }
    }else{
        echo 'YA EXISTE EL MISMO PAGO';
    }
    

?>
