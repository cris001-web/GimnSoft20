 
$(document).ready(function () {
	listarTodo();//llamo a funcion para listar apenas recargue

	//Listar todo desde boton listar del buscador
	$(document).on('click', '#btnListar', function(){
		listarTodo();
		
	});

	// buscar
	$('#search').keyup(function(e){
		
		let search = $('#search').val();
			$.ajax({
				url:'php/buscar-rol.php',
				type:'POST',
				data:{search},
				success: function(response){
					console.log(response);
					let datos = JSON.parse(response);
					plantilla = '';
					datos.forEach(dato =>{
						plantilla += `<tr>
						<td class="idRol">${dato.id_rol}</td>
						<td>${dato.descripcion}</td>
						<td>
							<button class="rol-borrar btn btn-danger">Eliminar</button>
						</td>
						</tr>`
					});
					$('#rol-result').html(plantilla);
				}
			});
	})

	// // funcion listar todos los resultados
	// function listarTodo(){
	// 	$.ajax({
	// 		url:'php/listarRol.php',
	// 		type:'GET',
	// 		success: function (response){
	// 			let datos = JSON.parse(response);
	// 			plantilla = '';
	// 			datos.forEach(dato =>{
	// 				plantilla += `
	// 				<tr idRol="${dato.id_rol}" > 
	// 					<td >${dato.id_rol}</td>
	// 					<td>${dato.descripcion}</td>
						
	// 					<td>
	// 						<button class=" rol-borrar btn btn-danger">Eliminar</button>
	// 						<button class=" rol-editar btn btn-warning" data-toggle="modal" data-target="#modalEditar">Editar</button>
	// 					</td>
	// 				</tr>`
	// 			});
	// 			$('#rol-result').html(plantilla);
	// 		}
	// 	});
	// }

	//nuevo
	$('#nuevo').submit(function(e){
		const postDato = {
			descripcion: $('#descripcion').val(),
		};
		$.post('php/agregar-rol.php',postDato,function(respuesta){
			if(respuesta=='YA EXISTE ESTE DESCRIPCIÓN, INTENTE CON OTRA!'){
				alertify.error(respuesta);
			}else if(respuesta=='ERROR DE BASE DE DATOS'){
				alertify.error(respuesta);
			}else if(respuesta=='SE AGREGO EXITOSAMENTE!'){
				alertify.success(respuesta);
			}
		
			listarTodo();
			$('#nuevo').trigger('reset');
		})
		e.preventDefault();
		
	});

	//borrar
	$(document).on('click','.rol-borrar',function(){
		if(confirm('¿Estas seguro de eliminar este registro?')){
			let elemento = $(this)[0].parentElement.parentElement;
			let id_rol = $(elemento).attr('idRol');
			$.post('php/borrar-rol.php',{id_rol},function(respuesta){
				console.log(respuesta);
				if(respuesta=='ERROR, BASE DE DATOS '){
					alertify.error(respuesta);
				}else if(respuesta=='ERROR, INTENTE NUEVAMENTE'){
					alertify.error(respuesta);
				}else if(respuesta=='1SE BORRO EXITOSAMENTE'){
					alertify.success('SE BORRO EXITOSAMENTE');

				}
				listarTodo();
			});
		}
	});
		
	//carga los inputs para mostrar
	$(document).on('click','.rol-editar',function(){
		var elemento = $(this)[0].parentElement.parentElement;
		var id_rol = $(elemento).attr('idRol');
		$.post('php/rol-solo.php',{id_rol},function(respuesta){
			var datoRe = JSON.parse(respuesta);
			console.log(respuesta);
		
			
			$('#descripcione').val(datoRe.descripcion);
			$('#id_role').val(datoRe.id_rol);
			
		});
		
	});	


	
	//editar
	$('#editar').submit(function(e){
		const postData = {
			
			descripcion: $('#descripcione').val(),
			id_rol: $('#id_role').val()
		};
		
		$.post('php/editar-rol.php', postData,function(respuesta) {
			console.log(respuesta);
				if(respuesta=='ERROR EN LA BASE DE DATOS'){
					alertify.error(respuesta);
				}else if(respuesta=='YA EXISTE ESTA DESCRIPCIÓN, INTENTE CON OTRA!'){
					alertify.error(respuesta);
				}else if(respuesta=='1SE EDITO EXITOSAMENTE!'){
					alertify.success('SE EDITO EXITOSAMENTE!');

				}
			listarTodo();
			$('#editar').trigger('reset');
		});
		e.preventDefault();
		
	});

	
});