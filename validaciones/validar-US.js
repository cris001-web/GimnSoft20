function validarUS(){
    var alias =$('#alias').val();
    var contraseña =$('#contraseña').val();
    var select_rol=$('#select_rol option:selected').val();

    if(alias==''){
        setTimeout(function(){
            $('#alias'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#alias'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }

    if(contraseña==''){
        setTimeout(function(){
            $('#contraseña'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#contraseña'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }

    if(select_rol==''){
        setTimeout(function(){
            $('#select_rol'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#select_rol'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }
}

function validarUSedit(){
    var alias =$('#aliasE').val();
    var contraseña =$('#contraseñaE').val();
    var select_rol=$('#select_rolE option:selected').val();

    if(alias==''){
        setTimeout(function(){
            $('#aliasE'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#aliasE'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }

    if(contraseña==''){
        setTimeout(function(){
            $('#contraseñaE'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#contraseñaE'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }

    if(select_rol==''){
        setTimeout(function(){
            $('#select_rolE'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#select_rolE'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }
}
//funcion mostrar campo
function mostrarMsjVacio(){
    $('.msj').slideDown('slow');
     setTimeout(function(){
        $('.msj').slideUp('slow');
    },3000);
}
//funcion valida que ingrese solo letras
function validarLetras(){
    $('.msj1').slideDown('slow');
    setTimeout(function(){
       $('.msj1').slideUp('slow');
   },3000)
}
//funcion valida que ingrese solo numeros
function validarNumeros(){
    $('.msj2').slideDown('slow');
    setTimeout(function(){
       $('.msj2').slideUp('slow');
   },3000)
}