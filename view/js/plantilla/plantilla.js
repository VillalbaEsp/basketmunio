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

            for(var i=0; i<data.length; i++) {
                $('.titular').append('<li style="te">Nombre: '+ data[i]['nombre_jugador'] + '     <br>Posición: ' + data[i]['posicion_jugador'] +'</li>');
                if(i < 6)
                $("#caja_imagen").append("<span id='jugador" + i + "'>" + data[i]['nombre_jugador'] + "</span>");
            }
        }
    })

});
});