$(document).ready(function(){
    $("#button_registro").click(function(e) {

        var codigo = $("#input_codigo").val();

        $.ajax({
            type: 'POST',
            url: "../../controllers/CRestControladorRegistroUser.php",
            data: {codigo: codigo, ejecuta: "activaUser"},
            dataType: 'json',
            success: function (data) { //true
                    if(data['estado'] == 'correcto')
                        window.location.href = "registro-correcto.php?success";
                    if(data['estado'] == 'incorrecto')
                        window.location.href = "registro-correcto.php?error";
                }
        });
    });
});