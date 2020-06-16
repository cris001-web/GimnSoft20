function validarUA(){
    $('.mensaje').remove();
    var alias =$('#alias').val();
    var contraseña =$('#contraseña').val();
    var nombre =$('#nombre').val();
    var apellido =$('#apellido').val();
    var direccion =$('#direccion').val();
    var num_telf =$('#num_telf').val();
    var select_loc =$('#select_loc option:selected').val();
    var select_sex =$('#select_sex option:selected').val();
    var select_rol =$('#select_rol option:selected').val();
    var objetivo =$('#objetivo').val();
    var fecha_nac =$('#fecha_nac').val();
    var foto =$('#foto').val();
    pattern=/^[A-zA-Z ]*$/;
    patternNum=/^[0-9]+$/;
    
        if(alias==''){
            $('#alias'  ).css({ border: "1px solid #dd5144"});
            mostrarMsj('CAMPO VACÍO'); 
            return false;
        }else{
            $('#alias'  ).css({ border: "1px solid #ced4da"});
            
        }
        if(contraseña==''){
            $('#contraseña'  ).css({ border: "1px solid #dd5144"});
            mostrarMsj('CAMPO VACÍO','contraseña'); 
            return false;
        }else{
            $('#contraseña'  ).css({ border: "1px solid #ced4da"});
            
        }
        // if(foto==''){
        //     $('#foto'  ).css({ border: "3px solid #dd5144"});
        //     mostrarMsj('CAMPO VACÍO','foto'); 
        //     return false;
        // }else{
        //     $('#foto'  ).css({ border: "3px solid #ced4da"});
            
        // }
        if(nombre==''){
            $('#nombre'  ).css({ border: "1px solid #dd5144"});
            mostrarMsj('CAMPO VACÍO','nombre'); 
            return false;
        }else{
            $('#nombre'  ).css({ border: "1px solid #ced4da"});
             if(!pattern.test(nombre)){
                $('.msj').remove();
                validarLetras('NO SE PERMITEN NÚMEROS');
                $('#nombre'  ).css({ border: "1px solid #dd5144"});
                return false;
                 
             }else{
                $('#nombre'  ).css({ border: "1px solid #ced4da"}); 
             }
        }

        if(apellido==''){
            $('#apellido'  ).css({ border: "1px solid #dd5144"});
            mostrarMsj('CAMPO VACÍO','apellido'); 
            return false;
        }else{
            $('#apellido'  ).css({ border: "1px solid #ced4da"});
             if(!pattern.test(apellido)){
                $('.msj').remove();
                validarLetras('NO SE PERMITEN NÚMEROS');
                $('#apellido'  ).css({ border: "1px solid #dd5144"});
                return false;
                 
             }else{
                $('#apellido'  ).css({ border: "1px solid #ced4da"}); 
             }
        }

        if(fecha_nac==''){
            $('#fecha_nac'  ).css({ border: "1px solid #dd5144"});
            mostrarMsj('CAMPO VACÍO','fecha_nac'); 
            return false;
        }else{
            $('#fecha_nac'  ).css({ border: "1px solid #ced4da"});
            
        }

        if(direccion==''){
            $('#direccion'  ).css({ border: "1px solid #dd5144"});
            mostrarMsj('CAMPO VACÍO','direccion'); 
            return false;
        }else{
            $('#direccion'  ).css({ border: "1px solid #ced4da"});
            
        }
        
        if(num_telf==''){
            $('#num_telf'  ).css({ border: "1px solid #dd5144"});
            mostrarMsj('CAMPO VACÍO','num_telf'); 
            return false;
        }else{
            $('#num_telf'  ).css({ border: "1px solid #ced4da"});
             if(!patternNum.test(num_telf)){
                $('.msj').remove();
                validarLetras('NO SE PERMITEN LETRAS');
                $('#num_telf'  ).css({ border: "1px solid #dd5144"});
                return false;
                 
             }else{
                $('#num_telf'  ).css({ border: "1px solid #ced4da"}); 
             }
        }

        if(select_loc==''){
            $('#select_loc'  ).css({ border: "1px solid #dd5144"});
            mostrarMsj('CAMPO VACÍO'); 
            return false;
        }else{
            $('#select_loc'  ).css({ border: "1px solid #ced4da"});
            
        }

        if(select_sex==''){
            $('#select_sex'  ).css({ border: "1px solid #dd5144"});
            mostrarMsj('CAMPO VACÍO'); 
            return false;
        }else{
            $('#select_sex'  ).css({ border: "1px solid #ced4da"});
            
        }

        if(select_rol==''){
            $('#select_rol'  ).css({ border: "1px solid #dd5144"});
            mostrarMsj('CAMPO VACÍO'); 
            return false;
        }else{
            $('#select_rol'  ).css({ border: "1px solid #ced4da"});
            
        }

        if(objetivo==0){
            $('#objetivo'  ).css({ border: "1px solid #dd5144"});
            mostrarMsj('CAMPO VACÍO'); 
            return false;
        }else{
            $('#objetivo'  ).css({ border: "1px solid #ced4da"});
            
        }
        
    }           
            
        

               
            
    

//funcion mostrar campo
function mostrarMsj(mens){
    $('.msj').before('<div class="mensaje text-danger mt-1">'+mens+'</div>');

}

function validarLetras(mens){
    $('.msj1').before('<div class="mensaje text-danger mt-1">'+mens+'</div>');
}