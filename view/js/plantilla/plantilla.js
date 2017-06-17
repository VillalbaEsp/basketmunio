$( document ).ready(function() {

    var nombreLiga= $("#nombre_liga").val();
    var tipoLiga= $("#tipo_liga").val();
    var passwordLiga= $("#password").val();



    $.ajax({
        type: 'POST',
        url: "../controllers/CRestControladorAddLiga.php",
        data: {nombre_liga : nombreLiga,tipo_liga : tipoLiga, password : passwordLiga ,ejecutar : "creaLiga"},
        dataType: "json",
        // Mostramos un mensaje con la respuesta de PHP
        /*success: function(data) {
         $('#result').html(data);
         }*/
    });

    if($.ajax){
        $("#nombre_liga").val("");
        $("#formulario_creacion").append("<div id='caja_mensaje'><p>Liga Creada Correctamente</p></div>");
    }


});