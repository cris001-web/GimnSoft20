$(document).ready(function () {
    // agrega un input para cada columna
    $('#dataTableUC thead tr ').clone(true).appendTo( '#dataTableUC thead' );
    $('#dataTableUC thead tr:eq(1) th').each( function (i) {
		var title = $(this).text();
		if (i==7) {
			
			$(this).html( '<input type="text" placeholder=" Buscar " style="display:none;" />' );
		} else {
			$(this).html( '<input type="text" placeholder=" Buscar  " />' );	
		}
        
		//hacemos consulta
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    });
    

    var table =$('#dataTableUC').DataTable({
    	orderCellsTop: true,
		fixedHeader: true,
		"ajax":{
			"url":"../phpUC/listar.php",
            "dataSrc":"",
        },
            "columns":[
                {"data":"id_actividad"},
                {"data":"nombreAc"},
                {"data":"dias"},
                {"data":"horario"},
                {"data":"costo"},
                {"data":"profesor_id"},
                {"data":"nombre"},
                {"defaultContent":"<button type='button' class='borrar btn btn-danger mb-2 ' data-toggle='modal' data-target='#modalBorrarUC'><i class='icon far fa-trash-alt'></i>Eliminar</button><button type='button' class='editar btn btn-warning ' data-toggle='modal' data-target='#modalEditarUC'><i class='icon fas fa-user-edit '></i>Editar</button>"},
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
                    
                },
                "columnDefs": [
                    {
                        "targets": [ 5 ],
                        "visible": false,
                        "searchable": false
                    },
                    
                ]
    });
    //recarga pagina
	setInterval(function(){
        table.ajax.reload(null,false);
    },1000);
    editar("#dataTableUC tbody", table);
    borrar("#dataTableUC tbody", table);
     //nuevo
	$('#frmnuevoUC').submit(function(e){
		
		e.preventDefault();
		
		const postData = {
            nombreAc: $('#nombreAc').val(),
            profesor_id: $('#profesor_id').val(),
            dias: $('#dias').val(),
            horario: $('#horario').val(),
            costo: $('#costo').val()
		};
		$.post('../phpUC/agregar-UC.php',postData,function(respuesta){
			if(respuesta=='YA EXISTE ESTA ACTIVIDAD, INTENTE CON OTRA!'){
				alertify.error(respuesta);
			}else if(respuesta=='ERROR DE BASE DE DATOS'){
				alertify.error(respuesta);
			}else if(respuesta=='SE AGREGÓ EXITOSAMENTE!'){
				alertify.success(respuesta);
				$("#modalNuevoUC").modal('hide');
			}
			$('#frmnuevoUC').trigger('reset');
		})
    });
    
    //editar post
	$("#frmeditarUC").submit(function(e){
		
        e.preventDefault();
            const postData = {
                id_actividad:$('#id_actividadE').val(),
                nombreAc: $('#nombreAcE').val(),
                profesor_id: $('#profesor_idE').val(),
                dias: $('#diasE').val(),
                horario: $('#horarioE').val(),
                costo: $('#costoE').val()
            };
        
            $.post('../phpUC/editar-UC.php', postData,function(respuesta) {
                console.log(respuesta);
                    if(respuesta=='ERROR EN LA BASE DE DATOS'){
                        alertify.error(respuesta);
                    }else if(respuesta=='YA EXISTE ESTA ACTIVIDAD, INTENTE CON OTRA!'){
                        alertify.error(respuesta);
                    }else if(respuesta=='1SE EDITÓ EXITOSAMENTE!'){
                        alertify.success('SE EDITÓ EXITOSAMENTE!');
                        $("#modalEditarUC").modal('hide');
    
                    }
        
                $('#frmeditarUC').trigger('reset');
            });
    });

    //borrar post
	$("#frmborrarUC").submit(function(e){
		
		e.preventDefault();
			const postData = {
				id_actividad:$('#id_actividadB').val()
			};
		
			$.post('../phpUC/borrar-UC.php', postData,function(respuesta) {
				console.log(respuesta);
					if(respuesta=='ERROR EN LA BASE DE DATOS'){
						alertify.error(respuesta);
					}else if(respuesta=='ERROR, INTENTE NUEVAMENTE'){
						alertify.error(respuesta);
					}else if(respuesta=='1SE BORRÓ EXITOSAMENTE'){
						alertify.success('SE BORRÓ EXITOSAMENTE!');
						$("#modalBorrarUC").modal('hide');
	
					}
                    $('#frmborrarUC').trigger('reset')
				
			});
	});
});

 //editar mostrar campo
 var editar = function(tbody,table){
    $(tbody).on("click","button.editar",function(){
        var data = table.row($(this).parents("tr")).data();
        console.log(data);
        
        $("#id_actividadE").val(data.id_actividad);
        $("#nombreAcE").val(data.nombreAc);
        $("#diasE").val(data.dias);
        $("#horarioE").val(data.horario);
        $("#costoE").val(data.costo);
        $("#costoE").val(data.costo);
        $('#profesor_idE').append('<option value="'+Object.values([data.profesor_id])+'" selected="selected">'+Object.values([data.nombre])+'</option>');

    }); 

}
 //borrar mostrar campo
 var borrar = function(tbody,table){
    $(tbody).on("click","button.borrar",function(){
        var data = table.row($(this).parents("tr")).data();
        console.log(data);
        
        $("#id_actividadB").val(data.id_actividad);
        

    }); 

}