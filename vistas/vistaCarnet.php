<?php
$id= $_GET['id'];
echo $id;
include('../database.php');

        include('../database.php');
        $id= $_GET['id'];
        
        $query = "SELECT * FROM `alumno` INNER JOIN usuario on usuario_id=id_usuario where id_alumno=$id";
        $result =  mysqli_query($conexion,$query);

        while ($select=mysqli_fetch_array($result)) {
            $var_id_alumno=$select[0];
            $var_nombre_alumno=$select[1];
            $var_nombre_apellido=$select[2];
            $var_fecha_nac=$select[3];
            $var_usuario_id=$select[10];
            $var_alias=$select[11];
            $var_foto=$select[14];
            //echo 'variable del usuario guardada id'.$var_usuario_id;
        }
        
    
?>
<html>

    <head>
        <title>Carnet</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <!-- css -->
        <link rel="stylesheet" type="text/css" href="../estilos/style_ticket.css">
        <!-- bootstrap -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"></link> 
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css"></link>

        
        <!-- bootstrap js -->
        <script type="text/javascript"   src="../librerias/bootstrap4/js/bootstrap.min.js"></script>
        
        <!-- fontawesone -->
        <link rel="stylesheet" type="text/css" href="../librerias/fontawesome/fontawesome/css/all.min.css">
    </head>
    <body >
    
        <div class=" col-sm-10 bg-dark text-white" style="margin: 0 auto;border-radius: 5px;height:300px;">
            <div style="border-style: double;border-color: red;position: relative;;top: 12px;height: 270px;" >
                <h3 class="text-center" style="margin-bottom: 40px;">CARNET SOCIO</h3>
                <div >
                    
                    <img src="./phpUA/album/<?php echo $var_foto;?>" class="rounded " style="height: 95px; width: 95px; margin-left: 320px;;border-radius: 300%;margin-top:-40px;" alt="...">
                    
                </div>
                
                <h6 >
                    ID Socio: 
                    <small class="text-white" ><?php echo $var_id_alumno;?></small>
                </h6>
                <h6 >
                    Alias: 
                    <small class="text-white"  ><?php echo $var_alias;?></small>
                </h6>  
                <h6 >
                    Nombre y Apellido: 
                    <small class="text-white" ><?php echo $var_nombre_alumno.' ';?><?php echo $var_nombre_apellido;?> </small>
                </h6>
                <img src="./img-sistema/bod.jpg" style="position: absoluta; margin-left: 125px;margin-bottom: 31px;width: 170px;
                height: 70px;" class="rounded " alt="...">
            </div>
        </div>
    
       
    </body>
    <style>
        
    </style>
</html>