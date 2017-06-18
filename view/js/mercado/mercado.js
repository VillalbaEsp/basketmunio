$( document ).ready(function() {

    $.ajax({
        type: 'POST',
        url: "../../controllers/CRestControladorEquipo.php",
        data: {metodo: "misEquipos"},
        dataType: "json",
        success: function (data) {

            for (var i = 0; i < data.length; i++) {
                $('#select_equipo select').append('<option value="' + data[i]['id_equipo'] + '">' + data[i]['nombre_equipo'] + '</option>');
            }
        }
    });

    $("#select_equipo select").change(function () {

        var idEquipo = $(this).val();
        $('#contenedor_jugadores').empty();

        $('#contenido_mercado').empty();


        $.ajax({
            type: 'POST',
            url: "../../controllers/CRestControladorLiga.php",
            data: {ejecutar: "mercado", idEquipo: idEquipo},
            dataType: "json",
            success: function (data) {

                var nombre, posicion, equipo, precio;


                $.each(data, function (indice, equipo) {
                    $.each(equipo, function (indice2, valor) {


                        if (indice2 == 1)
                            nombre = valor;
                        if (indice2 == 2)
                            posicion = valor;
                        if (indice2 == 3)
                            equipo = valor;
                        if (indice2 == 4)
                            precio = valor;

                    })
                    $fila = '<li class="fila" id="fila1"><input type="checkbox" class="añadir" id="añadir1"><input type="checkbox" class="eliminar" id="añadir1e"><label class="icon-plus-circle" for="añadir1"></label><label class="icon-minus-circle" for="añadir1e"></label>Nombre: ' + nombre + ' Posicion: ' + posicion + ' Precio: ' + precio + '</li>';
                    $('#contenido_mercado').append($fila);
                });

            },


        });

        //DRAG AND DROP DE LOS JUGADORES
        $('.fila').draggable({revert: true});

        var valor;
        $("#caja_jugadores").droppable({
            drop: function (event, ui) {
                ui.draggable.data("soltado", true);
                var elem = $(this);
                valor = ui.draggable;
                $(this).append(valor);
                $("#caja_jugadores li.fila").removeClass("fila").addClass("fila_caja_jugador");
                $(".fila_caja_jugador").css("width", "100%");
            }
        });

        $('.fila_caja_jugador').draggable({revert: true});

        $("#contenido_mercado").droppable({
            drop: function (event, ui) {
                ui.draggable.data("soltado", true);
                console.log("hola k ashe");
                var elem = $(this);
                valor = ui.draggable;
                $(this).append(valor);
                $("#caja_mercado li.fila_caja_jugador").removeClass("fila_caja_jugador").addClass("fila");
                $(".fila").css("width", "100%");

            }

        });
        //BOTONES DE AÑADIR Y ELIMINAR JUGADORES

        $(".icon-minus-circle").click(function () {
            fila = $("#fila1");
            $("#contenido_mercado").append(fila);
            $(".icon-minus-circle").css("display", "none");
            $(".icon-plus-circle").css("display", "inline");

        });

        $(".icon-plus-circle").click(function () {
            fila = $("#fila1");
            $("#caja_jugadores").append(fila);
            $(".icon-plus-circle").css("display", "none");
            $(".icon-minus-circle").css("display", "inline");
        });

        // Llenar PLANTILLA

        //$("#select_equipo select").change(function () {

            //var idEquipo = $(this).val();

            $.ajax({
                type: 'POST',
                url: "../../controllers/CRestControladorEquipo.php",
                data: {metodo: "muestraInfo", idEquipo: idEquipo},
                dataType: "json",
                success: function (data) {

                    var nombre;

                    $.each(data, function (i, j) {
                        $.each(j, function (k, t) {
                            if (i != 'mejores') {
                                if (k == 'nombre_jugador')
                                    nombre = '<ul style="te">Nombre: ' + t + '';
                                if (k == 'posicion_jugador')
                                    $('#contenedor_jugadores').append(nombre + '     <br>Posición: ' + t + '</ul>');

                            }
                        })
                    })
                }
            })
        //})

    });
});