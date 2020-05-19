<?php 
  
	include('../database.php');
	if (isset($_POST['id_rol'])) {
		$id_rol= $_POST['id_rol'];

		$query = "DELETE FROM rol WHERE id_rol ='$id_rol'";
		echo $result =  mysqli_query($conexion,$query);
		if (!$result) {
		echo 'ERROR EN LA BASE DE DATOS ';
		}else{
            echo 'SE BORRO EXITOSAMENTE';
        }
		

	}else{
        echo 'ERROR, INTENTE NUEVAMENTE';
    }
	

?>