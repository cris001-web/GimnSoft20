<?php 
  
	include('../database.php');
	
		$id_pagoB= $_POST['id_pago'];

		$query = "DELETE FROM pago WHERE id_pago ='$id_pagoB'";
		echo $result =  mysqli_query($conexion,$query);
		if (!$result) {
		    echo 'ERROR EN LA BASE DE DATOS';
		//echo "DELETE FROM pago WHERE id_pago ='$id_pagoB'";
		}else{
            echo 'SE BORRÓ EXITOSAMENTE';
            //echo "DELETE FROM pago WHERE id_pago ='$id_pagoB'";
        }


?>