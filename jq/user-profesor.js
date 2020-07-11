$(document).ready(function(){
    
    var table =$('#dataTableUP').DataTable({
        "ajax":{
            "url":"../phpUP/listar.php",
            "dataSrc":"",

        },

        "columns":[
            {"data":"id_usuario"},
            {"data":"alias"},
            {"data":"contraseña"},
            {"data":"rol_id"},
            {"data":"id_profesor"},
            {"data":"nombre"},
            {"data":"apellido"},
            {"data":"fecha_nac"},
            {"data":"direccion"},
            {"data":"num_telef"},
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
            {"defaultContent":"<button type='button' class='borrar btn btn-danger ' data-toggle='modal' data-target='#modalBorrarUA'><i class='icon far fa-trash-alt'></i>Eliminar</button><button type='button' class='editar btn btn-warning ' data-toggle='modal' data-target='#modalEditarUP'><i class='icon fas fa-user-edit '></i>Editar</button>"},

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
                    "targets": [ 3 ],
                    "visible": false
                },
                {
                    "targets": [ 4 ],
                    "visible": false
                },
                {
                    "targets": [ 8 ],
                    "visible": false
                },
                {
                    "targets": [ 9 ],
                    "visible": false
                },
                {
                    "targets": [ 12 ],
                    "visible": false
                }
            ]   
    });
    //recarga pagina
	setInterval(function(){
        table.ajax.reload(null,false);
    },1000);
    editar("#dataTableUP tbody",table );

    $('#frmnuevoUP').submit(function(e){
        e.preventDefault();
       
        var formulario = $('#frmnuevoUP');
        var datos = formulario.serialize();
        var archivos = new FormData();
        var url = '../phpUP/agregar-UP.php';

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
                 $("#modalNuevoUP").modal('hide');
               }else if (respuesta=='YA EXISTE ESTE ALIAS, INTENTE CON OTR0!'){
                 alertify.error('YA EXISTE ESTE ALIAS, INTENTE CON OTR0!');
               }else if (respuesta=='ERROR EN LA BASE DE DATOS'){
                 alertify.error('ERROR EN LA BASE DE DATOS');

               }
               $('#frmnuevoUP').trigger('reset');
                 return false;
             }
        });
    })

    //editar post
    $("#frmEditarUP").submit(function(e){
        e.preventDefault();
        var formulario = $('#frmEditarUP');
        var datos = formulario.serialize();
        var archivos = new FormData();
        var url = '../phpUP/editar-UP.php';

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
        $("#num_telefE").val(data.num_telef);
        $("#select_locE").val(data.descripcion_loc);
        $("#select_locE").val(data.localidad_id);
        $("#select_sexE").val(data.descripcion_sex);
        $("#select_sexE").val(data.sexo_id);
        $("#select_rolE").val(data.rol_id);
        $("#select_locE").val(data.descripcion);
        
        $('#select_locE').append('<option value="'+Object.values([data.localidad_id])+'" selected="selected">'+Object.values([data.descripcion_loc])+'</option>'); 
        $('#select_sexE').append('<option value="'+Object.values([data.sexo_id])+'" selected="selected">'+Object.values([data.descripcion_sex])+'</option>'); 
        $('#select_rolE').append('<option value="'+Object.values([data.rol_id])+'" selected="selected">'+Object.values([data.descripcion])+'</option>');
    });
}
  
