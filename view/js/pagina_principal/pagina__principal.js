


$(document).ready(function() {

//SLIDER
    $('#slider div:gt(0)').hide();
    setInterval(function(){
        $('#slider div:first-child').fadeOut(0)
            .next('div').fadeIn(2000)
            .end().appendTo('#slider');}, 8000);

//TITULOS DEL SLIDER

    $('#titulos div:gt(0)').hide();
    setInterval(function(){
        $('#titulos div:first-child').fadeOut(0)
            .next('div').fadeIn(2000)
            .end().appendTo('#titulos');}, 8000);



//DESCRIPCIONES DE LOS EQUIPOS


    var textoTooltip= [
        "Este equipo ha sido el que más progresión ha hecho desde que se creo ascendiendo al 5º puesto de su liga estando en el 16º",
        "Este equipo tiene la mayor racha ganadora 12 partidos consecutivos llevandose la victoria",
        "Este equipo tiene la mayor puntuacion total de equipo con 12872 puntos"
    ];


    $("#vermas").mouseenter(function (e) {
        var posMouse = e.pageX - this.offsetLeft;
            $(".contenido_equipo_destacado").append('<div class="tooltip" id="tip1">' + textoTooltip[0] + '</div>');
            //jQuery(".tooltip").css("left", "" + posMouse - 103 + "px");
            $(".tooltip").fadeIn(300);
            $(".tooltip").css("left", "50%");
            $(".tooltip").css("top", "70%");
            $(".tooltip").show(700);
     //  $("#vermas").addClass("tooltip")
       //$(".contenido_equipo_destacado").append('<div id="tip"></div>');
    });

    $("#vermas2").mouseenter(function (e) {
        var posMouse = e.pageX - this.offsetLeft;
        $(".contenido_equipo_destacado").append('<div class="tooltip" id="tip2">' + textoTooltip[1] + '</div>');
        /*jQuery(".tooltip").css("left", "" + posMouse - 103 + "px");*/
        $(".tooltip").fadeIn(300);
        $(".tooltip").css("left", "50%");
        $(".tooltip").css("top", "78%");
        $(".tooltip").show(700);
        //  $("#vermas").addClass("tooltip")
        //$(".contenido_equipo_destacado").append('<div id="tip"></div>');
    });

    $("#vermas3").mouseenter(function (e) {
        var posMouse = e.pageX - this.offsetLeft;
        $(".contenido_equipo_destacado").append('<div class="tooltip" id="tip3">' + textoTooltip[2] + '</div>');
        /*jQuery(".tooltip").css("left", "" + posMouse - 103 + "px");*/
        $(".tooltip").fadeIn(300);
        $(".tooltip").css("left", "50%");
        $(".tooltip").css("top", "85%");
        $(".tooltip").show(700);
        //  $("#vermas").addClass("tooltip")
        //$(".contenido_equipo_destacado").append('<div id="tip"></div>');
    });




    $(".contenido_equipo_destacado").mouseleave(function () {
       $(".tooltip").fadeOut(300).delay(300).queue(function () {
            $(this).remove();
            $(this).dequeue();
        });
    });

   /* jQuery.fn.creaTip = function(textoTip) {
        this.each(function(){
            elem = $(this);
            var miTip = $('<div class="tip">' + textoTip + '</div>');
            $(document.body).append(miTip);
            elem.data("capatip", miTip);

            elem.mouseenter(function(e){
                var miTip = $(this).data("capatip");
                miTip.css("left", e.pageX);
                miTip.css("top", e.pageY + 10);
                miTip.show(700);
            });
        });

        return this;
    };

    var contenido = "estadounidense Harman por 8.000 millones de dólares, una maniobra dirigida a ingresar en el creciente mercado de la tecnología para autos conectados y que le permite estar a la altura de otras competidoras actuales.El consejo de administración del primer fabricante mundial de telefonía móvil dio luz verde a esta operación que se realizará al contado, a 112 dólares la acción,según un comunicado de Samsung.Las empresa tecnológicas están apostando muy fuerte por este tipo de vehículo";
    $("#vermas").creaTip(contenido);

    $(".tip").click(function () {
        $(".tip").hide(700);
    })*/


});

