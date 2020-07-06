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
                alert('usuario');
                location.href ="../formularios/menu.php";
            } else {
                alert('administrador');
                location.href ="../formularios/rol.php";
            }
           
          })
        
    });
});
