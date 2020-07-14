$(document).ready(function () {
    
    $("#frmlogin").submit(function(e){
        
        e.preventDefault();

        $.ajax({
            url:'../login/login.php',
            type:'POST',
            
            data:$(this).serialize(),
            
            
        
        })
        .done(function(respuesta) {
            if (respuesta=='usuario') {
                alertify.success(respuesta);
                location.href ="../formularios/menu.php";
            } else if(respuesta=='super administrador'){
                
                location.href ="../formularios/rol.php";
            }else if(respuesta=='administrador'){
                location.href ="../formularios/menu.php";
            }else{
                toastr["success"]("mensaje pru","titulo");
            }
           
          })
        
    });
});
