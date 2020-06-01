<!DOCTYPE html>
<html>
    <head>
        <title>Usuario-Alumno</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script type="text/javascript" src="../librerias/bootstrap4/js/jquery-3.5.1.min.js"></script> 
    <script type="text/javascript" src="../jq/user-alumno.js"></script>

       <!-- bootstrap js -->
    
    <script type="text/javascript"   src="../librerias/DataTables/jquery.dataTables.min.js"></script>
    <script type="text/javascript"   src="../librerias/DataTables/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript"   src="../librerias/bootstrap4/js/bootstrap.min.js"></script>

        <!-- bootstrap css -->
    <link rel="stylesheet" href="../librerias/bootstrap4/css/bootstrap.min.css"></link>
    <link rel="stylesheet" href="../librerias/DataTables/bootstrap.css"></link>
    <link rel="stylesheet" href="../librerias/DataTables/dataTables.bootstrap4.min.css"></link>
    <link rel="stylesheet" href="../estilos/style-gral.css"></link>

     <!-- fontawesone -->
	<link rel="stylesheet" type="text/css" href="../librerias/fontawesome/fontawesome/css/all.min.css">   
    </head>
    <body>
           
</html>
<body>
    <!-- tabla -->
	
	<div class="container my-4">
        <div class="my-2">
            <button class="btn btn-primary my-2 my-sm-0" type="submit" data-toggle="modal" data-target="#modalNuevoUA" m-3 ><i class="icon fas fa-user-plus">Nuevo</i></button>
        </div>

        <table class=" table table-striped table-bordered"  id="dataTableU"  width="100%">

            <thead class="thead-dark">
                <tr>
                    
                    <th scope="col">#</th>
                    <th scope="col">Alias</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Localidad</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Opciones</th>

                </tr>
            </thead>
            
        </table>
    </div>
    <!-- BODY MODALS -->
				<!-- Modal nuevo -->
	<div class="modal" tabindex="-1" role="dialog" id="modalNuevoUA" >
		<div class="modal-dialog modal-lg" role="document">
		  <div class="modal-content">
			<div class="head-new modal-header">
			  <h5 class="modal-title "><i class="icon fas fa-user-plus"></i>Agregar un Nuevo Rol</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<div class="modal-body">
			    <form id="frmnuevoUA">
                    <div class="form-row">
                        <div class="col-4">
                          <label class="alias">Alias</label>  
                          <input type="text" class="form-control" name="alias" placeholder="Alias" id="alias">
                          <!-- <div id="campos">
                        </div> -->
                        <div class="col-4">
                            <label class="contraseña">Contraseña</label>  
                            <input type="password" class="form-control" placeholder="Contraseña" id="contraseña">
                        </div>
                        <div class="col-4">
                            <label class="foto">foto</label>  
                            <input type="file" name="foto" id="foto" accept="image/jpeg"></input>
                        </div>
                        
                    </div>
                    <hr w-70>
                     <div class="form-row">
                        <div class="col-4">
                            <label class="nombre">Nombre</label>  
                            <input type="text" class="form-control" placeholder="Nombre" id="nombre">
                        </div>
                        <div class="col-4">
                            <label class="apellido">Apellido</label>  
                            <input type="text" class="form-control" placeholder="Apellido" id="apellido">
                        </div>
                        <div class="col-4">
                            <label class="fecha_nac">Fecha de Nacimiento</label>  
                            <input type="date" class="form-control" placeholder="Fecha de Nacimiento" id="fecha_nac">
                        </div>
                    </div>
					<div class="form-row">
                        <div class="col-4">
                            <label class="direccion">Dirección</label>  
                            <input type="text" class="form-control" placeholder="Dirección" id="direccion">
                        </div>
                        <div class="col-4">
                            <label class="num_telf">N° de Telefono</label>  
                            <input type="text" class="form-control" placeholder="N° de Telefono" id="num_telf">
                        </div>
                        <div class="col-4">
                            <label class="localidad">Localidad</label>
                            <select class="custom-select mr-sm-2" id="select_loc" >
                                <option>Elegir Localidad</option>
                                <?php
                               
                                    include('../database.php');
                                    $query = "SELECT * FROM localidad";
                                    $result =  mysqli_query($conexion,$query); 

                                    while ($row = mysqli_fetch_array($result)) {
                                        $id_localidad=$row['id_localidad'];
                                        $descripcion_loc=$row['descripcion_loc'];
                                ?>
                                        <option value='<?php echo $id_localidad; ?>'><?php echo $descripcion_loc;?></option>
                                <?php
                                    }
                                ?>
                         

                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6">
                            <label class="sexo">Sexo</label>
                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                <option selected>Elegir Sexo</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="rol">Rol</label>
                            <select class="custom-select mr-sm-2" id="ninlineFormCustomSelect">
                                <option selected>Elegir Rol</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="col-12">
                                <label class="objetivo">Objetivo</label>
                                <textarea class="form-control" placeholder="Objetivo">

                                </textarea>
                            </div>
                        </div>
                    </div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" >GUARDAR</button>
					</div>
				</form>
			</div>
					
		  </div>
		</div>
	  </div>
</body>
