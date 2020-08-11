<!-- <!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../estilos/style_menu.css">-->
	<!-- fontawesone -->
	<!-- <link rel="stylesheet" type="text/css" href="../librerias/fontawesome/fontawesome/css/all.min.css">  -->
	<!-- bootstrap css -->
	<!-- <link rel="stylesheet" href="../librerias/bootstrap4/css/bootstrap.min.css"></link> -->

	<!-- <script type="text/javascript" src="../librerias/bootstrap4/js/jquery-3.5.1.min.js"></script> 

	<script type="text/javascript"  src="../jq/menu.js"></script>
	
	 
</head>

<body> --> 
	<header>
		
		<nav class="navbar navbar-expand-lg navbar-light ">
			<span id="button-menu" class="fa fa-bars" aria-hidden="true" ></span>
			<div class="collapse navbar-collapse" id="navbarText">
			  
			  <span class="navbar-text ml-auto text-white">
				<?php 
				//recibo variable session de login 
				$descripcion = $_SESSION['descripcion'];
				$alias = $_SESSION['alias'];
				echo $descripcion.': ';
				echo $alias.' ';

				//query buscador foto
				include('../database.php');
				$query = "SELECT fotoU FROM `usuario` WHERE alias='$alias'";
				$result =  mysqli_query($conexion,$query);

				$cant_row= mysqli_num_rows($result);
				while($row = mysqli_fetch_array($result)){
					if($cant_row==1){
						$foto=$row['fotoU'];
					}else{
						echo 'no';
					}
					
				}
					
				
				?>
				<img src= "../phpUA/album/<?php echo $foto; ?>"  width="50" height="50" style="border-radius: 50px;">
				
				<button class="btn btn-outline-primary ml-2">
					<a class="fas fa-sign-in-alt text-white" href="../login/cerrar-sesion.php" >  Cerrar Sesión</a>
				</button>
				
			  </span>
			</div>
		</nav>
		<nav class="navegacion">
			
			<ul class="menu " style="overflow-y: scroll;" >
				<li class="title-menu">Categorias</li>

				<li><a href="#"><span class="fa fa-home icon-menu"></span>Inicio</a></li>
				<li class="item-submenu" menu="0">
					<a href="http://localhost/gimnsoft/formularios/rol.php"><span class="fas fa-user-tag icon-menu" ></span>Roles</a>
					<!-- <ul class="submenu" >
						<li class="title-menu"><span class="fa fa-plus icon-menu" ></span>Listar</li>
						<li class="go-back">Atras</li>
						<li><a href="http://localhost/gimnsoftware/formulariosUsuarios/listar_usuario.php">Cliente</a></li>
						<li><a href="http://localhost/gimnsoftware/formulariosRoles/listar.php">Rol</a></li>
						<li><a href="#">Actividad</a></li>
					</ul> -->
				</li>
				<li class="item-submenu" menu="1">
					<a href="http://localhost/gimnsoft/formularios/user-alumno.php"><span class="fas fa-users icon-menu" ></span>Alumno</a>
					<!-- <ul class="submenu" >
						<li class="title-menu"><span class="fa fa-plus icon-menu" ></span> Agregar</li>
						<li class="go-back">Atras</li>
						<li><a href="http://localhost/gimnsoft/formularios/user-alumno.php">Cliente</a></li>
						<li><a href="http://localhost/gimnsoftware/formulariosRoles/insert.php">Rol</a></li>
						<li><a href="#">Actividad</a></li>
					</ul> -->
				</li>
				
				<li class="item-submenu" menu="2">
					<a href="http://localhost/gimnsoft/formularios/user-profesor.php"><span class="fas fa-chalkboard-teacher icon-menu" ></span>Profesor</a>
					<!-- <ul class="submenu" >
						<li class="title-menu"><span class="fa fa-plus icon-menu" ></span>Listar</li>
						<li class="go-back">Atras</li>
						<li><a href="http://localhost/gimnsoftware/formulariosUsuarios/listar_usuario.php">Cliente</a></li>
						<li><a href="http://localhost/gimnsoftware/formulariosRoles/listar.php">Rol</a></li>
						<li><a href="#">Actividad</a></li>
					</ul> -->
				</li>
				<li class="item-submenu" menu="2">
					<a href="http://localhost/gimnsoft/formularios/user-profesor.php"><span class="fas fa-stopwatch icon-menu" ></span>Cronometro</a>
					<!-- <ul class="submenu" >
						<li class="title-menu"><span class="fa fa-plus icon-menu" ></span>Listar</li>
						<li class="go-back">Atras</li>
						<li><a href="http://localhost/gimnsoftware/formulariosUsuarios/listar_usuario.php">Cliente</a></li>
						<li><a href="http://localhost/gimnsoftware/formulariosRoles/listar.php">Rol</a></li>
						<li><a href="#">Actividad</a></li>
					</ul> -->
				</li>

				<li class="item-submenu" menu="2">
					<a href="http://localhost/gimnsoft/formularios/user-profesor.php"><span class="fa fa-plus icon-menu" ></span>Estadisticas</a>
					<!-- <ul class="submenu" >
						<li class="title-menu"><span class="fa fa-plus icon-menu" ></span>Listar</li>
						<li class="go-back">Atras</li>
						<li><a href="http://localhost/gimnsoftware/formulariosUsuarios/listar_usuario.php">Cliente</a></li>
						<li><a href="http://localhost/gimnsoftware/formulariosRoles/listar.php">Rol</a></li>
						<li><a href="#">Actividad</a></li>
					</ul> -->
				</li>

				
			</ul>
		</nav>
	</header>
	
<!-- </body>
</html> -->