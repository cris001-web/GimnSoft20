<?php 
include('../database.php');
$query = "SELECT id_usuario, alias,contraseña,rol_id,descripcion , id_profesor,fotoU,nombreP,apellido,fecha_nac,direccion,num_telf,
             localidad_id,descripcion_loc,sexo_id,descripcion_sex FROM `usuario`
            INNER JOIN profesor on id_usuario=usuario_id 
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
            'id_usuario'=>$row['id_usuario'],
            'alias'=>$row['alias'],
            'contraseña'=>$row['contraseña'],
            'rol_id'=>$row['rol_id'],
            'descripcion'=>$row['descripcion'],
            'id_profesor'=>$row['id_profesor'],
            'nombreP'=>$row['nombreP'],
            'apellido'=>$row['apellido'],
            'fecha_nac'=>$row['fecha_nac'],
            'direccion'=>$row['direccion'],
            'num_telf'=>$row['num_telf'],
            'localidad_id'=>$row['localidad_id'],
            'descripcion_loc'=>$row['descripcion_loc'],
            'sexo_id'=>$row['sexo_id'],
            'descripcion_sex'=>$row['descripcion_sex'],
            'fotoU'=>$row['fotoU'],

        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring ;
?>