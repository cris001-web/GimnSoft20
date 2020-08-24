<!-- <?php
session_start();
if ($_SESSION['descripcion']=='Administrador' ||  $_SESSION['descripcion']=='Super Admin'  ) {
	
?> -->


<!DOCTYPE html>
<html>

<head>

	<title>Roles</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!-- jquery -->
	<script type="text/javascript" src="../librerias/bootstrap4/js/jquery-3.5.1.min.js"></script> 
	<!-- datatable js -->
	<script type="text/javascript"   src="../librerias/DataTables/jquery.dataTables.min.js"></script>
	<script type="text/javascript"   src="../librerias/DataTables/dataTables.bootstrap4.min.js"></script>
	

	<!-- <script type="text/javascript"   src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript"   src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> -->
	
	<!-- alertify -->
	<link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/themes/default.css"> 
    <script src="../librerias/alertifyjs/alertify.js"></script>
	
	<!-- bootstrap js -->
	<script type="text/javascript"   src="../librerias/bootstrap4/js/bootstrap.min.js"></script>

	<!-- bootstrap css -->
	<link rel="stylesheet" href="../librerias/bootstrap4/css/bootstrap.min.css"></link>
	
	<!-- bootstrap datatable css -->
	<link rel="stylesheet" href="../librerias/DataTables/bootstrap.css"></link>
	<link rel="stylesheet" href="../librerias/DataTables/dataTables.bootstrap4.min.css"></link>
	<!-- <link rel="stylesheet" href="../librerias/DataTables/fixedHeader.dataTables.min.css"></link> -->

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"></link>
	

	<!-- bootstrap css -->
	<link rel="stylesheet" href="../librerias/bootstrap4/css/bootstrap.min.css"></link>
	
	<!-- CSS -->
	<link rel="stylesheet" href="../estilos/style-gral.css"></link>
	<link rel="stylesheet" type="text/css" href="../estilos/style_menu.css">
	<!-- fontawesone -->
	<link rel="stylesheet" type="text/css" href="../librerias/fontawesome/fontawesome/css/all.min.css">
	


	<script type="text/javascript"  src="../jq/menu.js"></script>
	<script src="../validaciones/rol/validar-rol.js"></script>
	<script type="text/javascript" src="../jq/rol.js"></script>
	
	
		
</head>

<body>
	<?php include_once('../login/menu.php'); ?>
	<!-- tabla -->
	
	<div class="container my-4">
			<div class="my-2">
				<button class="btn btn-primary my-2 my-sm-0" type="submit" data-toggle="modal" data-target="#modalNuevo" m-3 ><i class="icon fas fa-user-plus">Nuevo</i></button>
			</div>

			<table class=" table table-striped table-bordered"  id="dataTabler"  width="100%">

				<thead class="thead-dark">
					<tr>
						
						<th scope="col" class="p">#</th>
						<th scope="col">Nombre</th>
						<th scope="col">Opciones</th> 


					</tr>
				</thead>
				
			</table>
	</div>

	<!-- BODY MODALS -->
				<!-- Modal nuevo -->
	<div class="modal" tabindex="-1" role="dialog" id="modalNuevo">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="head-new modal-header">
			  <h5 class="modal-title "><i class="icon fas fa-user-plus"></i>Agregar un Nuevo Rol</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<div class="modal-body">
			    <form id="frmnuevo">
					<div class="form-group">
						<label class="descripcion">Ingrese Descripción del Rol</label>
						<input type="text" class="form-control" id="descripcion" placeholder="Ingrese Descripción del Rol"></input>

					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" onclick="return validar();">GUARDAR</button>
						</div>
				</form>
			</div>
					
		  </div>
		</div>
	</div>

	  <!-- Modal Editar -->
	<div class="modal" tabindex="-1" role="dialog" id="modalEditar">
		<div class="modal-dialog" role="document">
		    <div class="modal-content">
				<form id="frmeditar">
					<div class=" head-edit modal-header">
					<h5 class="modal-title "><i class='icon fas fa-user-edit'></i>Editar Rol</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" >
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_role"></input>
							<div class="form-group">
								<label class="descripcion">Ingrese Descripción del Rol</label>
								<input type="text" class="form-control" id="descripcione" placeholder="Ingrese Descripción del Rol"></input>
							</div>
							
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
								<button type="submit" class="btn btn-primary" onclick="return validarEditar();">Editar</button>
							</div>
				</form>
					</div>
			</div>
					
		</div>
	</div>

		 <!-- Modal Borrar -->
		<div class="modal" tabindex="-1" role="dialog" id="modalBorrar">
			<div class="modal-dialog" role="document">
			    <div class="modal-content">
					<div class=" head-delete modal-header">
					<h5 class="modal-title "><i class='icon far fa-trash-alt'></i>Eliminar Rol</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" >
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
						<form id="frmborrar">
							<div class="form-group">
								<input type="hidden" id="id_rolel"></input>
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
<!-- <?php
}else if($_SESSION['rol']==''){
	echo'no';
	die();
}
?> -->