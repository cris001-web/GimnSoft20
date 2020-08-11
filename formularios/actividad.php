<!DOCTYPE html>
<html>
    <head>
        <title>ACTIVIDAD</title>

    <head>
    <body>
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
        <script  src="../validaciones/validar-UC.js"></script>
        <script type="text/javascript" src="../jq/actividad.js"></script>
        
    </body>

    <!-- tabla -->
	
	<div class="container my-4">
        <div class="my-2">
            <button class="btn btn-primary my-2 my-sm-0" type="submit" data-toggle="modal" data-target="#modalNuevoUC" m-3 ><i class="icon fas fa-user-plus">Nuevo</i></button>
        </div>

        <table class=" table table-striped table-bordered"  id="dataTableUC"  width="100%">

            <thead class="thead-dark">
                <tr>
                    
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Dias</th>
                    <th scope="col">Horarios</th>
                    <th scope="col">Costo</th>
                    <th scope="col">Profe a Cargo id</th>
                    <th scope="col">Profe a Cargo </th>
                    <th scope="col">Opciones</th>

                </tr>
            </thead>
            
        </table>
    </div>
    <!-- tabla -->

    <!-- Modal nuevo -->
	<div class="modal" tabindex="-1" role="dialog" id="modalNuevoUC" >
		<div class="modal-dialog modal-lg" role="document">
		  <div class="modal-content">
			<div class="head-new modal-header">
			  <h5 class="modal-title "><i class="icon fas fa-user-plus"></i>Agregar Nueva Actividad</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<div class="modal-body">
			    <form id="frmnuevoUC">
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
                    <div class="form-row">
                        <div class="col-6">
                        
                          <label class="nombreAc">Nombre de la Actividad</label>  
                          <input type="text" class="form-control" name="nombreAc" placeholder="Nombre de la Actividad" id="nombreAc">
                        </div> 
                        <div class="col-6">
                            <label class="profesor_id">Nombre del Profesor</label>  
                                <select class="custom-select mr-sm-2" name="profesor_id" id="profesor_id">
                                    <option value="" selected >Elegir Profesor</option>
                                    <?php
                                    
                                    include('../database.php');
                                    $query = "SELECT * FROM profesor";
                                    $result =  mysqli_query($conexion,$query); 

                                    while ($row = mysqli_fetch_array($result)) {
                                        $id_profesor=$row['id_profesor'];
                                        $nombreP=$row['nombreP'];
                                    ?>
                                        <option value='<?php echo $id_profesor; ?>'><?php echo $nombreP;?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                        </div>
                    </div>
                    <hr w-70>
                    <div class="form-row">
                        <div class="col-4">
                            <label class="dias">Dias</label>  
                            <input type="text" class="form-control" placeholder="Dias" name="dias" id="dias" >
                        </div>
                        <div class="col-4">
                            <label class="horario">Horarios</label>  
                            <input type="text" class="form-control" name="horario"  placeholder="Horarios"  id="horario">
                        </div>
                        <div class="col-4">
                            <label class="costo">Costo</label>  
                            <input type="text" class="form-control" placeholder="Costo" name="costo"  id="costo">
                        </div>
                    </div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" onclick="return validarUC();" >GUARDAR</button>
					</div>
				</form>
			</div>
					
		  </div>
		</div>
    </div>
    <!-- Modal nuevo -->

    <!-- Modal Editar -->
	<div class="modal" tabindex="-1" role="dialog" id="modalEditarUC" >
		<div class="modal-dialog modal-lg" role="document">
		  <div class="modal-content">
			<div class="head-edit modal-header">
			  <h5 class="modal-title "><i class="icon fas fa-user-edit"></i>Editar Actividad</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<div class="modal-body">
			    <form id="frmeditarUC">
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
                    <div class="form-row">
                        <input type="hidden" id="id_actividadE" name="id_actividadE"></input>
                        
                        <div class="col-6">
                          <label class="nombreAc">Nombre de la Actividad</label>  
                          <input type="text" class="form-control" name="nombreAcE" placeholder="Nombre de la Actividad" id="nombreAcE">
                        </div> 
                        <div class="col-6">
                            <label class="profesor_id">Nombre del Profesor</label>  
                                <select class="custom-select mr-sm-2" name="profesor_idE" id="profesor_idE">
                                    <option value="" selected >Elegir Profesor</option>
                                    <?php
                                    
                                    include('../database.php');
                                    $query = "SELECT * FROM profesor";
                                    $result =  mysqli_query($conexion,$query); 

                                    while ($row = mysqli_fetch_array($result)) {
                                        $id_profesor=$row['id_profesor'];
                                        $nombre=$row['nombre'];
                                    ?>
                                        <option value='<?php echo $id_profesor; ?>'><?php echo $nombre;?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                        </div>
                    </div>
                    <hr w-70>
                    <div class="form-row">
                        <div class="col-4">
                            <label class="dias">Dias</label>  
                            <input type="text" class="form-control" placeholder="Dias" name="diasE" id="diasE" >
                        </div>
                        <div class="col-4">
                            <label class="horario">Horarios</label>  
                            <input type="text" class="form-control" name="horarioE"  placeholder="Horarios"  id="horarioE">
                        </div>
                        <div class="col-4">
                            <label class="costo">Costo</label>  
                            <input type="text" class="form-control" placeholder="Costo" name="costoE"  id="costoE">
                        </div>
                    </div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-warning" >EDITAR</button>
					</div>
				</form>
			</div>
					
		  </div>
		</div>
    </div>
    <!-- Modal Editar -->

    <!-- Modal Borrar -->
		<div class="modal" tabindex="-1" role="dialog" id="modalBorrarUC">
			<div class="modal-dialog" role="document">
			    <div class="modal-content">
					<div class=" head-delete modal-header">
					<h5 class="modal-title "><i class='icon far fa-trash-alt'></i>Eliminar Actividad</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" >
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
						<form id="frmborrarUC">
							<div class="form-group">
								<input type="text" id="id_actividadB" name="id_actividadB"></input>
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
    <!-- Modal Borrar -->
<html>