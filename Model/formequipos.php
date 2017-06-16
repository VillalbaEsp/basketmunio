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
<form id="formulario" action="../controllers/CRestControladorAddEquipo.php"  method="post">

                       <label for="input_nombre_equipo">Nombre Equipo:</label>
                       <input type="text" name="nombre_equipo" id="input_nombre_equipo" placeholder="Nombre">

                       <label for="input_escudo">Escudo:</label>
                       <input type="text" name="escudo" id="input_escudo" placeholder="escudo">

                       <input type="submit" name="envio_registro" id="button_registro" value="Enviar">
</form>
 </body>
</html>