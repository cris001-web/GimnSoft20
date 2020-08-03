<?php 
include('../database.php');


	$query = "SELECT * FROM usuario INNER JOIN rol on rol_id=id_rol";
    $result =  mysqli_query($conexion,$query);

    if (!$result) {
		die('error'.mysqli_error($conexion));
    }
    
    $json= array();
    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            'id_usuario' => $row['id_usuario'],
            'alias' => $row['alias'],
            'contraseña' => $row['contraseña'],
            'id_rol' => $row['id_rol'],
            'descripcion' => $row['descripcion'],
            'fotoU' => $row['fotoU'],
		);
    }
    $jsonstring = json_encode($json);
    echo $jsonstring ;
?>