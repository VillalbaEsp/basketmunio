

//CREAR LIGA
$( document ).ready(function() {
    var aux;
    $("#search").click(function () {
        $("#contenedor_form").empty();
        $("#contenedor_form").append("<div id='search_resultado'></div>");
        $("#search_resultado").append("<table id='ligas'>" +
            "<tr><th>Liga</th><th id='pp'>Usuarios</th><th>Unirse</th></tr>" +
            "<tr><td>Liga de los Genios</td><td>54</td><td><button class='unirse' id='boton'>Unirse</button></td></tr>" +
            "<tr><td>Lia de los Expedicionarios</td><td>88</td><td><button class='unirse'id='2'>Unirse</button></td></tr>" +
            "</table>");

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

    $("#crear").click(function () {
        $("#formulario_creacion").empty();
        $("#formulario_creacion").append("<div id='caja_mensaje'><p>Liga Creada Correctamente</p></div>");

    })



});