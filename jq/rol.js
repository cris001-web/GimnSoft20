 
$(document).ready(function () {
	//datable
	var table =$('#dataTabler').DataTable({
    	
		"ajax":{
			"url":"php/listarRol.php",
			"dataSrc":""
		},
		"columns":[
		{"data":"id_rol"},
		{"data":"descripcion"},
		{"defaultContent":"<button type='button' class='borrar btn btn-danger ' data-toggle='modal' data-target='#modalBorrar'><i class='icon far fa-trash-alt'></i>Eliminar</button><button type='button' class='editar btn btn-warning ' data-toggle='modal' data-target='#modalEditar'><i class='icon fas fa-user-edit '></i>Editar</button>"}
		
		],
		"language":{
			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst":    "Primero",
				"sLast":     "Último",
				"sNext":     "Siguiente",
				"sPrevious": "Anterior",
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente",
			},
			"buttons": {
				"copy": "Copiar",
				"colvis": "Visibilidad",
			}
		}
			
			

});
	
	//recarga pagina
	 setInterval(function(){
	 	table.ajax.reload(null,false);
	},1000);
	editar("#dataTabler tbody", table);
	borrar("#dataTabler tbody", table);
	//editar post
	$("#frmeditar").submit(function(e){
		
	e.preventDefault();
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
					$("#modalEditar").modal('hide');

				}
	
			$('#frmeditar').trigger('reset');
		});
	});	


	//borrar post
	$("#frmborrar").submit(function(e){
		
		e.preventDefault();
			const postData = {
				id_rol: $('#id_rolel').val()
			};
		
			$.post('php/borrar-rol.php', postData,function(respuesta) {
				console.log(respuesta);
					if(respuesta=='ERROR EN LA BASE DE DATOS'){
						alertify.error(respuesta);
					}else if(respuesta=='ERROR, INTENTE NUEVAMENTE'){
						alertify.error(respuesta);
					}else if(respuesta=='1SE BORRO EXITOSAMENTE'){
						alertify.success('SE BORRO EXITOSAMENTE!');
						$("#modalBorrar").modal('hide');
	
					}
		
				
			});
		});	
	 //nuevo
	$('#frmnuevo').submit(function(e){
		$('#frmnuevo').trigger('reset');
		e.preventDefault();
		
		const postData = {
			descripcion: $('#descripcion').val(),
		};
		$.post('php/agregar-rol.php',postData,function(respuesta){
			if(respuesta=='YA EXISTE ESTE DESCRIPCIÓN, INTENTE CON OTRA!'){
				alertify.error(respuesta);
			}else if(respuesta=='ERROR DE BASE DE DATOS'){
				alertify.error(respuesta);
			}else if(respuesta=='SE AGREGO EXITOSAMENTE!'){
				alertify.success(respuesta);
				$("#modalNuevo").modal('hide');
			}
			$('#frmnuevo').trigger('reset');
		})
		
		
	});
   

});


	
		

	//editar
	var editar = function(tbody, table){
		$(tbody).on("click","button.editar",function(){
			var data = table.row($(this).parents("tr")).data();
			var id_rol = $("#id_role").val(data.id_rol);
			var	descripcion = $("#descripcione").val(data.descripcion);
			console.table(data);

		});
	}

	//borrar
	var borrar = function(tbody, table){
		$(tbody).on("click","button.borrar",function(){
			var data = table.row($(this).parents("tr")).data();
			var id_rol = $("#id_rolel").val(data.id_rol);
			console.table(data);

		});
	}
