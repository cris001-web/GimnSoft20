<?php 
include('../database.php');


  $query = "SELECT id_usuario, alias, id_alumno,foto,nombre,apellido,fecha_nac,objetivo,direccion,num_telf,
             localidad_id,descripcion_loc,sexo_id,descripcion_sex,rol_id,descripcion  FROM `usuario`
            INNER JOIN alumno on usuario.id_usuario=alumno.usuario_id 
            INNER JOIN localidad on localidad_id=id_localidad 
            INNER JOIN sexo on sexo_id=id_sexo
            INNER JOIN rol on rol_id=id_rol";
  
    $result =  mysqli_query($conexion,$query);

    if (!$result) {
		die('error'.mysqli_error($conexion));
    }
    
    $json= array();
    while($row = mysqli_fetch_array($result)){
        $json[] = array(
      'id_usuario' => $row['id_usuario'],
      
      'alias' => $row['alias'], 
      'id_alumno' => $row['id_alumno'],
      'nombre' => $row['nombre'],
      'apellido' => $row['apellido'],
      'fecha_nac' => $row['fecha_nac'],
      'objetivo' => $row['objetivo'],
      'direccion' => $row['direccion'],
      'num_telf' => $row['num_telf'],
      'localidad_id'=>$row['localidad_id'],
      'descripcion_loc'=>$row['descripcion_loc'],
      'sexo_id'=>$row['sexo_id'],
      'descripcion_sex'=>$row['descripcion_sex'],
      'rol_id'=>$row['rol_id'],  
      'descripcion'=>$row['descripcion'],
      'foto'=>$row['foto'],
		);
    }
    $jsonstring = json_encode($json);
    echo $jsonstring ;
?>