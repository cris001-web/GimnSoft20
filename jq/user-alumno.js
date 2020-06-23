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
                {"data":"contraseña"},
                {"data":"objetivo"},
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
                },
                "columnDefs": [
                    {
                        "targets": [ 8 ],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [ 9 ],
                        "visible": false
                    }
                ]
		
			
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
                         alertify.success('SE EDITÓ CORRECTAMENTE');
                         $("#modalEditarUA").modal('hide');
                        
                        }else if (respuesta=='YA EXISTE EL ALIAS, INTENTE CON OTRO!'){
                            alertify.error('YA EXISTE EL ALIAS, INTENTE CON OTRO!');
                        }else if (respuesta=='ERROR EN LA BASE DE DATOS'){
                            alertify.error('ERROR EN LA BASE DE DATOS');
                        }
                      $('#frmEditarUA').trigger('reset');
                        return false;
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
        $("#nombreE").val(data.nombre);
        $("#apellidoE").val(data.apellido);
        $("#fecha_nacE").val(data.fecha_nac);
        $("#direccionE").val(data.direccion);
        $("#num_telfE").val(data.num_telf);
        $("#select_locE").val(data.descripcion_loc);
        $("#select_locE").val(data.localidad_id);
        $("#select_sexE").val(data.descripcion_sex);
        $("#select_sexE").val(data.sexo_id);
        $("#select_rolE").val(data.rol_id);
        $("#select_locE").val(data.descripcion);
        $("#objetivoE").val(data.objetivo);
        
        $('#select_locE').append('<option value="'+Object.values([data.localidad_id])+'" selected="selected">'+Object.values([data.descripcion_loc])+'</option>'); 
        $('#select_sexE').append('<option value="'+Object.values([data.sex_id])+'" selected="selected">'+Object.values([data.descripcion_sex])+'</option>'); 
        $('#select_rolE').append('<option value="'+Object.values([data.rol_id])+'" selected="selected">'+Object.values([data.descripcion])+'</option>');

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