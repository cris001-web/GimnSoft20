
    function validar(){
        $('.mensaje').remove();
        
        var descripcion = $('#descripcion').val();
        colorOriginal('descripcion');
        if (descripcion=='' || descripcion==null) {
            cambiarColor('descripcion');
            mostrarMsj('El Campo no debe estar vacio','descripcion');
            return false;
        }
    }

    function validarEditar(){
    
        $('.mensaje').remove();
        
        var descripcion = $('#descripcione').val();
        colorOriginal('descripcione');
        if (descripcion=='' || descripcion==null) {
            cambiarColor('descripcione');
            mostrarMsj('El Campo no debe estar vacio','descripcione');
            return false;
        }
    }

    function cambiarColor(vari){
        $('#' + vari).css({
                border: "1px solid #dd5144"

            });
    }
  
    function colorOriginal(vara){
        $('#'+ vara).css({
            border:"1px solid  #ced4da"
        });
    }
    
    //funcion mostrar campo
    function mostrarMsj(mens,campo){
        $('#' + campo).before('<div class="mensaje text-danger mt-1">'+mens+'</div>');

    }

