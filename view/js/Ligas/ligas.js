

//CREAR LIGA
$( document ).ready(function() {
    var aux;
    $("#envio_search").click(function () {
        var search= $("#search").val();
        console.log("hola");
        $.ajax({
            type: 'POST',
            url: "../../controllers/CRestControladorLiga.php", //hay que poner 2 ../ por que aqui no tengo la estructura view
            data: {search : search, ejecutar : "muestraLiga"},
            dataType:"json",
            success: function(data) {
                $("#contenedor_form").empty();
                $("#contenedor_form").append("<div id='search_resultado'></div>");
                $("#search_resultado").append("<table id='ligas'>" +
                    "<thead><tr><th>Liga</th><th id='pp'>Usuarios</th><th>Unirse</th></tr></thead>");



                $('#ligas').append("<tbody>");
                for(var i=0; i<data['count']*2; i++){
                        $('#ligas tbody').append("<tr>");
                        $('#ligas tbody ').append("<td>" + data[i] + "</td>");
                        i++;
                        $('#ligas tbody ').append("<td>" + data[i] + "</td>");
                        $('#ligas tbody').append("</tr>");
                }
                $('#ligas').append("</tbody>");
                $("#search_resultado").append("</table>");
               /* $.each(data,function(i){
                    $('#ligas').append( "<tr><td>"+data['id_liga']+"</td><td>"+data['nombre_liga']+"</td><td>"+data['tipo_liga']+"</td></tr>");
                });*/
            }
        });

/*
        $("#contenedor_form").empty();
        $("#contenedor_form").append("<div id='search_resultado'></div>");
        $("#search_resultado").append("<table id='ligas'>" +
            "<tr><th>Liga</th><th id='pp'>Usuarios</th><th>Unirse</th></tr>" +
            "<tr><td>Liga de los Genios</td><td>54</td><td><button class='unirse' id='boton'>Unirse</button></td></tr>" +
            "<tr><td>Lia de los Expedicionarios</td><td>88</td><td><button class='unirse'id='2'>Unirse</button></td></tr>" +
            "</table>");*/

        $("#boton").click(function () {
            console.log("ueeeeeeee");
            if($(".unirse") && aux!=1){
                console.log("yoloverde");
                console.log(aux);
                $("#boton").removeClass( "unirse" ).addClass( "dejar" );
                $("#boton").empty();
                $("#boton").append("Dejar");
                aux=1;
            }
            /*if($(".dejar") && aux!=0){
                console.log("yolorojo");
                console.log(aux);
                $("#boton").removeClass( "dejar" ).addClass( "unirse" );
                $("#boton").empty();
                $("#boton").append("Unirse");
                aux=0;
            }*/
        });
    });
    //el id de la liga es el de la Base de datos

   /* $("#registro_liga").click(function () {
        $("#formulario_creacion").empty();


    })*/

   $("#registro_liga").click(function () {

       var nombreLiga= $("#nombre_liga").val();
       var tipoLiga= $("#tipo_liga").val();
       var passwordLiga= $("#password").val();



       $.ajax({
           type: 'POST',
           url: "../../controllers/CRestControladorLiga.php",
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






});