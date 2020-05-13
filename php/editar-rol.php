<?php  
//in
 include('../database.php');
 if (isset($_POST['id_rol'])) {
	
	$id_role = $_POST['id_rol'];
	$descripcione = $_POST['descripcion'];

	$query_repetir = "SELECT * FROM rol WHERE descripcion='$descripcione' AND id_rol != '$id_role'";

	$result_repetir =  mysqli_query($conexion,$query_repetir);
	if($result_repetir){
		$cant_row= mysqli_num_rows($result_repetir);

		if($cant_row==0){
			$query = "UPDATE rol SET  descripcion = '$descripcione' WHERE id_rol = '$id_role'";
			echo $result =  mysqli_query($conexion,$query);
			if (!$result) {
				echo('ERROR EN LA BASE DE DATOS');//mysqli_error($conexion)

			}else{
				echo 'SE EDITO EXITOSAMENTE!';
			}
		}else{
			echo 'YA EXISTE ESTA DESCRIPCIÓN, INTENTE CON OTRA!';
		}

	}else{
		echo('ERROR EN LA BASE DE DATOS');//mysqli_error($conexion) 
	}
		

 	

 }
?>