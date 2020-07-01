<?php
error_reporting(E_ALL ^ E_NOTICE);//no mostrar notice o warnning
include('../database.php');
$id_usuario = $_GET["id_usuarioE"];
$alias = $_GET["aliasE"];
$apellido = $_GET["apellidoE"];
$localidad_id = $_GET["select_locE"];
$contraseña=$_GET["contraseñaE"];
$nombre=$_GET["nombreE"];
$apellido=$_GET["apellidoE"];
$direccion=$_GET["direccionE"];
$num_telf=$_GET["num_telfE"];
$localidad_id=$_GET["select_locE"];
$sexo_id=$_GET["select_sexE"];
$rol_id=$_GET["select_rolE"];
$objetivo=$_GET["objetivoE"];
$fecha_nac=$_GET["fecha_nacE"];
$foto_pre=$_FILES['fotoE'];
    //si foto viene vacia pongo foto de perfil x default
    if($foto_pre==null){
        $foto='perfil.jpg';
    }else{
        $foto= date('Y-m-d').date('H-i-s').'.jpg';
    }

$objetivo=$_GET["objetivoE"];

        
        $query_repetir = "SELECT * FROM usuario WHERE alias='$alias' AND id_usuario != '$id_usuario'";
        
        $result_repetir =  mysqli_query($conexion,$query_repetir);

        $cant_row= mysqli_num_rows($result_repetir);
        

        if($cant_row==0){
            $query_usuario_update = "UPDATE usuario SET alias = '$alias', contraseña = '$contraseña', rol_id='$rol_id'  WHERE id_usuario = '$id_usuario'";
            $result_usuario_update= mysqli_query($conexion,$query_usuario_update);
            //si query usuario es correcto, preparo query alumno
            if($result_usuario_update){
              
                $query_alumno_update="UPDATE alumno SET nombre = '$nombre', apellido = '$apellido',fecha_nac='$fecha_nac',objetivo='$objetivo',direccion='$direccion',num_telf='$num_telf',localidad_id='$localidad_id',sexo_id='2', usuario_id='$id_usuario',foto='$foto'  WHERE usuario_id = '$id_usuario'"; 
                $result_alumno_update= mysqli_query($conexion,$query_alumno_update);
                 //codigo foto
                 move_uploaded_file($_FILES['fotoE']['tmp_name'],'album/'.$foto);
                    if($result_alumno_update){
                        echo 'SE EDITÓ CORRECTAMENTE';
                    }else{
                        echo 'ERROR EN LA BASE DE DATOS';
                        
                    }


            }else{
                echo 'ERROR EN LA BASE DE DATOS';
            }
        }else{
            echo 'YA EXISTE EL ALIAS, INTENTE CON OTRO!';
        }
    
   
?>