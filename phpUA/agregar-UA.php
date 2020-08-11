<?php
error_reporting(E_ALL ^ E_NOTICE);//no mostrar notice o warnning
include('../database.php');
$alias = $_GET["alias"];
$apellido = $_GET["apellido"];
$id_loc = $_GET["select_loc"];
$contraseña=$_GET["contraseña"];
$nombre=$_GET["nombre"];
$apellido=$_GET["apellido"];
$direccion=$_GET["direccion"];
$num_telf=$_GET["num_telf"];
$select_loc=$_GET["select_loc"];
$select_sex=$_GET["select_sex"];
$select_rol=$_GET["select_rol"];
$objetivo=$_GET["objetivo"];
$fecha_nac=$_GET["fecha_nac"];
$foto_pre=$_FILES['fotoU'];
    //si foto viene vacia pongo foto de perfil x default
    if($foto_pre==null){
        $fotoU='perfil.jpg';
    }else{
        $fotoU= date('Y-m-d').date('H-i-s').'.jpg';
    }





    //verifico que no este repetido el alias
    $query_repetir = "SELECT * FROM usuario WHERE alias='$alias'";
    $result_repetir =  mysqli_query($conexion,$query_repetir);
    $cant_row= mysqli_num_rows($result_repetir);

    if($cant_row==0){
        $query_usuario = "INSERT INTO usuario (alias,contraseña,rol_id,fotoU) VALUES ('$alias','$contraseña','$select_rol','$fotoU')";
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
               
                $query_alumno = "INSERT INTO alumno 
                            (nombre,apellido,fecha_nac,objetivo,direccion,num_telf,localidad_id,sexo_id,usuario_id) 
                            VALUES ('$nombre','$apellido','$fecha_nac','$objetivo','$direccion',
                            '$num_telf','$select_loc','$select_sex','$var_usuario_id')";
                $result_alumno =  mysqli_query($conexion,$query_alumno);
                //codigo foto
                move_uploaded_file($_FILES['fotoU']['tmp_name'],'album/'.$fotoU);
                if ( $result_alumno) {
                   //echo'query_alumno correcto  ';
                   echo ('SE REGISTRÓ CORRECTAMENTE');
                   
                }else {
                    echo ('ERROR, INTENTE NUEVAMENTE');
                }
            }else{
                echo 'ERROR DE BASE DE DATOS' ;
            }
            
        }else{
            echo 'ERROR DE BASE DE DATOS' ;
        }
    }else{
        echo 'YA EXISTE ESTE ALIAS, INTENTE CON OTRO!';
    }
?>