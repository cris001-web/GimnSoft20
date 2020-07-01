$(document).ready(function () {
    $("#frmlogin").submit(function(e){
        e.preventDefault();

        ajax({
            url:'',
            type:'POST',
            dataType:'json',
            data:$(this).serialize(),
            beforenSend:function(){

            }
        })
        .done(function(respuesta){
            console.log(respuesta);
        })
        .fail(function(respuesta){
            console.log(respuesta.responseText);
        })
    });
});
