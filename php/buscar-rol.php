<?php 
include('../database.php');

$search = $_POST['search'];

if (!empty($search)) {
	$query = "SELECT * FROM rol WHERE descripcion LIKE '$search%'";
    $result =  mysqli_query($conexion,$query);

    if (!$result) {
		die('error'.mysqli_error($conexion));
    }
    
    $json= array();
    while($row = mysqli_fetch_array($result)){
        $json[] = array(
			'descripcion' => $row['descripcion'],
			'id_rol' => $row['id_rol']
		);
    }
    $jsonstring = json_encode($json);
	echo $jsonstring ;
}
?>