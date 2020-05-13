<?php
    include('../database.php');
    $id_rol = $_POST['id_rol'];
    $query = "SELECT * FROM rol WHERE id_rol = '$id_rol'";
    
    $result =  mysqli_query($conexion,$query);
    
    $json = array();
        while ($row = mysqli_fetch_array($result)) {
            $json[] = array(

                'descripcion' => $row['descripcion'],
                'id_rol' => $row['id_rol']
            );
        }
        $jsonstring = json_encode($json[0]);
        echo $jsonstring ;
?>