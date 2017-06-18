


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


    $.ajax({
        type: 'POST',
        url: "../../controllers/CRestControladorEquipo.php", //hay que poner 2 ../ por que aqui no tengo la estructura view
        data: {ejecutar : "equipoDestacado"},
        dataType:"json",
        success: function(data) {



            for(var i = 0; i<3; i++){

                if(i == 0){
                    $('#vermas h2').append( data[i]);
                }
                if(i == 1){
                    $('#vermas2 h2').append( data[i]);
                }
                if(i == 2){
                    $('#vermas3 h2').append( data[i]);
                }


            }
        }
    });

    /*if($.ajax){
        $("#nombre_liga").val("");
        $("#formulario_creacion").append("<div id='caja_mensaje'><p>Liga Creada Correctamente</p></div>");
    }*/

    $.ajax({
        type: 'POST',
        url: "../../controllers/CRestControladorEquipo.php", //hay que poner 2 ../ por que aqui no tengo la estructura view
        data: {ejecutar : "escudoDestacado"},
        dataType:"json",
        success: function(data) {



            for(var i = 0; i<3; i++){

                if(i == 0){
                    $('#imagen1').append("<img  src='../img/escudos/"+data[i]+"'>" );//hay que añadir ../
                }
                if(i == 1){
                    $('#imagen2').append("<img  src='../img/escudos/"+data[i]+"'>");//hay que añadir ../
                }
                if(i == 2){
                    $('#imagen3').append("<img  src='../img/escudos/"+data[i]+"'>");//hay que añadir ../
                }


            }
        }
    });


    $.ajax({
        type: 'POST',
        url: "../../controllers/CRestControladorEquipo.php", //hay que poner 2 ../ por que aqui no tengo la estructura view
        data: {ejecutar : "jugadorDestacado"},
        dataType:"json",
        success: function(data) {

             $.each(data,function(i,j){
                $.each(j,function (k,t) {
                        //$.parseJSON(data[k])
                        console.log(t);
                    if(i == 0){
                        $('#jugador1 h2').append(t+" | ");
                    }
                    if(i == 1){
                        $('#jugador2 h2').append(t+" | ");

                    }
                    if(i == 2){
                        $('#jugador3 h2').append(t+" | ");
                    }
                })
             });

            /*
            /*for(var i = 0; i<3; i++){
                for(var j=0; j< data[i].length;j++){
                    if(i == 0){
                        $('#jugador1 h2').append( data[i]);
                    }
                    if(i == 1){
                        $('#jugador2 h2').append( data[i]);
                    }
                    if(i == 2){
                        $('#jugador3 h2').append( data[i]);
                    }
                }


            }*/
        }
    });



});

