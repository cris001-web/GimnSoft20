$(document).ready(function () {
    var table =$('#dataTableU').DataTable({
    	
		"ajax":{
			"url":"../phpUA/listar.php",
            "dataSrc":"",
        },
            "columns":[
                {"data":"id_usuario"},
                {"data":"alias"},
                {"data":"nombre"},
                {"data":"apellido"},
                {"data":"descripcion_loc"},
                {"data":"descripcion_sex"},
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
     //nuevo   
     $('#frmnuevoUA').submit(function(e){ 

        var comprobar = $('#foto').val().length * $('#alias').val().length;
            if(comprobar>0){
               var formulario = $('#frmnuevoUA');
               var datos = formulario.serialize();
               var archivos = new FormData();
               var url = '../phpUA/agregar-UA.php';
                
                for(var i=0; i < (formulario.find("input[type=file]").lenght); i++){
                    archivos.append((formulario.find('input[type="file"]:eq('+i+')').attr("name")),((formulario.find('input[type="file"]:eq('+i+')')[0]).files[0]));
                    
                }

                $.ajax({
           
                    url:url+'?'+datos,
                    type:'POST',
                    contentType:false,
                    data:archivos,
                    processData:false,
                    
                    beforeSend:function(){
                        alert('enviando');
                    },
       
                   
                    success:function(data){
                        console.log(data);
                        return false;
                    }
                   
                    
                
                });
                return false;
            }else{
                alert('datos cero');
            }
        
        
    });
});