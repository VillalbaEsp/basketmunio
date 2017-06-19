
$( document ).ready(function() {

    $.ajax({
        type: 'POST',
        url: "../../controllers/CRestControladorEquipo.php",
        data: {metodo: "misEquipos"},
        dataType: "json",
        success: function (data) {

            for(var i=0; i<data.length; i++) {
                $("#misEquipos").append('<option value="' + data[i]['id_equipo'] + '">'+ data[i]['nombre_equipo'] + '</option>');
            }
        }
    });

    $("#select_mes").change(function () {

        var equipo = $(this).val();

        $( "#ligas tbody tr" ).each( function(){
            this.parentNode.removeChild( this );
        });

        $.ajax({
            type: 'POST',
            url: "../../controllers/CRestControladorEquipo.php",
            data: {equipo: equipo, ejecutar: "estadisticas"},
            dataType: "json",
            success: function (data) {

                var nombre,partidos,minutos,puntos, asistencias, tapones, reb, dreb, oreb, robos;

                $.each(data,function(indice,array){
                    $.each(array,function (indice, valor) {
                        if(indice == 0)
                            nombre = valor;
                        if(indice == 2)
                            partidos = valor;
                        if(indice == 3)
                            minutos = valor;
                        if(indice == 4)
                            puntos = valor;
                        if(indice == 5)
                            asistencias = valor;
                        if(indice == 6)
                            tapones = valor;
                        if(indice == 7)
                            reb = valor;
                        if(indice == 8)
                            dreb = valor;
                        if(indice == 9)
                            oreb = valor;
                        if(indice == 10)
                            robos = valor;
                    })
                    $('#ligas tbody').append('<tr><td>' + nombre + '</td><td>' + partidos + '</td><td>' + minutos + '</td><td>' + puntos + '</td><td>' + asistencias + '</td><td>' + tapones + '</td><td>' + reb + '</td><td>' + dreb + '</td><td>' + oreb + '</td><td>' + robos + '</td></tr>');
                });
            }
        });
    })
});