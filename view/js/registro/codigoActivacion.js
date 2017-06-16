$(document).ready(function(){
    $("#button_registro").click(function() {

        var codigo = $("#input_codigo").val();

        $.ajax({
            type: 'POST',
            url: "../../controllers/CRestControladorRegistroUser.php",
            data: {codigo: codigo, ejecuta: "activaUser"},
            dataType: "JSON",
            success: function (res) {
                alert(res.validar);
                if(res.validar == "true")
                    window.location.href = "registro-correcto.php?success";
                else
                    window.location.href = "registro-correcto.php?error";
            }
        });
    });
});