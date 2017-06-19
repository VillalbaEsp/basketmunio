<!DOCTYPE html>

<html>
    <head>
            <meta charset="utf-8">
            <title>Basketmunio</title>
            <link rel="stylesheet" href="../css/estilo_pagina_principal_1366px.css">
            <link rel="stylesheet" href="../css/fontello.css">
            <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
            <script src="../js/jquery-3.1.1.min.js"></script>
            <script src="../js/pagina_principal/pagina__principal.js"></script>
            <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

        </head>
            <?php
                session_start();
                if(!isset($_SESSION['id_usuario']))
                    header("Location: /basketmunio/view/html/login.php");

            ?>
        <body>

            <section id="contenedor_loguin">

                <!--formulario del logueo con una imagen de fondo varios enlaces y demás cosas-->

                <nav id="menu_cabecera">

                    <input type="checkbox" id="menu-bar">
                    <label class="icon-menu" for="menu-bar" id="icono-menu"></label>


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

                            <li><a href="busca_liga.php">Ligas</a>
                                <ul class="secundario">
                                    <li><a href="busca_liga.php">Mis ligas</a></li>
                                    <li><a href="mis_ligas.php">Ligas</a></li>
                                    <li><a href="estadisticas.php">Estadisticas</a></li>
                                </ul>
                            </li>


                        <li><a href="calendario.php">Calendario</a></li>
                        <li><a href="ayuda.php">Ayuda</a></li>
                        <li><a href="logout.php">Cerrar sesión</a></li>

                        </ul>

                </div>

                </nav>
                <div id="contenedor_slider">
                    <div class = "titular"><h1>DESTACADOS</h1></div>
                    <div id="slider">
                        <div><img src="../img/imagen1.jpg"/></div>
                        <div><img src="../img/imagen_estadistica.jpg"/></div>
                        <div><img src="../img/imagen4.jpg"/></div>
                        <div><img src="../img/imagen5.jpg"/></div>
                    </div>
                    <div id="titulos">
                        <div class="titulo">El Mejor Concurso de mates<br>
                            <p>La NBA prepara una nueva emisión centrada en el concurso de mates que este año sera expectacular,donde se centrará
                                en el nuevo formato del concurso y llevará a grandes estrellas del pasado</p>
                        </div>
                        <div class="titulo">La audiencia de la NBA aumenta a pasos agigantados<br>
                            <p>En los últimos partidos de la NBA televisados por el mundo ha llegado a tener picos de audiencia muy elevados
                                esto evidencia la pasion de los aficionados fuera de Estados Unidos y ya se pide a gritos una gira de la NBA por Europa</p>
                        </div>
                        <div class="titulo">El partido de USA vs Resto del mundo<br>
                            <p>El popular partido de USA vs Resto del mundo ya es una tradición donde los mas jovenes talentos de la NBA se enfrentarán para ver quien domina New Orleans</p>

                        </div>
                        <div class="titulo">Torneo al aire libre organizado por la NBA<br>
                            <p>La NBA prepara una nueva cita del torneo que se celebrará en los Angeles al aire libre puede inscribirse cualquiera y los premios serán
                                desde camisetas oficiales hasta entradas en primera fila para los play offs</p>

                        </div>
                    </div>

                </div>
                <div id="contenido_principal">
                    <div class = "titular"><h1>JUGADORES DESTACADOS</h1></div>
                    <div id="jugadores_destacados">

                        <div class="jugador_destacado">
                            <div class="contenido_jugador_destacado" id="jugador1">
                                <h2></h2>
                            </div>
                        </div>

                        <div class="jugador_destacado">
                            <div class="contenido_jugador_destacado" id="jugador2">
                                <h2></h2>
                            </div>
                        </div>

                        <div class="jugador_destacado">
                            <div class="contenido_jugador_destacado" id="jugador3">
                                <h2></h2>
                            </div>
                        </div>

                    </div>
                    <div class = "titular" id="titular_equipos"><h1>EQUIPOS DESTACADOS</h1></div>
                    <div id="equipos_destacados">

                        <div class="equipo_destacado">
                            <div class="contenido_equipo_destacado">
                                <div class="contenido_equipo_imagen" id="imagen1">

                                </div>
                                <div class="contenido_equipo">
                                    <span id="vermas"><h2></h2></span>
                                </div>
                            </div>
                        </div>

                        <div class="equipo_destacado">
                            <div class="contenido_equipo_destacado">
                                <div class="contenido_equipo_imagen" id="imagen2">

                                </div>
                                <div class="contenido_equipo">
                                    <span id="vermas2"><h2></h2></span>
                                </div>
                            </div>
                        </div>

                        <div class="equipo_destacado">
                            <div class="contenido_equipo_destacado">
                                <div class="contenido_equipo_imagen" id="imagen3">

                                </div>
                                <div class="contenido_equipo">
                                    <span id="vermas3"><h2></h2></span>
                                </div>
                            </div>
                        </div>

                    </div>




                </div>
                <div id="tweets">
                    <div class = "titular"><h1>TWEETS</h1></div>
                    <div id="contenido_tweets">
                        <a class="twitter-timeline" data-lang="es" data-height="452" data-link-color="#19CF86" href="https://twitter.com/BasketmunioTS">Tweets by BasketmunioTS</a>
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
