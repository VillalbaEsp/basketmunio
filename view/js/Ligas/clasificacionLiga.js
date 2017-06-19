// Carga tabla Liga/Equipo
$( document ).ready(function() {

    $.ajax({
        type: 'POST',
        url: "../../controllers/CRestControladorLiga.php",
        data: {ejecutar: "equipoliga"},
        dataType: "json",
        success: function (data) {

            $.each(data,function(indice,objeto){
                var nombreLiga;
                var nombreEquipo;
                var idLiga;
                $.each(objeto,function (propiedad, valor) {
                        if(propiedad == 1)
                            nombreEquipo= valor;
                        if(propiedad == 2)
                            idLiga = valor;
                        if(propiedad == 3)
                            nombreLiga = valor;
                })
                $('#select_misliga').append("<optgroup label='Liga: "+nombreLiga+"'>");
                $('#select_misliga').append("<option value='"+idLiga+"'>Equipo: "+nombreEquipo+"</option>");
            });
        }
    });

    $( "#select_misliga" ).change(function () {

        var idLiga = $(this).val();
        $( "#contenedor_clasificacion_miliga table tbody" ).empty();

        $.ajax({
            type: 'POST',
            url: "../../controllers/CRestControladorLiga.php",
            data: {ejecutar: "clasificacion", idLiga: idLiga},
            dataType: "json",
            success: function (data) {

                var nombre;
                var posicion = 1;
                $.each(data,function(indice,objeto){
                    var propietario;
                    var nombreEquipo;
                    var puntos;

                    $.each(objeto,function (propiedad, valor) {
                        if(propiedad == 'nombre_equipo')
                            nombreEquipo= valor;
                        if(propiedad == 'apodo_usuario')
                            propietario = valor;
                        if(propiedad == 'pts_equipo')
                            puntos = valor;
                    })
                    $('#contenedor_clasificacion_miliga table tbody').append("<tr><td>"+posicion+"</td><td>"+nombreEquipo+"</td><td>"+propietario+"</td><td>"+puntos+"</td></tr>");
                    posicion++;
                });

        }
        });

    });
});