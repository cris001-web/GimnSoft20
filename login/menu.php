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
				$query = "(SELECT foto FROM usuario INNER JOIN alumno ON id_usuario=usuario_id WHERE alias='$alias') UNION (SELECT foto FROM usuario INNER JOIN profesor ON id_usuario=usuario_id WHERE alias='$alias') ";
				$result =  mysqli_query($conexion,$query);

				$cant_row= mysqli_num_rows($result);
				while($row = mysqli_fetch_array($result)){
					if($cant_row==1){
						$foto=$row['foto'];
					}else{
						echo 'no';
					}
					
				}
					
				
				?>
				<img src= "../phpUA/album/<?php echo $foto; ?>"  width="50" height="50" style="border-radius: 50px;">
				<a href="../login/cerrar-sesion.php" >Cerrar Sesión</a>
			  </span>
			</div>
		</nav>
		<nav class="navegacion">
			
			<ul class="menu ">
				<li class="title-menu">Categorias</li>

				<li><a href="#"><span class="fa fa-home icon-menu"></span>Inicio</a></li>

				<li class="item-submenu" menu="1">
					<a href="#"><span class="fa fa-plus icon-menu" ></span> Agregar</a>
					<ul class="submenu" >
						<li class="title-menu"><span class="fa fa-plus icon-menu" ></span> Agregar</li>
						<li class="go-back">Atras</li>
						<li><a href="http://localhost/gimnsoft/formularios/user-alumno.php">Cliente</a></li>
						<li><a href="http://localhost/gimnsoftware/formulariosRoles/insert.php">Rol</a></li>
						<li><a href="#">Actividad</a></li>
					</ul>
				</li>
				
				

				

				<li class="item-submenu" menu="2">
					<a href="#"><span class="fa fa-plus icon-menu" ></span> Listar</a>
					<ul class="submenu" >
						<li class="title-menu"><span class="fa fa-plus icon-menu" ></span>Listar</li>
						<li class="go-back">Atras</li>
						<li><a href="http://localhost/gimnsoftware/formulariosUsuarios/listar_usuario.php">Cliente</a></li>
						<li><a href="http://localhost/gimnsoftware/formulariosRoles/listar.php">Rol</a></li>
						<li><a href="#">Actividad</a></li>
					</ul>
				</li>	
				</li>
			</ul>
		</nav>
	</header>
	
<!-- </body>
</html> -->