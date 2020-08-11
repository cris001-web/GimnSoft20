<?php
error_reporting(E_ALL ^ E_NOTICE);//no mostrar notice o warnning
include('../database.php');
$id_usuario = $_GET["id_usuarioE"];
$alias = $_GET["aliasE"];
$contraseña=$_GET["contraseñaE"];
$rol_id=$_GET["select_rolE"];
$foto_pre=$_FILES['fotoUE'];
    //si foto viene vacia pongo foto de perfil x default
    if($foto_pre==null){
        $fotoUE='perfil.jpg';
    }else{
        $fotoUE= date('Y-m-d').date('H-i-s').'.jpg';
    }

    $query_repetir = "SELECT * FROM usuario WHERE alias='$alias' AND id_usuario != '$id_usuario'";
        
    $result_repetir =  mysqli_query($conexion,$query_repetir);
    $cant_row= mysqli_num_rows($result_repetir);

    if($result_repetir==true & $cant_row==0){
        $query_usuario = "UPDATE usuario SET alias='$alias', contraseña='$contraseña',rol_id='$rol_id',fotoU='$fotoUE' WHERE id_usuario='$id_usuario'";
        $result_usuario =  mysqli_query($conexion,$query_usuario);
        //codigo foto
        move_uploaded_file($_FILES['fotoUE']['tmp_name'],'../phpUA/album/'.$fotoUE);
        if ($result_usuario) {
            echo "SE EDITÓ CORRECTAMENTE";
        } else {
            echo "ERROR EN LA BASE DE DATOS";
           // echo "1UPDATE usuario SET alias='$alias', contraseña='$contraseña',rol_id='$select_rol',fotoU='$fotoUE'" ;
        }
        
    }else if($cant_row>0){
        echo "YA EXISTE ESTE ALIAS, INTENTE CON OTRO!";
        //echo "SELECT * FROM usuario WHERE alias='$alias' AND id_usuario != '$id_usuario'" ;
    }else{
        echo "ERROR EN LA BASE DE DATOS";
       // echo "2UPDATE usuario SET alias='$alias', contraseña='$contraseña',rol_id='$select_rol',fotoU='$fotoUE'" ;
    }
?>