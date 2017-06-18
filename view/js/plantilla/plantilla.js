$( document ).ready(function() {

    $.ajax({
        type: 'POST',
        url: "../../controllers/CRestControladorEquipo.php",
        data: {metodo: "misEquipos"},
        dataType: "json",
        success: function (data) {

            for(var i=0; i<data.length; i++) {
                $('#select_equipo select').append('<option value="' + data[i]['id_equipo'] + '">'+ data[i]['nombre_equipo'] + '</option>');
            }
        }
    });

$( "#select_equipo select" ).change(function () {

    var idEquipo = $(this).val();

    $.ajax({
        type: 'POST',
        url: "../../controllers/CRestControladorEquipo.php",
        data: {metodo: "muestraInfo", idEquipo: idEquipo},
        dataType: "json",
        success: function (data) {

            var nombre;

            $.each(data,function(i,j){
                $.each(j,function (k, t) {
                    if(i != 'mejores'){
                        if(k == 'nombre_jugador')
                            nombre = '<li style="te">Nombre: '+ t +'';
                        if(k == 'posicion_jugador')
                            $('.titular').append( nombre + '     <br>Posición: ' + t +'</li>');
                        if(k == 'nombre_jugador' && i < 6)
                        $("#caja_imagen").append("<span id='jugador" + i + "'>" + t + "</span>");

                    }
                })
            });

            $('#caja_estadistica').append("<li>Jugador con mayor puntuación: </li>" + data['mejores'][0] + "<li>Jugador con más asistencias: </li>" + data['mejores'][1] + "<li>Jugador que coge más rebotes defensivos: </li>" + data['mejores'][2] + "<li>Jugador que coge más rebotes ofensivos: </li>" + data['mejores'][3] + "<li>Jugador con mas tapones: </li>" + data['mejores'][4] + "<li>Jugador con mas robos: </li>" + data['mejores'][5] + "");            }

    })

});
});