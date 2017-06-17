$(document).ready(function(){
    $("#button_registro").click(function(e) {

        var codigo = $("#input_codigo").val();

        $.ajax({
            type: 'POST',
            url: "../../controllers/CRestControladorRegistroUser.php",
            data: {codigo: codigo, ejecuta: "activaUser"},
            dataType: 'json',
            success: function (data) { //true
                if(data.success == true){
                    alert('success');
                    window.location.href = "registro-correcto.php?success";
                }

            },

            error: function (data) { //false
                window.location.href = "registro-correcto.php?error";
            }
        });
    });
});