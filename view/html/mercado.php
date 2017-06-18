<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>Basketmunio_login</title>
    <link rel="stylesheet" href="../css/estilo_mercado_1366px.css">
    <link rel="stylesheet" href="../css/fontello.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="../js/mercado/mercado.js"></script>

    <?php
        session_start();
        if(!isset($_SESSION['id_usuario']))
            header("Location: /basketmunio/view/html/login.php");

        ?>

</head>


<section id="contenedor_loguin">

    <!--formulario del logueo con una imagen de fondo varios enlaces y demás cosas-->

    <nav id="menu_cabecera">

        <!--<input type="checkbox" id="menu-bar">
        <label class="icon-menu" for="menu-bar"></label>-->



        <div class="menu_contenedor_ul">

            <ul>

                <li><a href="#">Inicio</a></li>

                <li><a href="#">Mis equipos</a>
                    <ul class="secundario">
                        <li><a href="#">Plantilla</a></li>
                        <li><a href="#">Clasificación</a></li>
                        <li><a href="#">Mercado</a></li>
                    </ul>
                </li>

                <li><a href="#">Ligas</a>
                    <ul class="secundario">
                        <li><a href="#">Mis ligas</a></li>
                        <li><a href="#">Ligas</a></li>
                    </ul>
                </li>

            </ul>

        </div>

        <div id="menu_contenedor_img">

            <img src="../img/logo.png">

        </div>

        <div class="menu_contenedor_ul" id="menu_dcha">

            <ul>

                <li><a href="#">Calendario</a></li>
                <li><a href="#">Ayuda</a></li>

            </ul>

        </div>

    </nav>


    <div id="caja_contenido">
        <div id="select_equipo">

            <select>
                <option>Selecciona tu equipo</option>
            </select>

        </div>

        <div id="caja_jugadores">
            <div class="titular"><h1>PLANTILLA</h1></div>
            <div id="contenedor_jugadores">
                <!-- CONTENIDO CON jQUERY -->
            </div>
        </div>

        <div id="caja_mercado">
            <div class="titular"><h1>MERCADO</h1></div>
            <div id="contenido_mercado">

                <li class="fila" id="fila1"><input type="checkbox" class="añadir" id="añadir1"><input type="checkbox" class="eliminar" id="añadir1e"><label class="icon-plus-circle" for="añadir1"></label><label class="icon-minus-circle" for="añadir1e"></label>JUGADOR1</li>

            </div>

        </div>


    </div>

</section>
<footer id="contenedor_footer">

    <div id="caja_info">

        <div id="info">

            <h4>Puedes seguirnos</h4>

            <a href="https://es-es.facebook.com/" class="icon-facebook"></a> |
            <a href="https://twitter.com/BasketmunioTS" class="icon-twitter-bird"></a>
            <p>Basketmunio creado y diseñado para fines no lucrativos | <span class="icon-copyright"></span> BASKETMUNIO</p>

        </div>

    </div>

</footer>
</body>
</html>