<?php
error_reporting(E_ALL ^ E_NOTICE);//no mostrar notice o warnning
include('../database.php');

$alias = $_GET["alias"];
$contraseña = $_GET["contraseña"];
$select_rol=$_GET["select_rol"];
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
    
    if($result_repetir==true & $cant_row==0){
         

        $query_usuario = "INSERT INTO usuario (alias,contraseña,rol_id,fotoU) VALUES ('$alias','$contraseña','$select_rol','$fotoU')";
        $result_usuario =  mysqli_query($conexion,$query_usuario);
        //codigo foto
        move_uploaded_file($_FILES['fotoU']['tmp_name'],'../phpUA/album/'.$fotoU);
        if ($result_usuario) {
            echo "SE REGISTRÓ CORRECTAMENTE";
        } else {
            echo "ERROR EN LA BASE DE DATOS";
            //echo "INSERT INTO usuario (alias,contraseña,rol_id,fotoU) VALUES ('$alias','$contraseña','$select_rol','$fotoU')" ;
        }
        
    }else if($cant_row>0){
        echo "YA EXISTE ESTE ALIAS, INTENTE CON OTRO!";
        //echo "SELECT * FROM usuario WHERE alias='$alias'" ;
    }else{
        echo "ERROR EN LA BASE DE DATOS";
        //echo "INSERT INTO usuario (alias,contraseña,rol_id,foto) VALUES ('$alias','$contraseña','$select_rol','$fotoU')" ;
    }
?>