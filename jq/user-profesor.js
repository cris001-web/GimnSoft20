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
            {"defaultContent":"<button type='button' class='borrar btn btn-danger ' data-toggle='modal' data-target='#modalBorrarUA'><i class='icon far fa-trash-alt'></i>Eliminar</button><button type='button' class='editar btn btn-warning ' data-toggle='modal' data-target='#modalEditarUA'><i class='icon fas fa-user-edit '></i>Editar</button>"},

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
    
});
  