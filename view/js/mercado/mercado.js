

//DRAG AND DROP DE LOS JUGADORES
$( document ).ready(function() {
       $('.fila').draggable({ revert: true });

    var valor;
    $("#caja_jugadores").droppable({
        drop: function (event, ui) {
                ui.draggable.data("soltado", true);
                var elem = $(this);
                valor = ui.draggable;
                $(this).append(valor);
                $("#caja_jugadores li.fila").removeClass( "fila" ).addClass( "fila_caja_jugador" );
                $(".fila_caja_jugador").css("width","100%");
        }
        });

    $('.fila_caja_jugador').draggable({ revert: true });

    $("#contenido_mercado").droppable({
        drop: function (event, ui) {
                ui.draggable.data("soltado", true);
                console.log("hola k ashe");
                var elem = $(this);
                valor = ui.draggable;
                $(this).append(valor);
                $("#caja_mercado li.fila_caja_jugador").removeClass( "fila_caja_jugador" ).addClass( "fila" );
                $(".fila").css("width","100%");

        }

    });
//BOTONES DE AÑADIR Y ELIMINAR JUGADORES

    $(".icon-minus-circle").click(function(){
        fila = $("#fila1");
        $("#contenido_mercado").append(fila);
        $(".icon-minus-circle").css("display","none");
        $(".icon-plus-circle").css("display","inline");

    });

    $(".icon-plus-circle").click(function(){
        fila = $("#fila1");
        $("#caja_jugadores").append(fila);
        $(".icon-plus-circle").css("display","none");
        $(".icon-minus-circle").css("display","inline");
    });



});