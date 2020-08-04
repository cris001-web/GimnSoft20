<?php  
//in
 include('../database.php');
    $id_actividadE = $_POST['id_actividad'];
    $nombreAcE = $_POST['nombreAc'];
    $profesor_idE = $_POST['profesor_id'];
    $diasE = $_POST['dias'];
    $horarioE = $_POST['horario'];
    $costoE = $_POST['costo'];

	$query_repetir = "SELECT * FROM actividad WHERE nombreAc='$nombreAcE' AND id_actividad != '$id_actividadE'";
    $result_repetir =  mysqli_query($conexion,$query_repetir);

	if($result_repetir){
		$cant_row= mysqli_num_rows($result_repetir);

		if($cant_row==0){
			$query = "UPDATE actividad SET  id_actividad = '$id_actividadE', nombreAc='$nombreAcE',dias='$diasE',horario='$horarioE',costo='$costoE', profesor_id='$profesor_idE' WHERE id_actividad = '$id_actividadE'";
			echo $result =  mysqli_query($conexion,$query);
			if (!$result) {
				echo('ERROR EN LA BASE DE DATOS');//mysqli_error($conexion)

			}else{
				echo 'SE EDITÓ EXITOSAMENTE!';
			}
		}else{
			echo 'YA EXISTE ESTA ACTIVIDAD, INTENTE CON OTRA!';
		}

	}else{
		echo('ERROR EN LA BASE DE DATOS');//mysqli_error($conexion) 
	}
		

 	

 
?>