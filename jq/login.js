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
            } else {
                
                location.href ="../formularios/rol.php";
            }
           
          })
        
    });
});
