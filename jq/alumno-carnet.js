$(document).ready(function () {
    // agrega un input para cada columna
    $('#dataTableALCA thead tr ').clone(true).appendTo( '#dataTableALCA thead' );
    $('#dataTableALCA thead tr:eq(1) th').each( function (i) {
		var title = $(this).text();
		if (i==12 || i==11) {
			
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
    var table =$('#dataTableALCA').DataTable({
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
                {"defaultContent":" <button type='button' class='carnet btn btn-primary  ' data-toggle='modal' data-target='#modalExportar' ><i class='far fa-id-card'></i> Carnet</button> "},
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
                    },
                    {
                        "targets": [ 5 ],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [ 6 ],
                        "visible": false
                    },
                    {
                        "targets": [ 7 ],
                        "visible": false
                    },
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

    carnet("#dataTableALCA tbody", table);
                   
    
});
//busco  id en tabla
var carnet = function (tbody,table){
    $(tbody).on("click","button.carnet",function(){
        var data=table.row($(this).parents("tr")).data();
        console.log(data.id_alumno);
        console.log(data);
        $("#id").val(data.id_alumno);
        
            $.ajax({
                data: data,
                url: "../formularios/alumno-carnet.php",
                type: "get",
                beforeSend:function(){
                    toastr["info"]("Generando Carnet...");
                                  
                }
                 
            });
            
            setTimeout(function(){
                $('#generar_pdf').show(1000);
            },5000);
            setTimeout(function(){
                $('#generar_pdf').hide(1000);
            },20000);  
    });
}	