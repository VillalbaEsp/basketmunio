$(document).ready(function() {
    $("#ok").hide();

    $("#formid").validate({
        rules: {
            input_apodo: { required: true, minlength: 2, maxlength: 25},
            input_nombre: { required: true, minlength: 2, maxlength: 40},
            input_apellidos { required: true, minlength: 2,maxlength: 70},
            input_correo { required:true, email: true, maxlength: 100},
            input_f_nacimiento: { minlength: 2, maxlength: 15},
            input_password: { required: true},
            input_conf_password: { required:true, minlength: 2}
        },
        messages: {
            name: "Debe introducir su nombre.",
            lastname: "Debe introducir su apellido.",
            email : "Debe introducir un email válido.",
            phone : "El número de teléfono introducido no es correcto.",
            years : "Debe introducir solo números.",
            message : "El campo Mensaje es obligatorio.",
        },
        submitHandler: function(form){
            var dataString = 'name='+$('#name').val()+'&lastname='+$('#lastname').val()+'...';
            $.ajax({
                type: "POST",
                url:"send.php",
                data: dataString,
                success: function(data){
                    $("#ok").html(data);
                    $("#ok").show();
                    $("#formid").hide();
                }
            });
        }
    });
});