<?php
include('../database.php');

$alias=$_POST['aliasL'];
$contraseña=$_POST['contraseñaL'];

$query = "SELECT alias,rol_id,descripcion FROM usuario  INNER JOIN rol on rol_id=id_rol WHERE alias='$alias' and contraseña='$contraseña'";
$result =  mysqli_query($conexion,$query);

$cant_row= mysqli_num_rows($result);
if($cant_row==1){
    $json=array();
    while($row = mysqli_fetch_array($result)){
        //abro session y obtengo descripcion de rol y guardo en variable session para mostrar en menu
        session_start();
        $descripcion=$row['descripcion'];
        
        $_SESSION['descripcion']  = $descripcion;
        $_SESSION['alias']  = $alias;
        //recorro array mando en json a login.js
        $json[]=array(
            'rol_id'=>$row['rol_id'],
            'descripcion'=>$row['descripcion']
           
        );
    }
    

}else {
    //echo "SELECT alias,rol_id,descripcion FROM usuario  INNER JOIN rol on rol_id=id_rol WHERE alias='$alias' and contraseña='$contraseña'";
    $json[]=array(
        'resp'=>'incorrecto'
        
       
    );
}
//creo json
$jsonstring=json_encode($json);
echo $jsonstring;
?>