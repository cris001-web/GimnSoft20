$(document).ready(function () {
    // agrega un input para cada columna
    $('#dataTableUA thead tr ').clone(true).appendTo( '#dataTableUA thead' );
    $('#dataTableUA thead tr:eq(1) th').each( function (i) {
		var title = $(this).text();
		if (i==12) {
			
			$(this).html( '<input type="text" placeholder=" Buscar " style="display:none;" />' );
		} else {
			$(this).html( '<input type="text" placeholder=" Buscar " />' );	
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
    var table =$('#dataTableUA').DataTable({
    	orderCellsTop: true,
		fixedHeader: true,
		"ajax":{
			"url":"../phpUA/listar.php",
            "dataSrc":"",
        },
            "columns":[
                {"data":"id_usuario"},
                {"data":"alias"},
                {"data":"id_alumno"},
                {"data":"nombre"},
                {"data":"apellido"},
                {"data":"fecha_nac"},
                {"data":"descripcion_loc"},
                {"data":"descripcion_sex"},
                {"data":"descripcion"},
                {"data":"contraseña"},
                {"data":"objetivo"},
                {
                    "data":"fotoU",
                    "render":function(data,type,row){
                         var url = "../phpUA/album/";
                        return '<center><img src="'+url+"/"+data+'" width="70px" height="70px" /></center>';
                    }
                },
                {"defaultContent":"<button type='button' class='borrar btn btn-danger mb-2 ' data-toggle='modal' data-target='#modalBorrarUA'><i class='icon far fa-trash-alt'></i>Eliminar</button><button type='button' class='editar btn btn-warning ' data-toggle='modal' data-target='#modalEditarUA'><i class='icon fas fa-user-edit '></i>Editar</button>"},
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
                        "targets": [ 2 ],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [ 9 ],
                        "visible": false
                    },
                    {
                        "targets": [ 10 ],
                        "visible": false
                    }
                ]
		
			
    });

    //recarga pagina
	setInterval(function(){
        table.ajax.reload(null,false);
    },1000);

    editar("#dataTableUA tbody", table);
    borrar("#dataTableUA tbody", table);
 

    //nuevo   
    $('#frmnuevoUA').submit(function(e){ 

        
               var formulario = $('#frmnuevoUA');
               var datos = formulario.serialize();
               var archivos = new FormData();
               var url = '../phpUA/agregar-UA.php';
                
                for(var i=0; i < (formulario.find('input[type=file]').length); i++){
                    archivos.append((formulario.find('input[type="file"]:eq('+i+')').attr("name")),((formulario.find('input[type="file"]:eq('+i+')')[0]).files[0]));
                    
                }

                $.ajax({
           
                    url:url+'?'+datos,
                    type:'POST',
                    contentType:false,
                    data:archivos,
                    processData:false,
                  
                   
                    success:function(respuesta){
                       console.log(respuesta);
                       if(respuesta=='SE REGISTRÓ CORRECTAMENTE'){
                        alertify.success(respuesta)

                        $("#modalNuevoUA").modal('hide');
                       }else if (respuesta=='YA EXISTE ESTE ALIAS, INTENTE CON OTRO!'){
                        alertify.error('¡YA EXISTE ESTE ALIAS, INTENTE CON OTRO!')
                        
                       }else if (respuesta=='ERROR EN LA BASE DE DATOS'){
                        alertify.warning(respuesta);

                       }
                       $('#frmnuevoUA').trigger('reset');
                        return false;
                    }
                });
                return false;
    });

            //editar post
            $("#frmEditarUA").submit(function(e){
                e.preventDefault();
                var formulario = $('#frmEditarUA');
                var datos = formulario.serialize();
                var archivos = new FormData();
                var url = '../phpUA/editar-UA.php';

                for(var i=0; i < (formulario.find('input[type=file]').length); i++){
                    archivos.append((formulario.find('input[type="file"]:eq('+i+')').attr("name")),((formulario.find('input[type="file"]:eq('+i+')')[0]).files[0]));
                    
                }

                $.ajax({
           
                    url:url+'?'+datos,
                    type:'POST',
                    contentType:false,
                    data:archivos,
                    processData:false,
                  
                   
                    success:function(respuesta){
                       console.log(respuesta);
                        if(respuesta=='SE EDITÓ CORRECTAMENTE'){
                            alertify.success(respuesta);
                        $("#modalEditarUA").modal('hide');
                        
                        }else if (respuesta=='YA EXISTE EL ALIAS, INTENTE CON OTRO!'){
                            alertify.error('¡YA EXISTE EL ALIAS, INTENTE CON OTRO!');
                        }else if (respuesta=='ERROR EN LA BASE DE DATOS'){
                            alertify.error(respuesta);
                        }
                        $('#frmEditarUA').trigger('reset');
                        return false;
                    }
                   
                    
                
                });
            });
        
        //borrar post
	$("#frmborrarUA").submit(function(e){
		
		e.preventDefault();
			const postData = {
                id_usuario: $('#id_usuarioB').val(),
                id_alumno: $('#id_alumnoB').val()
			};
            
			 $.post('../phpUA/borrar-UA.php', postData,function(respuesta) {
				console.log(respuesta);
					if(respuesta=='ERROR EN LA BASE DE DATOS'){
						alertify.error(respuesta);
					}else if(respuesta=='SE BORRO EXITOSAMENTE'){
						alertify.success('SE BORRÓ EXITOSAMENTE!');
						$("#modalBorrar").modal('hide');
	
					}
                    $('#frmborrarUA').trigger('reset');
				
			});
	});	
    
                   
    
});

 //editar mostrar campo
 var editar = function(tbody,table){
    $(tbody).on("click","button.editar",function(){
        var data = table.row($(this).parents("tr")).data();
        console.log(data);
        
        $("#id_usuarioE").val(data.id_usuario);
        $("#aliasE").val(data.alias);
        $("#contraseñaE").val(data.contraseña);
        $("#nombreE").val(data.nombre);
        $("#apellidoE").val(data.apellido);
        $("#fecha_nacE").val(data.fecha_nac);
        $("#direccionE").val(data.direccion);
        $("#num_telfE").val(data.num_telf);
        
        
        $("#select_locE").val(data.descripcion);
        $("#objetivoE").val(data.objetivo);
        $('#img').html('<img src="../phpUA/album/'+Object.values([data.foto])+'" width="70px" height="70px" />');
        
        $('#select_locE').append('<option value="'+Object.values([data.localidad_id])+'" selected="selected">'+Object.values([data.descripcion_loc])+'</option>'); 
        $('#select_sexE').append('<option value="'+Object.values([data.sex_id])+'" selected="selected">'+Object.values([data.descripcion_sex])+'</option>'); 
        $('#select_rolE').append('<option value="'+Object.values([data.rol_id])+'" selected="selected">'+Object.values([data.descripcion])+'</option>');

    }); 

}
//borrar 
var borrar = function(tbody,table){
    $(tbody).on("click","button.borrar",function(){
        var data = table.row($(this).parents("tr")).data();
        $("#id_usuarioB").val(data.id_usuario);
        $("#id_alumnoB").val(data.id_alumno);
        
    }); 

}

function mostrarPassword(){
    var cambio = document.getElementById("contraseñaE");
    if(cambio.type == "password"){
        cambio.type = "text";
        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
        cambio.type = "password";
        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
} 

