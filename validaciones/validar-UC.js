function validarUC(){
    var nombreAc =$('#nombreAc').val();
    var profesor_id =$('#profesor_id option:selected').val();
    var dias =$('#dias').val();
    var horario =$('#horario').val();
    var costo =$('#costo').val();
    
    pattern=/^[A-zA-Z ]*$/;
    patternNum=/^[0-9]+$/;

    if(nombreAc==''){
        setTimeout(function(){
            $('#nombreAc'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#nombreAc'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }

    if(profesor_id==''){
        setTimeout(function(){
            $('#profesor_id'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#profesor_id'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }

    if(dias==''){
        setTimeout(function(){
            $('#dias'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#dias'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }
    if(!pattern.test(dias)){
        setTimeout(function(){
            $('#dias'  ).css({ border: "1px solid #dd5144"});
        },0000);
        setTimeout(function(){
            $('#dias'  ).css({ border: "1px solid #ced4da"});
        },3000);
        validarLetras();
        return false; 
    }

    if(horario==''){
        setTimeout(function(){
            $('#horario'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#horario'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }
    if(costo==''){
        setTimeout(function(){
            $('#costo'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#costo'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }
    if(!patternNum.test(costo)){
        setTimeout(function(){
            $('#costo'  ).css({ border: "1px solid #dd5144"});
        },0000);
        setTimeout(function(){
            $('#costo'  ).css({ border: "1px solid #ced4da"});
        },3000);
        validarNumeros();
        return false; 
    }
}


function validarUAedit(){
    var aliasE =$('#aliasE').val();
    var contraseñaE =$('#contraseñaE').val();
    var nombreE =$('#nombreE').val();
    var apellidoE =$('#apellidoE').val();
    var direccionE =$('#direccionE').val();
    var num_telfE =$('#num_telfE').val();
    
    var objetivoE =$('#objetivoE').val();
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

    
    if(nombreE==''){
        setTimeout(function(){
            $('#nombreE'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#nombreE'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }
    if(!pattern.test(nombreE)){
        setTimeout(function(){
            $('#nombreE'  ).css({ border: "1px solid #dd5144"});
        },0000);
        setTimeout(function(){
            $('#nombreE'  ).css({ border: "1px solid #ced4da"});
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

    

    if(objetivoE=='\n'>0){
        setTimeout(function(){
            $('#objetivoE'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#objetivoE'  ).css({ border: "1px solid #ced4da"});
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