<?php  
//in
 include('../database.php');
    $id_pagoE = $_POST['id_pago'];
    $alumno_idE = $_POST['alumno_id'];
    $actividad_idE = $_POST['actividad_id'];
    $fecha_vencimientoE = $_POST['fecha_vencimiento'];
    $fecha_pagoE = $_POST['fecha_pago'];
    $restoE = $_POST['resto'];

	$query_repetir = "SELECT * FROM `pago` where alumno_id='$alumno_idE' and actividad_id='$actividad_idE' and id_pago !='$id_pagoE'";
    $result_repetir =  mysqli_query($conexion,$query_repetir);

	if($result_repetir){
		$cant_row= mysqli_num_rows($result_repetir);

		if($cant_row==0){
			$query = "UPDATE pago SET alumno_id = '$alumno_idE', alumno_id='$alumno_idE',fecha_vencimiento='$fecha_vencimientoE',resto='$restoE', fecha_pago='$fecha_pagoE' WHERE id_pago = '$id_pagoE'";
			echo $result =  mysqli_query($conexion,$query);
			if (!$result) {
				echo('ERROR EN LA BASE DE DATOS');//mysqli_error($conexion)

			}else{
				echo 'SE EDITÓ EXITOSAMENTE!';
			}
		}else{
			echo 'YA EXISTE ESTE PAGO, INTENTE CON OTRO';
		}

	}else{
		echo('ERROR EN LA BASE DE DATOS');//mysqli_error($conexion) 
	}
		

 	

 
?>