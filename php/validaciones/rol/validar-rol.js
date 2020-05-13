function validar(){
    var descripcion = $('descripcion').val();
    if (descripcion=='' || descripcion==null) {
        cambiarColor('descripcion');
        return false;
    }
}


function cambiarColor(vari){
    $('#' + vari).css({
        border: "1px solid #dd5144"

    });
} 