<?php
session_start();
if ($_SESSION['descripcion']=='Administrador' ||  $_SESSION['descripcion']=='Super Administrador'  ) {
	
?>
<!DOCTYPE html>
<html>
    <head>

        <title>MENÚ GENERAL</title>

        <!-- bootstrap css -->
  <link rel="stylesheet" href="../librerias/bootstrap4/css/bootstrap.min.css"></link>
  <link rel="stylesheet" href="../estilos/style-menu-gral.css"></link>
  
  <!-- jquery -->
  <script type="text/javascript" src="../librerias/bootstrap4/js/jquery-3.5.1.min.js"></script> 
  <script type="text/javascript" src="../librerias/popper/popper.min.js"></script> 
  <!-- bootstrap js -->
	<script type="text/javascript"   src="../librerias/bootstrap4/js/bootstrap.min.js"></script>
    </head>

  <body>
    <nav class="navbar navbar-light mb-5" style="background-color:#34495E ;">
      <!-- <div class="collapse navbar-collapse" id="navbarText"> -->
			  
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
			<!-- </div> -->
    </nav> 
    <h2 class="text-center mb-3">BIENVENIDO AL SISTEMA</h2> 
    <div>
      <section class="container-fluid">
        <div class="container">
          <div class="row ">
            <div class="col-sm-6 col-md-4">
              <div class="card" style="width: 18rem;">
                <img src="../img-sistema/papel.png" class="imgCard" alt="Area Roles"">
                <div class="card-body">
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Area Roles
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                      <button class="dropdown-item" type="button">
                        <li><a class="enlace" href="http://localhost/gimnsoft/formularios/rol.php">Listar</a></li>
                      </button>
                      
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
            
            
            <div class="col-sm-6 col-md-4 mb-4">
              <div class="card" style="width: 18rem;">
                <img src="../img-sistema/grupo.png" class="imgCard" alt="..."">
                <div class="card-body">
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Area Alumno
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                      <button class="dropdown-item" type="button">
                        <li><a class="enlace" href="http://localhost/gimnsoft/formularios/user-alumno.php">Listar</a></li>
                      </button>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
            
            
            <div class="col-sm-6 col-md-4 mb-4">
              <div class="card" style="width: 18rem;">
                <img src="../img-sistema/profesor.png" class="imgCard" alt="..."">
                <div class="card-body">
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Area Profesor
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                      <button class="dropdown-item" type="button">
                        <li><a class="enlace" href="http://localhost/gimnsoft/formularios/user-profesor.php">Listar</a></li>
                      </button>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>

            <div class="col-sm-6 col-md-4 mb-4">
              <div class="card" style="width: 18rem;">
                <img src="../img-sistema/velocidad.png" class="imgCard" alt="..."">
                <div class="card-body">
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Cronometro
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                      <button class="dropdown-item" type="button">Action</button>
                      <button class="dropdown-item" type="button">Another action</button>
                      <button class="dropdown-item" type="button">Something else here</button>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
            
            
            <div class="col-sm-6 col-md-4 mb-4">
              <div class="card" style="width: 18rem;">
                <img src="../img-sistema/finanzas.png" class="imgCard" alt="..."">
                <div class="card-body">
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Estadisticas
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                      <button class="dropdown-item" type="button">Action</button>
                      <button class="dropdown-item" type="button">Another action</button>
                      <button class="dropdown-item" type="button">Something else here</button>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
            
            
            <div class="col-sm-6 col-md-4 mb-4">
              <div class="card" style="width: 18rem;">
                <img src="../img-sistema/tarjeta-de-identificacion.png" class="imgCard" alt="..."">
                <div class="card-body">
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Crear Carnet
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                      <button class="dropdown-item" type="button">Action</button>
                      <button class="dropdown-item" type="button">Another action</button>
                      <button class="dropdown-item" type="button">Something else here</button>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
        </div>
      </section>
    </div>
    
       
        
    </body>
</html>
<?php
}else if($_SESSION['rol']==''){
	echo'no';
	die();
}
?>