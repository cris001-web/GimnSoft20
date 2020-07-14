<?php
include('../database.php');

$alias=$_POST['aliasL'];
$contraseña=$_POST['contraseñaL'];

$query = "SELECT alias,rol_id,descripcion FROM usuario  INNER JOIN rol on rol_id=id_rol WHERE alias='$alias' and contraseña='$contraseña'";
$result =  mysqli_query($conexion,$query);

$cant_row= mysqli_num_rows($result);
if($cant_row==1){
    while($row = mysqli_fetch_array($result)){
        $rol_id=$row[1];
    }

 session_start();
 $_SESSION['rol']  = $rol_id;
 if($rol_id=='87'){
    echo 'usuario';
 }else if($rol_id=='84'){
    echo 'administrador';
 }else{
     echo 'administrador';
 }
}else {
    //echo "SELECT alias,rol_id,descripcion FROM usuario  INNER JOIN rol on rol_id=id_rol WHERE alias='$alias' and contraseña='$contraseña'";
   echo 'incorrecto';
}

?>