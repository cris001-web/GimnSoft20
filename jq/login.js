$(document).ready(function () {
    
    $("#frmlogin").submit(function(e){
        
        e.preventDefault();

        $.ajax({
            url:'../login/login.php',
            type:'POST',
            
            data:$(this).serialize(),
            

            success:function(respuesta){
                console.log(respuesta);
                let datas= JSON.parse(respuesta);
                datas.forEach(data=>{
                console.log(data.rol_id); 
                if (data.descripcion=='Usuario') {
                    alertify.success(respuesta);
                    location.href ="../formularios/menu.php";
                } else if(data.descripcion=='Super Administrador'){
                        
                    location.href ="../vistas/menu-gral.php";
                }else if(data.descripcion=='Administrador'){
                    location.href ="../vistas/menu-gral.php";
                }else if(data.resp=='incorrecto')  {
                    toastr["error"]("ALIAS y/o CONTRASEÑA Incorrecta","ERROR");
                }
                });
            }
        
        
        })
    });
});
