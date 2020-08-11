<?php 
include('../database.php');


  $query = "SELECT * FROM actividad
  INNER JOIN profesor on profesor_id=id_profesor";
  $result =  mysqli_query($conexion,$query);

    if (!$result) {
		die('error'.mysqli_error($conexion));
    }
    
    $json= array();
    while($row = mysqli_fetch_array($result)){
        $json[] = array(
        'id_actividad' => $row['id_actividad'],
        
        'nombreAc' => $row['nombreAc'], 
        'dias' => $row['dias'],
        'horario' => $row['horario'],
        'costo' => $row['costo'],
        'profesor_id' => $row['profesor_id'],
        'nombreP' => $row['nombreP'],
      
		);
    }
    $jsonstring = json_encode($json);
    echo $jsonstring ;
?>