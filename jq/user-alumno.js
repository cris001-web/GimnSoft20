$(document).ready(function () {
 
    var table =$('#dataTableUA').DataTable({
    	
		"ajax":{
			"url":"../phpUA/listar.php",
            "dataSrc":"",
        },
            "columns":[
                {"data":"id_usuario"},
                {"data":"alias"},
                {"data":"nombre"},
                {"data":"apellido"},
                {"data":"fecha_nac"},
                {"data":"descripcion_loc"},
                {"data":"descripcion_sex"},
                {"data":"descripcion"},
                
                {
                    "data":"foto",
                    "render":function(data,type,row){
                         var url = "../phpUA/album/";
                        return '<center><img src="'+url+"/"+data+'" width="120" height="80"/></center>';
                    }
                },
                {"defaultContent":"<button type='button' class='borrar btn btn-danger ' data-toggle='modal' data-target='#modalBorrar'><i class='icon far fa-trash-alt'></i>Eliminar</button><button type='button' class='editar btn btn-warning ' data-toggle='modal' data-target='#modalEditarUA'><i class='icon fas fa-user-edit '></i>Editar</button>"},
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

    editar("#dataTableUA tbody", table);

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
                       if(respuesta=='SE REGISTRO CORRECTAMENTE'){
                        alertify.success('SE REGISTRO CORRECTAMENTE');
                        $("#modalNuevoUA").modal('hide');
                      }else if (respuesta=='YA EXISTE ESTA DESCRIPCIÓN, INTENTE CON OTRA!'){
                        alertify.error('YA EXISTE ESTA DESCRIPCIÓN, INTENTE CON OTRA!');
                      }else if (respuesta=='ERROR EN LA BASE DE DATOS'){
                        alertify.error('ERROR EN LA BASE DE DATOS');

                      }
                      $('#frmnuevoUA').trigger('reset');
                        return false;
                    }
                   
                    
                
                });
                return false;
          
        
        
    });

   
    
});

 //editar mostrar campo
 var editar = function(tbody,table){
    $(tbody).on("click","button.editar",function(){
        var data = table.row($(this).parents("tr")).data();
        var id_usuario=$("#id_usuarioE").val(data.id_usuario);
        var alias=$("#aliasE").val(data.alias);
        var contraseña=$("#contraseñaE").val(data.contraseña);
        var nombre=$("#nombreE").val(data.nombre);
        var apellido=$("#apellidoE").val(data.apellido);
        var fecha_nac=$("#fecha_nacE").val(data.fecha_nac);
        var direccion=$("#direccionE").val(data.direccion);
        var num_telf=$("#num_telfE").val(data.num_telf);
        var select_loc=$("#id_select_locE").val(data.descripcion_loc);
        var select_sex=$("#select_sexE").val(data.sexo_id);
        var select_rol=$("#select_rolE").val(data.rol_id);
        var objetivo=$("#objetivoE").val(data.objetivo);
        console.table(data);
    });    
}