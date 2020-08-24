
        <?php
        include('../database.php');
        $id= $_GET['id'];
        
        $query = "SELECT * FROM `pago` inner join alumno on alumno_id=id_alumno INNER JOIN actividad on actividad_id=id_actividad WHERE id_pago=$id";
        $result =  mysqli_query($conexion,$query);

        while ($select=mysqli_fetch_array($result)) {
            $var_fecha_p=$select[5];
            $var_nombre_alumno=$select[7];
            $var_nombre_apellido=$select[8];
            $var_nombre_actividad=$select[17];
            $var_costo=$select[20];
            $var_resto=$select[4];
            $var_id=$select[0];
            $var_fecha_v=$select[3];
            //echo 'variable del usuario guardada id'.$var_usuario_id;
        }
        
        ?>
    
    <!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
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
    <body>
        <div class="text-center">
            <img src="./img-sistema/bod.jpg" class="rounded " style="height: 70px;" alt="...">
        </div>
            <h3 class="titulo bg-dark text-white text-center">Gimnasio Bodyfit</h3>
            
            <h6 class="float-right" >
               Fecha de Pago: 
            <small class="text-muted"><?php echo $var_fecha_p;?> </small>
            </h6>
            <br>
            <h6 >
               ID Ticket: 
            <small class="text-muted"><?php echo $var_id;?> </small>
            </h6>
            
            <h6>
                Socio/Alumno: 
            <small class="text-muted"><?php echo $var_nombre_alumno.' ';?><?php echo $var_nombre_apellido;?> </small>
            </h6>
            <h6>
                El ticket corresponde a la Actividad: 
            <small class="text-muted"><?php echo $var_nombre_actividad;?> </small>
            </h6>
            <h6>
                Costo de la Actividad: 
            <small class="text-muted"><?php echo '$ '. $var_costo;?> </small>
            </h6>
            <h6>
                Resto a Pagar: 
            <small class="text-muted"><?php echo '$ '. $var_resto;?> </small>
            </h6>
            <h6>
                Este Ticket corresponde hasta: 
            <small class="text-muted"><?php echo $var_fecha_v;?> </small>
            </h6>
           

        
    </body>
</html>
<?php
        
?>