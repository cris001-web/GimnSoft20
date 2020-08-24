
<!DOCTYPE html>
<html>
    <head>
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
        <script  src="../validaciones/validar-IP.js"></script>
        <script type="text/javascript" src="../jq/inscripcion-pago.js"></script>
    </head>
    <body>
        
    <!-- tabla -->
	<div class="container my-4">
        <div class="my-2">
            <button class="btn btn-primary my-2 mt-3 my-sm-0" type="submit" data-toggle="modal" data-target="#modalNuevoIP" m-3 ><i class="icon fas fa-user-plus">Nuevo</i></button>
            <br>
            <!-- FORM PARA ENVIAR ID DEL PAGO, PDF -->
            <form method="GET" action="../crearPDFTicket.php">
                <input type="hidden" class="form-control"  id="id" name="id" class=" btnFile btn btn-secondary" placeholder="Resto">
                <input type="hidden" class="form-control"  id="fecha_pagoPDF" name="fecha_pagoPDF" class=" btnFile btn btn-secondary" placeholder="Resto"> 
                
                <div style="position: relative; margin-top: 4px;">
                    <button class="btn btn-success  mt-2 " type="submit" name="generar_pdf" id="generar_pdf"  style="display: none; margin-top:25px;"><i class="fas fa-file-invoice"> Ver Ticket</i></button>
                </div>
                    
            </form> 
            <!-- FORM PARA ENVIAR ID DEL PAGO, PDF -->
        </div>

        <table class=" table table-striped table-bordered"  id="dataTableIP"  width="100%">

            <thead class="thead-dark">
                <tr>
                    
                    <th scope="col">#</th>
                    <th scope="col">Alumno_id</th>
                    <th scope="col">Alumno</th>
                    <th scope="col">Actividad_id</th>
                    <th scope="col">Actividad</th>
                    <th scope="col">Fecha de Vencimiento</th>
                    <th scope="col">Resto</th>
                    <th scope="col">Fecha de Pago</th>
                    <th scope="col" >Opciones</th>

                </tr>
            </thead>
            
        </table>
    </div>
    <!-- tabla -->
     
    			<!-- Modal nuevo -->
        <div class="modal" tabindex="-1" role="dialog" id="modalNuevoIP" >
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="head-new modal-header">
                          <h5 class="modal-title "><i class="icon fas fa-user-plus"></i>Agregar un Nuevo Rol</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form id="frmnuevoIP">
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
                                    <div class="col-6">
                                    
                                       <label class="alumno_id">Alumno</label>  
                                       <select class="custom-select mr-sm-2" name="alumno_id" id="alumno_id">
                                        <option value="" selected >Elegir Alumno</option>
                                            <?php
                                            
                                            include('../database.php');
                                            $query = "SELECT * FROM alumno";
                                            $result =  mysqli_query($conexion,$query); 
                
                                            while ($row = mysqli_fetch_array($result)) {
                                                $id_alumno=$row['id_alumno'];
                                                $nombre=$row['nombre'];
                                        ?>
                                             <option value='<?php echo $id_alumno; ?>'><?php echo $nombre;?></option>   
                                        <?php
                                            }
                                        ?>
                                        </select>
                                    </div> 
                                    <div class="col-6">
                                        <label class="actividad_id">Actividad</label>  
                                        <select class="custom-select mr-sm-2" name="actividad_id" id="actividad_id">
                                        <option value="" selected >Elegir Actividad</option>
                                            <?php
                                            
                                            include('../database.php');
                                            $query = "SELECT * FROM actividad";
                                            $result =  mysqli_query($conexion,$query); 
                
                                            while ($row = mysqli_fetch_array($result)) {
                                                $id_actividad=$row['id_actividad'];
                                                $nombreAc=$row['nombreAc'];
                                        ?>
                                             <option value='<?php echo $id_actividad; ?>'><?php echo $nombreAc;?></option>   
                                        <?php
                                            }
                                        ?>
                                        </select>
                                    </div>
                                    
                                    
                                </div>
                                <hr w-70>
                                 <div class="form-row">
                                    <div class="col-4">
                                        <label class="fecha_vencimiento">Fecha Vencimiento</label>  
                                        <input type="date" class="form-control"  name="fecha_vencimiento" id="fecha_vencimiento" >
                                    </div>
                                    <div class="col-4">
                                        <label class="fecha_pago">Fecha del Pago</label>  
                                        <input type="date" class="form-control" name="fecha_pago" id="fecha_pago">
                                    </div>
                                    <div class="col-4">
                                        <label class="resto">Resto</label> 
                                        <input type="text" class="form-control"  id="resto" name="resto" class=" btnFile btn btn-secondary" placeholder="Resto">
                                    </div>
                                </div>
                                
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary"  onclick="return validarIP();">GUARDAR</button>
                                </div>
                            </form>
                        </div>
                                
                      </div>
                    </div>
        </div>
                <!-- Modal nuevo -->

                <!-- Modal Editar -->
        <div class="modal" tabindex="-1" role="dialog" id="modalEditarIP">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    
                        <div class=" head-edit modal-header">
                        <h5 class="modal-title "><i class='icon fas fa-user-edit'></i>Editar Inscripcion-Pago</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form id="frmeditarIP">
                                <input type="hidden" id="id_usuarioE" name="id_usuarioE"></input>
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
                                    <div class="col-6">
                                        <input type="hidden" id="id_pagoE" name="id_pagoE"></input>
                                       <label class="alumno_idE">Alumno</label>  
                                       <select class="custom-select mr-sm-2" name="alumno_idE" id="alumno_idE">
                                        <option value="" selected >Elegir Alumno</option>
                                            <?php
                                            
                                            include('../database.php');
                                            $query = "SELECT * FROM alumno";
                                            $result =  mysqli_query($conexion,$query); 
                
                                            while ($row = mysqli_fetch_array($result)) {
                                                $id_alumno=$row['id_alumno'];
                                                $nombre=$row['nombre'];
                                        ?>
                                             <option value='<?php echo $id_alumno; ?>'><?php echo $nombre;?></option>   
                                        <?php
                                            }
                                        ?>
                                        </select>
                                    </div> 
                                    <div class="col-6">
                                        <label class="actividad_idE">Actividad</label>  
                                        <select class="custom-select mr-sm-2" name="actividad_idE" id="actividad_idE">
                                        <option value="" selected >Elegir Actividad</option>
                                            <?php
                                            
                                            include('../database.php');
                                            $query = "SELECT * FROM actividad";
                                            $result =  mysqli_query($conexion,$query); 
                
                                            while ($row = mysqli_fetch_array($result)) {
                                                $id_actividad=$row['id_actividad'];
                                                $nombreAc=$row['nombreAc'];
                                        ?>
                                             <option value='<?php echo $id_actividad; ?>'><?php echo $nombreAc;?></option>   
                                        <?php
                                            }
                                        ?>
                                        </select>
                                    </div>
                                    
                                    
                                </div>
                                <hr w-70>
                                 <div class="form-row">
                                    <div class="col-4">
                                        <label class="fecha_vencimientoE">Fecha Vencimiento</label>  
                                        <input type="date" class="form-control"  name="fecha_vencimientoE" id="fecha_vencimientoE" >
                                    </div>
                                    <div class="col-4">
                                        <label class="fecha_pagoE">Fecha del Pago</label>  
                                        <input type="date" class="form-control" name="fecha_pagoE" id="fecha_pagoE">
                                    </div>
                                    <div class="col-4">
                                        <label class="restoE">Resto</label> 
                                        <input type="text" class="form-control"  id="restoE" name="restoE" class=" btnFile btn btn-secondary" placeholder="Resto">
                                    </div>
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                                    <button type="submit" class="btn btn-primary" onclick="return validarIPedit(); " >Editar</button>
                                    
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
               <!-- Modal Editar --> 
               
               <!-- Modal Borrar -->
		<div class="modal" tabindex="-1" role="dialog" id="modalBorrarIP">
			<div class="modal-dialog" role="document">
			    <div class="modal-content">
					<div class=" head-delete modal-header">
					<h5 class="modal-title "><i class='icon far fa-trash-alt'></i>Eliminar Inscripcion-Pago</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" >
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
						<form id="frmborrarIP">
							<div class="form-group">
								<input type="text" id="id_pagoB" name="id_pagoB"></input>
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

                  
    <!--toastr-->
    <script type="text/javascript" src="../librerias/toastr/toastr.min.js"></script>  
    </body>
   
     
</html>