 
$(document).ready(function () {
	// listarTodo();//llamo a funcion para listar apenas recargue
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