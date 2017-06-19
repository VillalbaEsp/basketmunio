$(document).ready(function(){
    $("#button_registro").click(function(e) {

        var correo = $("#input_codigo").val();

        $.ajax({
            type: 'POST',
            url: "../../controllers/CRestControladorRegistroUser.php",
            data: {correo: correo, ejecuta: "olvidoPassword"},
            dataType: 'json',
            success: function (data) { //true
                    if(data['estado'] == 'correcto')
                        window.location.href = "olvido_password.php?success";
                    if(data['estado'] == 'incorrecto')
                        window.location.href = "olvido_password.php?error";
                }
        });
    });
});