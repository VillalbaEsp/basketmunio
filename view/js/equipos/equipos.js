$( document ).ready(function() {

var escudo;
    $(".escudo").click(function () {

       escudo=$(this).text();

    });


    $("#button_registro").click(function () {
        var nombre_equipo = $("#nombre_equipo").val();
        var nombre_liga = $("#nombre_liga").val();

        $.ajax({
            type: 'POST',
            url: "../../controllers/CRestControladorEquipo.php", //hay que poner 2 ../ por que aqui no tengo la estructura view
            data: {nombre_equipo:nombre_equipo, nombre_liga:nombre_liga, escudo:escudo, ejecutar: "creaEquipo"},
            dataType: "json",
        });
    });
});