$(document).ready(function() {
    var inputPassword1 = $("#input_password1");

    var inputPassword2 = $("#input_password2");

    function validaPassword1() {
        //NO tiene minimo de 5 caracteres o mas de 12 caracteres
        if (inputPassword1.val().length < 5 || !inputPassword1.val().length > 12) {
            inputPassword1.addClass("error");
            return false;
        }
        // SI longitud, NO VALIDO numeros y letras
        else if (!inputPassword1.val().match(/^[0-9a-zA-Z]+$/)) {
            inputPassword1.addClass("error");
            return false;
        }
        // SI rellenado, SI email valido
        else {
            inputPassword1.removeClass("error");
            return true;
        }
    }

    function validaPassword2() {
        //NO son iguales las password
        if (inputPassword1.val() != inputPassword2.val()) {
            inputPassword2.addClass("error");
            return false;
        }
        // SI son iguales
        else {
            inputPassword2.removeClass("error");
            return true;
        }
    }

    inputPassword1.blur(validaPassword1);
    inputPassword2.blur(validaPassword2);

    $("#button_registro").click(function (e) {
        if (validaPassword1() && validaPassword2()) {

            var password = $("#input_password1").val();

            var codigoUrl = $("#codigo_url").val();

            $.ajax({
                type: 'POST',
                url: "../../controllers/CRestControladorRegistroUser.php",
                data: {password: password, codigoUrl: codigoUrl,ejecuta: "nuevaPassword"},
                dataType: 'json',
                success: function (data) { //true
                    if (data['estado'] == 'correcto')
                        window.location.href = "olvido_password_nueva.php?success";
                    if (data['estado'] == 'incorrecto')
                        window.location.href = "olvido_password_nueva.php?error&codigo="+codigoUrl;
                }
            });
        }else{
            window.location.href = "olvido_password_nueva.php?error&codigo="+codigoUrl;
        }
    });
});