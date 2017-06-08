
<!DOCTYPE html>

	<html>

        <head>

            <meta charset="utf-8">
            <title>Basketmunio_registro</title>
            <link rel="stylesheet" href="../css/estilos_registro.css">
            <link rel="stylesheet" href="../css/fontello.css">
            <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

        </head>

 <body>
<form id="formulario" action="controlador_prueba.php"  method="post">

                       <label for="input_apodo">Apodo:</label>
                       <input type="text" name="apodo" id="input_apodo" placeholder="Apodo">

                       <label for="input_nombre">Nombre:</label>
                       <input type="text" name="nombre" id="input_nombre" placeholder="Nombre">

                       <label for="input_apellidos">Apellidos:</label>
                       <input type="text" name="apellidos" id="input_apellidos" placeholder="Apellidos">

                       <label for="input_correo">Correo Electrónico:</label>
                       <input type="text" name="correo" id="input_correo" placeholder="Correo electrónico">

                       <label for="input_f_nacimiento">Fecha Nacimiento:</label>
                       <input type="date" name="f_nacimiento" id="input_f_nacimiento" step="1" min="1950-01-01" max="<?php echo date('Y-m-d');?>" value="<?php echo date('Y-m-d');?>"><!--No funciona en firefox averiguar por que -->

                       <label for="input_password">Contraseña:</label>
                       <input type="password" name="password" id="input_password" placeholder="Contraseña">


                       <input type="submit" name="envio_registro" id="button_registro" value="Enviar">
</form>
 </body>
</html>