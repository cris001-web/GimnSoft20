$(document).ready(function () {
    // agrega un input para cada columna
    $('#dataTableUS thead tr ').clone(true).appendTo( '#dataTableUS thead' );
    $('#dataTableUS thead tr:eq(1) th').each( function (i) {
		//var title = $(this).text();
		if (i==4 || i==5 ) {
			
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
    //datable
    var table =$('#dataTableUS').DataTable({
        orderCellsTop: true,
		fixedHeader: true,
        "ajax":{
            "url":"../phpUS/listar-US.php",
            "dataSrc":""
        },
        "columns":[
        {"data":"id_usuario"},
        {"data":"alias"},
        {"data":"contraseña"},
        {"data":"descripcion"},
        
        {
            "data":"fotoU",
            "render":function(data,type,row){
                 var url = "../phpUA/album/";
                return '<center><img src="'+url+"/"+data+'" width="70px" height="70px" /></center>';
            }
        },
        {"defaultContent":"<button type='button' class='borrar btn btn-danger ' data-toggle='modal' data-target='#modalBorrarUS'><i class='icon far fa-trash-alt'></i>Eliminar</button><button type='button' class='editar btn btn-warning mt-3' data-toggle='modal' data-target='#modalEditarUS'><i class='icon fas fa-user-edit '></i>Editar</button>"}
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
    });

    //recarga pagina
	setInterval(function(){
         table.ajax.reload(null,false);
    },1000);
    editar("#dataTableUS tbody", table);
    borrar("#dataTableUS tbody", table);
    //nuevo   
    $('#frmnuevoUS').submit(function(e){ 

        e.preventDefault();
        var formulario = $('#frmnuevoUS');
        var datos = formulario.serialize();
        var archivos = new FormData();
        var url = '../phpUS/agregar-US.php';
         
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
                toastr["success"]("SE REGISTRÓ CORRECTAMENTE");
                $("#modalNuevoUS").modal('hide');
                }else if (respuesta=='YA EXISTE ESTE ALIAS, INTENTE CON OTRO!'){
                toastr["error"]("YA EXISTE ESTE ALIAS, INTENTE CON OTRO!");
                }else if (respuesta=='ERROR EN LA BASE DE DATOS'){
                toastr["warning"]("ERROR EN LA BASE DE DATOS");

                }
                $('#frmnuevoUS').trigger('reset');
                 return false;
             }
         });
         return false;
    });

    //editar post
    $("#frmeditarUS").submit(function(e){
        e.preventDefault();
        var formulario = $('#frmeditarUS');
        var datos = formulario.serialize();
        var archivos = new FormData();
        var url = '../phpUS/editar-US.php';

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
               
                if(respuesta=='SE REGISTRÓ CORRECTAMENTE'){
                    toastr["success"]("SE REGISTRÓ CORRECTAMENTE");
                    alert("SE REGISTRÓ CORRECTAMENTE");
                    $("#modalEditarUS").modal('hide');
                
                }else if (respuesta=='YA EXISTE ESTE ALIAS, INTENTE CON OTRO!'){
                    toastr["error"]("YA EXISTE ESTE ALIAS, INTENTE CON OTRO!");
                }else if (respuesta=='ERROR EN LA BASE DE DATOS'){
                    toastr["warning"]("ERROR EN LA BASE DE DATOS");
                }
                $('#frmEditarUS').trigger('reset');
                return false;
            }
           
            
        
        });
    });

        //borrar post
	$("#frmborrarUS").submit(function(e){
		
		e.preventDefault();
			const postData = {
                id_usuario: $('#id_usuarioB').val()
                
			};
            
			 $.post('../phpUS/borrar-US.php', postData,function(respuesta) {
				console.log(respuesta);
					if(respuesta=='ERROR EN LA BASE DE DATOS'){
						toastr["warning"]("ERROR EN LA BASE DE DATOS");
					}else if(respuesta=='SE BORRÓ CORRECTAMENTE'){
						toastr["success"]("SE BORRÓ CORRECTAMENTE");
						$("#modalBorrarUS").modal('hide');
	
					}
		
				
			});
	});
});

 //editar mostrar campo
var editar = function(tbody,table){
    $(tbody).on("click","button.editar",function(){
        var data = table.row($(this).parents("tr")).data();
        $("#id_usuarioE").val(data.id_usuario);
        $("#aliasE").val(data.alias);
        $("#contraseñaE").val(data.contraseña);
        
        $('#img').html('<img src="../phpUA/album/'+Object.values([data.fotoU])+'" width="70px" height="70px" />');
        $('#select_rolE').append('<option value="'+Object.values([data.rol_id])+'" selected="selected">'+Object.values([data.descripcion])+'</option>');

    }); 

}


//borrar
var borrar = function(tbody, table){
    $(tbody).on("click","button.borrar",function(){
        var data = table.row($(this).parents("tr")).data();
        $("#id_usuarioB").val(data.id_usuario);
        console.table(data);

    });
}
    
