function validarIP(){
    var alumno_id =$('#alumno_id').val();
    var actividad_id =$('#actividad_id').val();
    var fecha_vencimiento =$('#fecha_vencimiento').val();
    var fecha_pago =$('#fecha_pago').val();
    var resto =$('#resto').val();
    
    pattern=/^[A-zA-Z ]*$/;
    patternNum=/^[0-9]+$/;

    if(alumno_id==''){
        setTimeout(function(){
            $('#alumno_id'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#alumno_id'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }

    if(actividad_id==''){
        setTimeout(function(){
            $('#actividad_id'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#actividad_id'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }

    if(fecha_vencimiento==''){
        setTimeout(function(){
            $('#fecha_vencimiento'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#fecha_vencimiento'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }
    if(fecha_pago==''){
        setTimeout(function(){
            $('#fecha_pago'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#fecha_pago'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    } 

    if(resto==''){
        setTimeout(function(){
            $('#resto'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#resto'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }
    if(!patternNum.test(resto)){
        setTimeout(function(){
            $('#resto'  ).css({ border: "1px solid #dd5144"});
        },0000);
        setTimeout(function(){
            $('#resto'  ).css({ border: "1px solid #ced4da"});
        },3000);
        validarNumeros();
        return false; 
    }

   

}


function validarIPedit(){
    var alumno_idE =$('#alumno_idE').val();
    var actividad_idE =$('#actividad_idE').val();
    var fecha_vencimientoE =$('#fecha_vencimientoE').val();
    var fecha_pagoE =$('#fecha_pagoE').val();
    var restoE =$('#restoE').val();
    
    pattern=/^[A-zA-Z ]*$/;
    patternNum=/^[0-9]+$/;

    if(alumno_idE==''){
        setTimeout(function(){
            $('#alumno_idE'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#alumno_idE'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }

    if(actividad_idE==''){
        setTimeout(function(){
            $('#actividad_idE'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#actividad_idE'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }

    if(fecha_vencimientoE==''){
        setTimeout(function(){
            $('#fecha_vencimientoE'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#fecha_vencimientoE'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }
    if(fecha_pagoE==''){
        setTimeout(function(){
            $('#fecha_pagoE'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#fecha_pagoE'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    } 

    if(restoE==''){
        setTimeout(function(){
            $('#restoE'  ).css({ border: "1px solid #dd5144" });
        },0000);
        setTimeout(function(){
            $('#restoE'  ).css({ border: "1px solid #ced4da"});
        },3000);
        mostrarMsjVacio(); 
        return false;
    }
    if(!patternNum.test(restoE)){
        setTimeout(function(){
            $('#restoE'  ).css({ border: "1px solid #dd5144"});
        },0000);
        setTimeout(function(){
            $('#restoE'  ).css({ border: "1px solid #ced4da"});
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