<?php 
include('../database.php');


  $query = "SELECT id_pago,alumno_id,nombre,actividad_id,nombreAc,fecha_vencimiento,resto,fecha_pago FROM pago inner JOIN alumno ON alumno_id=id_alumno INNER JOIN actividad ON actividad_id=id_actividad";
  $result =  mysqli_query($conexion,$query);

    if (!$result) {
		die('error'.mysqli_error($conexion));
    }
    
    $json= array();
    while($row = mysqli_fetch_array($result)){
        $json[] = array(
        'id_pago' => $row['id_pago'],
        'alumno_id' => $row['alumno_id'],
        'nombre' => $row['nombre'],
        'actividad_id' => $row['actividad_id'],
        'nombreAc' => $row['nombreAc'], 
        'fecha_vencimiento' => $row['fecha_vencimiento'],
        'resto' => $row['resto'],
        'fecha_pago' => $row['fecha_pago'],
        
      
		);
    }
    $jsonstring = json_encode($json);
    echo $jsonstring ;
?>