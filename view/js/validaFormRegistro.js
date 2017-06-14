$(document).ready(function(){
    //variables globales
    var inputApodo = $("#input_apodo");

    var inputNombre = $("#input_nombre");

    var inputApellidos= $("#input_apellidos");

    var inputPassword1 = $("#input_password");

    var inputPassword2 = $("#input_conf_password");

    var inputEmail = $("#input_correo");

// Funciones de validacion
function validaApodo(){
    //NO cumple longitud minima  
    if(inputApodo.val().length < 4 || inputApodo.val().length > 15){
        inputApodo.addClass("error");
        return false;
    }
    //SI longitud pero NO solo caracteres A-z  
    else if(!inputApodo.val().match(/^[0-9a-zA-Z]+$/)){
        inputApodo.addClass("error");
        return false;
    }
    // SI longitud, SI caracteres A-z  
    else{
        inputApodo.removeClass("error");
        return true;
    }
}

function validaNombre(){
    //NO cumple longitud minima  
    if(inputNombre.val().length < 4 || inputNombre.val().length > 40){
        inputNombre.addClass("error");
        return false;
    }
    //SI longitud pero NO solo caracteres A-z  
    else if(!inputNombre.val().match(/^[a-zA-Z]+$/)){
        inputNombre.addClass("error");
        return false;
    }
    // SI longitud, SI caracteres A-z  
    else{
        inputNombre.removeClass("error");
        return true;
    }
}
function validaApellidos(){
    //NO cumple longitud minima
    if(inputApellidos.val().length < 4 || inputApellidos.val().length > 70){
        inputApellidos.addClass("error");
        return false;
    }
    //SI longitud pero NO solo caracteres A-z
    else if(!inputApellidos.val().match(/^[a-zA-Z\s]+$/)){
        inputApellidos.addClass("error");
        return false;
    }
    // SI longitud, SI caracteres A-z
    else{
        inputApellidos.removeClass("error");
        return true;
    }
}
function validaPassword1(){
    //NO tiene minimo de 5 caracteres o mas de 12 caracteres  
    if(inputPassword1.val().length < 5 || !inputPassword1.val().length > 12){
        inputPassword1.addClass("error");
        return false;
    }
    // SI longitud, NO VALIDO numeros y letras  
    else if(!inputPassword1.val().match(/^[0-9a-zA-Z]+$/)){
        inputPassword1.addClass("error");
        return false;
    }
    // SI rellenado, SI email valido  
    else{
        inputPassword1.removeClass("error");
        return true;
    }
}
function validaPassword2(){
    //NO son iguales las password  
    if(inputPassword1.val() != inputPassword2.val()){
        inputPassword2.addClass("error");
        return false;
    }
    // SI son iguales  
    else{
        inputPassword2.removeClass("error");
        return true;
    }
}
function validaEmail(){
    //NO hay nada escrito  
    if(inputEmail.val().length == 0){
        inputEmail.addClass("error");
        return false;
    }
    // SI escrito, NO VALIDO email  
    else if(!inputEmail.val().match(/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i)){
        inputEmail.addClass("error");
        return false;
    }
    // SI rellenado, SI email valido  
    else{
        inputEmail.removeClass("error");
        return true;
    }
}


// Perdida de foco
inputApodo.blur(validaApodo);
inputNombre.blur(validaNombre);
inputApellidos.blur(validaApellidos);
inputEmail.blur(validaEmail);
inputPassword1.blur(validaPassword1);
inputPassword2.blur(validaPassword2);

});