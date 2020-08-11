$(document).ready(function(){
    // agrega un input para cada columna
    $('#dataTableIP thead tr ').clone(true).appendTo( '#dataTableIP thead' );
    $('#dataTableIP thead tr:eq(1) th').each( function (i) {
		var title = $(this).text();
		if (i==8) {
			
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
    

    var table =$('#dataTableIP').DataTable({
    	orderCellsTop: true,
		fixedHeader: true,
		"ajax":{
			"url":"../phpIP/listar.php",
            "dataSrc":"",
        },
            "columns":[
                {"data":"id_pago"},
                {"data":"alumno_id"},
                {"data":"nombre"},
                {"data":"actividad_id"},
                {"data":"nombreAc"},
                {"data":"fecha_vencimiento"},
                {"data":"resto"},
                {"data":"fecha_pago"},
                {"defaultContent":"<button type='button' class='borrar btn btn-danger mb-2 ' data-toggle='modal' data-target='#modalBorrarIP'><i class='icon far fa-trash-alt'></i>Eliminar</button><button type='button' class='editar btn btn-warning ' data-toggle='modal' data-target='#modalEditarIP'><i class='icon fas fa-user-edit '></i>Editar</button>"},
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
                        "targets": [ 1 ],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [ 3 ],
                        "visible": false,
                        "searchable": false
                    }
                ]
    });
    editar("#dataTableIP tbody", table);
    borrar("#dataTableIP tbody", table);
     //nuevo
	$('#frmnuevoIP').submit(function(e){
		
		e.preventDefault();
		
		const postData = {
            alumno_id: $('#alumno_id').val(),
            actividad_id: $('#actividad_id').val(),
            fecha_vencimiento: $('#fecha_vencimiento').val(),
            fecha_pago: $('#fecha_pago').val(),
            resto: $('#resto').val()
		};
		$.post('../phpIP/agregar-IP.php',postData,function(respuesta){
            console.log(respuesta);
			if(respuesta=='YA EXISTE EL MISMO PAGO'){
			    alertify.error(respuesta);
			}else if(respuesta=='ERROR DE BASE DE DATOS'){
			    alertify.error(respuesta);
			}else if(respuesta=='EL PAGO SE HIZO EXITOSAMENTE'){
			    alertify.success(respuesta);
			$("#modalNuevoIP").modal('hide');
			}
			$('#frmnuevoIP').trigger('reset');
		})
    });

    //editar post
	$("#frmeditarIP").submit(function(e){
		
        e.preventDefault();
            const postData = {
                id_pago:$('#id_pagoE').val(),
                alumno_id: $('#alumno_idE').val(),
                actividad_id: $('#actividad_idE').val(),
                fecha_vencimiento: $('#fecha_vencimientoE').val(),
                fecha_pago: $('#fecha_pagoE').val(),
                resto: $('#restoE').val()
            };
        
            $.post('../phpIP/editar-IP.php', postData,function(respuesta) {
                console.log(respuesta);
                    if(respuesta=='ERROR EN LA BASE DE DATOS'){
                        alertify.error(respuesta);
                    }else if(respuesta=='YA EXISTE ESTE PAGO, INTENTE CON OTRO'){
                        alertify.error(respuesta);
                    }else if(respuesta=='1SE EDITÓ EXITOSAMENTE!'){
                        alertify.success('SE EDITÓ EXITOSAMENTE!');
                       $("#modalEditarIP").modal('hide');
    
                    }
        
                $('#frmeditarIP').trigger('reset');
            });
    });
    //borrar post
	$("#frmborrarIP").submit(function(e){
		
		e.preventDefault();
			const postData = {
				id_pago:$('#id_pagoB').val()
			};
		
			$.post('../phpIP/borrar-IP.php', postData,function(respuesta) {
				console.log(respuesta);
					if(respuesta=='ERROR EN LA BASE DE DATOS'){
						alertify.error(respuesta);
					}else if(respuesta=='ERROR, INTENTE NUEVAMENTE'){
						alertify.error(respuesta);
					}else if(respuesta=='1SE BORRÓ EXITOSAMENTE'){
						alertify.success('SE BORRÓ EXITOSAMENTE!');
						$("#modalBorrarIP").modal('hide');
	
					}
                    $('#frmborrarIP').trigger('reset')
				
			});
	});
    
});

 //editar mostrar campo
 var editar = function(tbody,table){
    $(tbody).on("click","button.editar",function(){
        var data = table.row($(this).parents("tr")).data();
        alert(Object.values([data.fecha_pago]));
        $("#id_pagoE").val(data.id_pago);
        $('#alumno_idE').append('<option value="'+Object.values([data.alumno_id])+'" selected="selected">'+Object.values([data.nombre])+'</option>');
        $('#actividad_idE').append('<option value="'+Object.values([data.actividad_id])+'" selected="selected">'+Object.values([data.nombreAc])+'</option>');
        $("#fecha_vencimientoE").val(data.fecha_vencimiento);
        $("#fecha_pagoE").val(data.fecha_pago);
        $("#restoE").val(data.resto);
     

    }); 
 
}
//borrar mostrar campo
var borrar = function(tbody,table){
    $(tbody).on("click","button.borrar",function(){
        var data = table.row($(this).parents("tr")).data();
        console.log(data);
        
        $("#id_pagoB").val(data.id_pago);
}); 
}