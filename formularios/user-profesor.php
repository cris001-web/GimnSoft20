<?php
session_start();
if ($_SESSION['descripcion']=='Administrador' ||  $_SESSION['descripcion']=='Super Administrador' ) {
	
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Usuario-Alumno</title>
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
        
        
    <script src="../validaciones/validar-UP.js"></script>
    <script type="text/javascript" src="../jq/user-profesor.js"></script>
    </head>
    <body>
           
</html>
<body>
<?php include_once('../login/menu.php'); ?>
    <!-- tabla -->
	
	<div class="container my-4">
        <div class="my-2">
            <button class="btn btn-primary my-2 my-sm-0" type="submit" data-toggle="modal" data-target="#modalNuevoUP" m-3 ><i class="icon fas fa-user-plus">Nuevo</i></button>
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

    <!-- BODY MODALS -->
				<!-- Modal nuevo -->
	<div class="modal" tabindex="-1" role="dialog" id="modalNuevoUP" >
		<div class="modal-dialog modal-lg" role="document">
		  <div class="modal-content">
			<div class="head-new modal-header">
			  <h5 class="modal-title "><i class="icon fas fa-user-plus"></i>Agregar Profesor</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<div class="modal-body">
			    <form id="frmnuevoUP">
                    <!--MENMSAJES  -->
                    <div  class='msj 'style="display:none;">
                        <span style="color: red;">EL CAMPO ESTA VACÍO</span>
                    </div>
                    <div class='msj1' style="display:none;">
                        <span style="color: red;">NO SE PERMITEN NÚMEROS</span> 
                    </div>
                    <div class='msj2' style="display:none;">
                        <span style="color: red;">NO SE PERMITEN LETRAS</span> 
                    </div>
                    <!--MENMSAJES  -->
                    <div class="form-row">
                        <div class="col-4">
                        
                          <label class="alias">Alias</label>  
                          <input type="text" class="form-control" name="alias" placeholder="Alias" id="alias">
                        </div> 
                        <div class="col-4">
                            <label class="contraseña">Contraseña</label>  
                            <input type="text" class="form-control" placeholder="Contraseña" name="contraseña" id="contraseña">
                        </div>
                        <div class="col-4">
                            <label class="foto">foto</label>  
                            
                                <input type="file" id="fotoU" name="fotoU" class=" btnFile btn btn-secondary"   ></input>
                         
                           
                        </div>
                        
                    </div>
                    <hr w-70>
                     <div class="form-row">
                        <div class="col-4">
                            <label class="nombre">Nombre</label>  
                            <input type="text" class="form-control" placeholder="Nombre" name="nombreP" id="nombreP" >
                        </div>
                        <div class="col-4">
                            <label class="apellido">Apellido</label>  
                            <input type="text" class="form-control" name="apellido"  placeholder="Apellido"  id="apellido">
                        </div>
                        <div class="col-4">
                            <label class="fecha_nac">Fecha de Nacimiento</label>  
                            <input type="date" class="form-control" placeholder="Fecha de Nacimiento" name="fecha_nac"  id="fecha_nac">
                        </div>
                    </div>
					<div class="form-row">
                        <div class="col-4">
                            <label class="direccion">Dirección</label>  
                            <input type="text" class="form-control" placeholder="Dirección" name="direccion"  id="direccion">
                        </div>
                        <div class="col-4">
                            <label class="num_telf">N° de Telefono</label>  
                            <input type="text" class="form-control" placeholder="N° de Telefono" name="num_telf" id="num_telf">
                        </div>
                        <div class="col-4">
                            <label class="localidad">Localidad</label>
                            <select class="custom-select mr-sm-2" name="select_loc" id="select_loc" >
                                
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
                            <select class="custom-select mr-sm-2" name="select_sex" id="select_sex">
                            <option value="" selected >Elegir Genero</option>
                            <?php
                              
                               include('../database.php');
                               $query = "SELECT * FROM sexo";
                               $result =  mysqli_query($conexion,$query); 

                               while ($row = mysqli_fetch_array($result)) {
                                   $id_sexo=$row['id_sexo'];
                                   $descripcion_sex=$row['descripcion_sex'];
                           ?>
                                   <option value='<?php echo $id_sexo; ?>'><?php echo $descripcion_sex;?></option>
                           <?php
                               }
                           ?>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="rol">Rol</label>
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
                        
                    </div>
                    
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" onclick="return validarUP();" >GUARDAR</button>
					</div>
				</form>
			</div>
					
		  </div>
		</div>
    </div>

                                  <!-- ModalEditar -->

    <div class="modal" tabindex="-1" role="dialog" id="modalEditarUP" >
		<div class="modal-dialog modal-lg" role="document">
		  <div class="modal-content">
			<div class=" head-edit modal-header">
            <h5 class="modal-title "><i class='icon fas fa-user-edit'></i>Editar Usuario-Alumno</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<div class="modal-body">
			    <form id="frmEditarUP">
                    <!--MENMSAJES  -->
                    <div  class='msj 'style="display:none;">
                        <span style="color: red;">EL CAMPO ESTA VACÍO</span>
                    </div>
                    <div class='msj1' style="display:none;">
                        <span style="color: red;">NO SE PERMITEN NÚMEROS</span> 
                    </div>
                    <div class='msj2' style="display:none;">
                        <span style="color: red;">NO SE PERMITEN LETRAS</span> 
                    </div>
                    <!--MENMSAJES  -->
                    <div class="form-row">

                        <input type="hidden" name="id_usuarioE" id="id_usuarioE">
                        <div class="col-4">
                        
                          <label class="alias">Alias</label>  
                          <input type="text" class="form-control" name="aliasE" placeholder="Alias" id="aliasE">
                        </div> 
                        <div class="col-4">
                            <label class="contraseña">Contraseña</label>  
                            <input type="password" class="form-control" placeholder="Contraseña" name="contraseñaE" id="contraseñaE"><div class="input-group-append">
                            <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                            </div>
                            
                        </div>
                        <div class="col-4">
                            <label class="foto">foto</label>  
                            
                                <input type="file" id="fotoUE" name="fotoUE" class=" btnFile btn btn-secondary"></input>
                        </div>
                        
                    </div>
                    <hr w-70>
                     <div class="form-row">
                        <div class="col-4">
                            <label class="nombreP">Nombre</label>  
                            <input type="text" class="form-control" placeholder="Nombre" name="nombrePE" id="nombrePE" >
                        </div>
                        <div class="col-4">
                            <label class="apellido">Apellido</label>  
                            <input type="text" class="form-control" name="apellidoE"  placeholder="Apellido"  id="apellidoE">
                        </div>
                        <div class="col-4">
                            <label class="fecha_nac">Fecha de Nacimiento</label>  
                            <input type="date" class="form-control" placeholder="Fecha de Nacimiento" name="fecha_nacE"  id="fecha_nacE">
                        </div>
                    </div>
					<div class="form-row">
                        <div class="col-4">
                            <label class="direccion">Dirección</label>  
                            <input type="text" class="form-control" placeholder="Dirección" name="direccionE"  id="direccionE">
                        </div>
                        <div class="col-4">
                            <label class="num_telf">N° de Telefono</label>  
                            <input type="text" class="form-control" placeholder="N° de Telefono" name="num_telfE" id="num_telfE">
                        </div>
                        <div class="col-4">
                            <label class="localidad">Localidad</label>
                            
                            <select class="custom-select mr-sm-2" name="select_locE" id="select_locE" >
                            
                          
                            
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
                            <select class="custom-select mr-sm-2" name="select_sexE" id="select_sexE">
                           
                            
                            <?php
                              
                               include('../database.php');
                               $query = "SELECT * FROM sexo";
                               $result =  mysqli_query($conexion,$query); 

                               while ($row = mysqli_fetch_array($result)) {
                                   $id_sexo=$row['id_sexo'];
                                   $descripcion_sex=$row['descripcion_sex'];
                           ?>
                                   <option value='<?php echo $id_sexo; ?>'><?php echo $descripcion_sex;?></option>
                           <?php
                               }
                           ?>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="rol">Rol</label>
                            <select class="custom-select mr-sm-2" name="select_rolE" id="select_rolE">
                            
                            
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
                        
                    </div>
                   
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-warning" onclick="return validarUPedit();">EDITAR</button>
					</div>


				</form>
			</div>
					
		  </div>
		</div>
    </div>

        <!-- Modal Borrar -->
	<div class="modal" tabindex="-1" role="dialog" id="modalBorrarUP">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
                <div class=" head-delete modal-header">
                    <h5 class="modal-title "><i class='icon far fa-trash-alt'></i>Eliminar Usuario-Profesor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                    </button>
                
            </div>
			<div class="modal-body">
				<form id="frmborrarUP">
					<div class="form-group">
                        <input type="hidden" name="id_usuarioB" id="id_usuarioB"></input>
                        <input type="hidden" name="id_profesorB" id="id_profesorB"></input>
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
<?php
}else{
	header('Location: ../login/index.html');
	die();
}
?>