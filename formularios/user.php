<DOCTTYPE html>
<html>
    <head>
        <title>Usuario</title>
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

        <!-- fontawesone -->
        <link rel="stylesheet" type="text/css" href="../librerias/fontawesome/fontawesome/css/all.min.css"> 
        
        <!-- js -->
        <script type="text/javascript"  src="../jq/menu.js"></script>
        <script type="text/javascript" src="../jq/user.js"></script>
        <script src="../validaciones/validar-US.js"></script>
    </head>

    <body>
    
	<!-- tabla -->
	
	<div class="container my-4">
			<div class="my-2">
				<button class="btn btn-primary my-2 my-sm-0 " style="height: 40px;" type="submit" data-toggle="modal" data-target="#modalNuevoUS"  ><i class="icon fas fa-user-plus">Nuevo</i></button>
			</div>

			<table class=" table table-striped table-bordered"  id="dataTableUS"  width="100%">

				<thead class="thead-dark">
					<tr>
						
						<th scope="col">#</th>
						<th scope="col">Alias</th>
						<th scope="col">Contraseña</th> 
                        <th scope="col">Rol</th> 
                        <th scope="col">Foto</th> 
                        <th scope="col">Opciones</th> 
					</tr>
				</thead>
				
			</table>
    </div>
    
    <!-- BODY MODALS -->
				<!-- Modal nuevo -->
	<div class="modal" tabindex="-1" role="dialog" id="modalNuevoUS">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="head-new modal-header">
			  <h5 class="modal-title "><i class="icon fas fa-user-plus"></i>Agregar un Nuevo Rol</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<div class="modal-body">
			    <form id="frmnuevoUS">

                    <!--MENMSAJES  -->
                    <div  class='msj 'style="display:none;">
                        <span style="color: red;">EL CAMPO ESTA VACÍO</span>
                    </div>
                    <div class='msj1' style="display:none;">
                        <span style="color: red;">NO SE PERMITEN NÚMEROS</span> 
                    </div>
                    <div class='msj2' style="display:none;">
                        <span style="color: red;">NO SE PERMITEN NÚMEROS</span> 
                    </div>
                    <!--MENMSAJES  -->

					<div class="form-group">
						<label >Alias</label>
						<input type="text" class="form-control" id="alias" name="alias" placeholder="Alias"></input>

					</div>
					<div class="form-group">
						<label >Contraseña</label>
						<input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Contraseña"></input>

                    </div>
                    <div class="form-group">
                        <select class="custom-select mr-sm-2" name="select_rol" id="select_rol">
                            <option  value="" selected>Elegir Rol</option>
                            <?php
                            
                            include('../database.php');
                            $query = "SELECT * FROM rol";
                            $result =  mysqli_query($conexion,$query); 
    
                            while ($row = mysqli_fetch_array($result)) {
                                $id_rol=$row['id_rol'];
                                $descripcion=$row['descripcion'];
                            ?>
                                <option value='<?php echo $id_rol; ?>'><?php echo $descripcion;?></option>
                            <?php
                            }
                            ?>
                        </select> 
                    </div>
                    <div class="form-group">
                        <label class="foto">foto</label>  
                        <input type="file" id="fotoU" name="fotoU" class=" btnFile btn btn-secondary"></input>
                    </div>
                    
                    
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" onclick="return validarUS();" >GUARDAR</button>
					</div>
				</form>
			</div>
					
		  </div>
		</div>
	</div>

      <!-- Modal Editar -->
        <div class="modal" tabindex="-1" role="dialog" id="modalEditarUS">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    
                        <div class=" head-edit modal-header">
                        <h5 class="modal-title "><i class='icon fas fa-user-edit'></i>Editar Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form id="frmeditarUS">
                                <input type="hidden" id="id_usuarioE" name="id_usuarioE"></input>
                                <!--MENMSAJES  -->
                                <div  class='msj 'style="display:none;">
                                    <span style="color: red;">EL CAMPO ESTA VACÍO</span>
                                </div>
                                <div class='msj1' style="display:none;">
                                    <span style="color: red;">NO SE PERMITEN NÚMEROS</span> 
                                </div>
                                <div class='msj2' style="display:none;">
                                    <span style="color: red;">NO SE PERMITEN NÚMEROS</span> 
                                </div>
                                <!--MENMSAJES  -->
            
                                <div class="form-group">
                                    <label >Alias</label>
                                    <input type="text" class="form-control" id="aliasE" name="aliasE" placeholder="Alias"></input>
            
                                </div>
                                <div class="form-group">
                                    <label >Contraseña</label>
                                    <input type="password" class="form-control" id="contraseñaE" name="contraseñaE" placeholder="Contraseña"></input>
            
                                </div>
                                <div class="form-group">
                                    <select class="custom-select mr-sm-2" id="select_rolE" name="select_rolE" >
                                        <option  value="" selected>Elegir Rol</option>
                                        <?php
                                        
                                        include('../database.php');
                                        $query = "SELECT * FROM rol";
                                        $result =  mysqli_query($conexion,$query); 
                
                                        while ($row = mysqli_fetch_array($result)) {
                                            $id_rol=$row['id_rol'];
                                            $descripcion=$row['descripcion'];
                                        ?>
                                            <option value='<?php echo $id_rol; ?>'><?php echo $descripcion;?></option>
                                        <?php
                                        }
                                        ?>
                                    </select> 
                                </div>
                                <div class="form-group">
                                    <label class="foto">foto</label>
                                    <div id="img"></div>  
                                    <input type="file" id="fotoUE" name="fotoUE" class=" btnFile btn btn-secondary"></input>
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                                    <button type="submit" class="btn btn-primary" onclick="return validarUSedit();">Editar</button>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    
     <!-- Modal Borrar -->
		<div class="modal" tabindex="-1" role="dialog" id="modalBorrarUS">
			<div class="modal-dialog" role="document">
			    <div class="modal-content">
					<div class=" head-delete modal-header">
					<h5 class="modal-title "><i class='icon far fa-trash-alt'></i>Eliminar Usuario</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" >
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
						<form id="frmborrarUS">
							<div class="form-group">
								<input type="text" id="id_usuarioB"></input>
								<label class="descripcion">¿Seguro Que Deseas Eliminar el Registro?</label>
								
		
							</div>
							
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-danger" >Eliminar</button>
							</div>
						</form>
					</div>
						
			    </div>
			</div>
		</div>
   
     
    </body>
</html>