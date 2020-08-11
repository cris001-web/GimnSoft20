function validarUP(){
    var alias =$('#alias').val();
    var contraseña =$('#contraseña').val();
    var nombre =$('#nombre').val();
    var apellido =$('#apellido').val();
    var direccion =$('#direccion').val();
    var num_telf =$('#num_telf').val();
    var select_loc=$('#select_loc option:selected').val();
    var select_sex=$('#select_sex option:selected').val();
    var select_rol=$('#select_rol option:selected').val();
    var fecha_nac =$('#fecha_nac').val();
    var foto =$('#foto').val();
    pattern=/^[A-zA-Z ]*$/;
    patternNum=/^[0-9]+$/;

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

    if(nombre==''){
        setTimeout(function(){
            $('#nombre'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#nombre'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }
    if(!pattern.test(nombre)){
        setTimeout(function(){
            $('#nombre'  ).css({ border: "1px solid #dd5144"});
        },0000);
        setTimeout(function(){
            $('#nombre'  ).css({ border: "1px solid #ced4da"});
        },3000);
        validarLetras();
        return false; 
    }

    if(apellido==''){
        setTimeout(function(){
            $('#apellido'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#apellido'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }
    if(!pattern.test(apellido)){
        setTimeout(function(){
            $('#apellido'  ).css({ border: "1px solid #dd5144"});
        },0000);
        setTimeout(function(){
            $('#apellido'  ).css({ border: "1px solid #ced4da"});
        },3000);
        validarLetras();
        return false; 
    }

    if(fecha_nac==''){
        setTimeout(function(){
            $('#fecha_nac'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#fecha_nac'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }

    if(direccion==''){
        setTimeout(function(){
            $('#direccion'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#direccion'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }

    if(num_telf==''){
        setTimeout(function(){
            $('#num_telf'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#num_telf'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }
    if(!patternNum.test(num_telf)){
        setTimeout(function(){
            $('#num_telf'  ).css({ border: "1px solid #dd5144"});
        },0000);
        setTimeout(function(){
            $('#num_telf'  ).css({ border: "1px solid #ced4da"});
        },3000);
        validarNumeros();
        return false; 
    }

    if(select_loc==''){
        setTimeout(function(){
            $('#select_loc'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#select_loc'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }

    if(select_sex==''){
        setTimeout(function(){
            $('#select_sex'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#select_sex'  ).css({ border: "1px solid #ced4da"});
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


function validarUPedit(){
    var aliasE =$('#aliasE').val();
    var contraseñaE =$('#contraseñaE').val();
    var nombreE =$('#nombreE').val();
    var apellidoE =$('#apellidoE').val();
    var direccionE =$('#direccionE').val();
    var num_telfE =$('#num_telfE').val();
    
    
    var fecha_nacE =$('#fecha_nacE').val();
    var foto =$('#foto').val();
    pattern=/^[A-zA-Z ]*$/;
    patternNum=/^[0-9]+$/;

    if(aliasE==''){
        setTimeout(function(){
            $('#aliasE'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#aliasE'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }

    if(contraseñaE==''){
        setTimeout(function(){
            $('#contraseñaE'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#contraseñaE'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }

    
    if(nombrePE==''){
        setTimeout(function(){
            $('#nombrePE'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#nombrePE'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }
    if(!pattern.test(nombrePE)){
        setTimeout(function(){
            $('#nombrePE'  ).css({ border: "1px solid #dd5144"});
        },0000);
        setTimeout(function(){
            $('#nombrePE'  ).css({ border: "1px solid #ced4da"});
        },3000);
        validarLetras();
        return false; 
    }

    if(apellidoE==''){
        setTimeout(function(){
            $('#apellidoE'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#apellidoE'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }
    if(!pattern.test(apellidoE)){
        setTimeout(function(){
            $('#apellidoE'  ).css({ border: "1px solid #dd5144"});
        },0000);
        setTimeout(function(){
            $('#apellidoE'  ).css({ border: "1px solid #ced4da"});
        },3000);
        validarLetras();
        return false; 
    }

    if(fecha_nacE==''){
        setTimeout(function(){
            $('#fecha_nacE'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#fecha_nacE'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }

    if(direccionE==''){
        setTimeout(function(){
            $('#direccionE'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#direccionE'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }

    

    if(num_telfE==''){
        setTimeout(function(){
            $('#num_telfE'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#num_telfE'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }
    if(!patternNum.test(num_telfE)){
        setTimeout(function(){
            $('#num_telfE'  ).css({ border: "1px solid #dd5144"});
        },0000);
        setTimeout(function(){
            $('#num_telfE'  ).css({ border: "1px solid #ced4da"});
        },3000);
        validarNumeros();
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