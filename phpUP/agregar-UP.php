<?php
error_reporting(E_ALL ^ E_NOTICE);//no mostrar notice o warnning
include('../database.php');
$alias = $_GET["alias"];
$apellido = $_GET["apellido"];
$contraseña=$_GET["contraseña"];
$select_rol=$_GET["select_rol"];
$nombre=$_GET["nombre"];
$apellido=$_GET["apellido"];
$direccion=$_GET["direccion"];
$num_telef=$_GET["num_telef"];
$select_loc=$_GET["select_loc"];
$select_sex=$_GET["select_sex"];
$fecha_nac=$_GET["fecha_nac"];
$foto_pre=$_FILES['foto'];

//si foto viene vacia pongo foto de perfil x default
if($foto_pre==null){
    $foto='perfil.jpg';
}else{
    $foto= date('Y-m-d').date('H-i-s').'.jpg';
}

//verifico que no este repetido el alias
$query_repetir = "SELECT * FROM usuario WHERE alias='$alias'";
$result_repetir =  mysqli_query($conexion,$query_repetir);
$cant_row= mysqli_num_rows($result_repetir);

if($cant_row==0){
    $query_usuario = "INSERT INTO usuario (alias,contraseña,rol_id) VALUES ('$alias','$contraseña','$select_rol')";
    $result_usuario =  mysqli_query($conexion,$query_usuario);

    //si inserccion de usuario es correcta, obtengo el id
    if($result_usuario){
        $query_selectID="SELECT id_usuario FROM usuario WHERE alias='$alias'";
        $result_selectID= mysqli_query($conexion,$query_selectID);
        if($result_selectID){
            // echo 'verdadero, seleccion id';
            while ($select_id_usuario=mysqli_fetch_array($result_selectID)) {
                $var_usuario_id=$select_id_usuario[0];
                //echo 'variable del usuario guardada id'.$var_usuario_id;
            }
            
            $query_profesor = "INSERT INTO profesor
                            (nombre,apellido,fecha_nac,direccion,num_telef,localidad_id,sexo_id,usuario_id,foto) 
                            VALUES ('$nombre','$apellido','$fecha_nac','$direccion',
                            '$num_telef','$select_loc','$select_sex','$var_usuario_id','$foto')";
            $result_profesor =  mysqli_query($conexion,$query_profesor);
            //codigo foto
            move_uploaded_file($_FILES['foto']['tmp_name'],'../pHpUA/album/'.$foto);
            if ( $result_profesor) {
               //echo'Q$query_profesor correcto  ';
               echo ('SE REGISTRO CORRECTAMENTE');
               
            }else {
                echo ('ERROR, INTENTE NUEVAMENTE');
                //echo ("INSERT INTO profesor 
                //(nombre,apellido,fecha_nac,direccion,num_telef,localidad_id,sexo_id,usuario_id,foto) 
               //VALUES ('$nombre','$apellido','$fecha_nac','$direccion',
                //'$num_telf','$select_loc','$select_sex','$var_usuario_id','$foto')");
            }
        }else{
            echo 'ERROR DE BASE DE DATOS' ;
        }
    }else{
        echo 'ERROR DE BASE DE DATOS';
        //echo "INSERT INTO usuario (alias,contraseña,rol_id) VALUES ('$alias','$contraseña','$select_rol') " ;
    }
}else{
    echo 'YA EXISTE ESTE ALIAS, INTENTE CON OTR0!';
}
?>