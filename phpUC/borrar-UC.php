<?php 
  
	include('../database.php');
	
		$id_actividadB= $_POST['id_actividad'];

		$query = "DELETE FROM actividad WHERE id_actividad ='$id_actividadB'";
		echo $result =  mysqli_query($conexion,$query);
		if (!$result) {
		    echo 'ERROR EN LA BASE DE DATOS';
		//echo "DELETE FROM actividad WHERE id_actividad ='$id_actividadB'";
		}else{
            echo 'SE BORRÓ EXITOSAMENTE';
            //echo "DELETE FROM actividad WHERE id_actividad ='$id_actividadB'";
        }


?>