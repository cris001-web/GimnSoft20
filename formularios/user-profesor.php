<?php
session_start();
if ($_SESSION['rol']=='84') {
	
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Usuario-Alumno</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- js -->    
    <script type="text/javascript" src="../librerias/bootstrap4/js/jquery-3.5.1.min.js"></script> 
    <script src="../validaciones/validar-UA.js"></script>
    <script type="text/javascript" src="../jq/user-profesor.js"></script>
      

       <!-- bootstrap js -->
    
    <script type="text/javascript"   src="../librerias/DataTables/jquery.dataTables.min.js"></script>
    <script type="text/javascript"   src="../librerias/DataTables/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript"   src="../librerias/bootstrap4/js/bootstrap.min.js"></script>

        <!-- bootstrap css -->
    <link rel="stylesheet" href="../librerias/bootstrap4/css/bootstrap.min.css"></link>
    <link rel="stylesheet" href="../librerias/DataTables/bootstrap.css"></link>
    <link rel="stylesheet" href="../librerias/DataTables/dataTables.bootstrap4.min.css"></link>
    <!-- CSS -->
    <link rel="stylesheet" href="../estilos/style-gral.css"></link>

       <!-- fontawesone -->
    <link rel="stylesheet" type="text/css" href="../librerias/fontawesome/fontawesome/css/all.min.css"> 
    
      <!-- alertify -->
	<link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/themes/default.css"> 
    <script src="../librerias/alertifyjs/alertify.js"></script>
    </head>
    <body>
           
</html>
<body>

    <!-- tabla -->
	
	<div class="container my-4">
        <div class="my-2">
            <button class="btn btn-primary my-2 my-sm-0" type="submit" data-toggle="modal" data-target="#modalNuevoUA" m-3 ><i class="icon fas fa-user-plus">Nuevo</i></button>
        </div>

        <table class=" table table-striped table-bordered"  id="dataTableUP"  width="100%">

            <thead class="thead-dark">
                <tr>
                    
                    <th scope="col">#</th>
                    <th scope="col">Alias</th>
                    <th scope="col">Contraseña</th>
                    <th scope="col">Rol</th>
                    <th scope="col">id_profesor</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Fecha de Nacimiento</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">N° de Celular</th>
                    <th scope="col">Localidad</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Contraseña</th>
                    <th scope="col">foto</th>
                    <th scope="col">Opciones</th>

                </tr>
            </thead>
            
        </table>
    </div>
    <!-- tabla -->
</body>
</html>
<?php
}else{
	header('Location: ../login/index.html');
	die();
}
?>