<html>
    <head>
        <title>Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <!-- jquery -->    
        <script type="text/javascript" src="../librerias/bootstrap4/js/jquery-3.5.1.min.js"></script> 

       
        
        <!-- datatable js -->
        <script type="text/javascript"   src="../librerias/DataTables/jquery.dataTables.min.js"></script>
        <script type="text/javascript"   src="../librerias/DataTables/dataTables.bootstrap4.min.js"></script>
        

        <!-- alertify -->
        <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/alertify.css">
        <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/themes/default.css"> 
        <script src="../librerias/alertifyjs/alertify.js"></script>

        <!-- bootstrap js -->
        <script type="text/javascript"   src="../librerias/bootstrap4/js/bootstrap.min.js"></script>

       
        <!-- bootstrap datatable css -->
        <link rel="stylesheet" href="../librerias/DataTables/bootstrap.css"></link>
        <link rel="stylesheet" href="../librerias/DataTables/dataTables.bootstrap4.min.css"></link>

        <!-- bootstrap css -->
        <link rel="stylesheet" href="../librerias/bootstrap4/css/bootstrap.min.css"></link>

        

        <!-- CSS -->
        <link rel="stylesheet" href="../estilos/style-gral.css"></link>
        <link rel="stylesheet" type="text/css" href="../estilos/style_menu.css">

        <!--toastr-->
        <link rel="stylesheet" href="../librerias/toastr/toastr.min.css">

        <!-- fontawesone -->
        <link rel="stylesheet" type="text/css" href="../librerias/fontawesome/fontawesome/css/all.min.css"> 
        
        <!-- js -->
        <script type="text/javascript"  src="../jq/menu.js"></script>
        
        
        <script src="../validaciones/validar-UA.js"></script>
        <script type="text/javascript" src="../jq/alumno-carnet.js"></script>
    </head>
    <body>
            <!-- tabla -->
	
	<div class="container my-4">
        <!-- FORM PARA ENVIAR ID DEL PAGO, PDF -->
        <form method="GET" action="../crearPDFTicket.php">
                <input type="hidden" class="form-control"  id="id" name="id" class=" btnFile btn btn-secondary" placeholder="Resto">
               
                
                <div style="position: relative; margin-top: 4px;margin-bottom:12px">
                    <button class="btn btn-primary  mt-2 " type="submit" name="generar_pdf" id="generar_pdf"  style="margin-top:25px; display:none;"><i class="far fa-id-card"> Ver Carnet</i></button>
                </div>
                    
        </form> 
        <!-- FORM PARA ENVIAR ID DEL PAGO, PDF -->
        <table class=" table table-striped table-bordered"  id="dataTableALCA"  width="100%">

            <thead class="thead-dark">
                <tr>
                    
                    <th scope="col">#</th>
                    <th scope="col">Alias</th>
                    <th scope="col">id_alumno</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Fecha de Nacimiento</th>
                    <th scope="col">Localidad</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Contraseña</th>
                    <th scope="col">Objetivo</th>
                    <th scope="col">foto</th>
                    <th scope="col">Opciones</th>

                </tr>
            </thead>
            
        </table>
    </div>
    <!-- tabla -->
    <!--toastr-->
    <script type="text/javascript" src="../librerias/toastr/toastr.min.js"></script>  
    </body>
</html>