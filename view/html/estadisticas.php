<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>Basketmunio</title>
    <link rel="stylesheet" href="../css/estilos_calendario_1366px.css">
    <link rel="stylesheet" href="../css/fontello.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/equipos/estadisticas.js"></script>

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

    <form id="eleccion_mes">

        Selecciona:
        <select id="select_mes">

            <option selected>Selecciona que estadísticas quieres</option>
            <optgroup label="Mis Equipos" id="misEquipos">
                <!-- CONTENIDO CON jQUERY -->
            </optgroup>
            <optgroup label="Todos">
                <option value="todos">Todos los jugadores</option>
            </optgroup>

        </select>

    </form>


    <div id="contenedor_tabla">

        <table id='ligas'>
            <thead>
                <tr><th>Nombre</th><th>Partidos</th><th>Minutos</th><th>Puntos</th><th>Asistencias</th><th>Tapones</th><th>Reb. totales</th><th>Reb. defensivos</th><th>Reb. ofensivos</th><th>Robos</th></tr>
            </thead>
            <tbody>
                <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            </tbody>
        </table>



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