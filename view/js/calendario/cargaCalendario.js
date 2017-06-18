$( document ).ready(function() {
    $("#select_mes").change(function () {

        var mes = $(this).val();

        $( "#ligas tbody tr" ).each( function(){
            this.parentNode.removeChild( this );
        });

        $.ajax({
            type: 'POST',
            url: "../../controllers/CRestControladorLiga.php",
            data: {mes: mes, ejecutar: "calendario"},
            dataType: "json",
            success: function (data) {

                var fecha,eLocal,eVisitante,resultado;

                $.each(data,function(indice,array){
                    $.each(array,function (indice, valor) {
                        if(indice == 'fecha_hora_partido')
                            fecha = valor;
                        if(indice == 'equipo_local_partido')
                            eLocal = valor;
                        if(indice == 'equipo_visitante_partido')
                            eVisitante = valor;
                        if(indice == 'resultado_partido')
                            resultado = valor;
                    })
                    $('#ligas tbody').append('<tr><td>'+ fecha +'</td><td>'+ eLocal +'</td><td>'+ resultado +'</td><td>'+ eVisitante +'</td></tr>');
                });
            }
        });
    })
});

