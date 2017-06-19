<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>Basketmunio_login</title>
    <link rel="stylesheet" href="../css/estilos_calendario_1366px.css">
    <link rel="stylesheet" href="../css/fontello.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/calendario/cargaCalendario.js"></script>

    <?php
                session_start();
                if(!isset($_SESSION['id_usuario']))
                    header("Location: /basketmunio/view/html/login.php");

    ?>

</head>


<section id="contenedor_loguin">

    <!--formulario del logueo con una imagen de fondo varios enlaces y demás cosas-->

    <nav id="menu_cabecera">

        <input type="checkbox" id="menu-bar">
        <label class="icon-menu" for="menu-bar"></label>

                    <div id="menu_contenedor_img">

                         <img src="../img/logo.png">

                    </div>
                    <div class="menu_contenedor_ul">

                        <ul>

                            <li><a href="pagina_principal.php">Inicio</a></li>

                            <li><a href="creaEquipo.php">Mis equipos</a>
                                <ul class="secundario">
                                    <li><a href="misequipos.php">Plantilla</a></li>
                                    <li><a href="mis_ligas.php">Clasificación</a></li>
                                    <li><a href="mercado.php">Mercado</a></li>
                                </ul>
                            </li>

                            <li><a href="busca_liga.html">Ligas</a>
                                <ul class="secundario">
                                    <li><a href="busca_liga.html">Mis ligas</a></li>
                                    <li><a href="mis_ligas.php">Ligas</a></li>
                                </ul>
                            </li>


                        <li><a href="calendario.php">Calendario</a></li>
                        <li><a href="ayuda.hmtl">Ayuda</a></li>
                        <li><a href="logout.php">Cerrar sesión</a></li>

                        </ul>

                </div>

    </nav>

    <form id="eleccion_mes">

        Mes:
        <select id="select_mes">

            <option selected>Selecciona el mes</option>
            <optgroup label="2016">
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </optgroup>
            <optgroup label="2017">
                <option value="1">Enero</option>
                <option value="2">Febrero</option>
                <option value="3">Marzo</option>
                <option value="4">Abril</option>
            </optgroup>

        </select>

    </form>


    <div id="contenedor_tabla">

        <table id='ligas'>
            <thead>
            <tr><th>Fecha</th><th>Equipo Local</th><th>Resultado</th><th>Equipo Visitante</th></tr>
            </thead>
            <tbody>

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