<!DOCTYPE html>

<html>
    <head>
            <meta charset="utf-8">
            <title>Basketmunio_login</title>
            <link rel="stylesheet" href="../css/estilo_pagina_principal_1366px.css">
            <link rel="stylesheet" href="../css/fontello.css">
            <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
            <script src="../js/jquery-3.1.1.min.js"></script>
            <script src="../js/pagina_principal/pagina__principal.js"></script>
            <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
            <?php
                session_start();
                if(!isset($_SESSION['id_usuario']))
                    header("Location: /basketmunio/view/html/login.php");

            ?>
        </head>

        <body>

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
                        <li><a href="logout.php">Cerrar sesión</a></li>

                    </ul>

                    </div>

                </nav>

                <form id="formulario" action="../../controllers/CRestControladorEquipo.php" method="post">
                    <label for="input_nombre_equipo">Nombre Equipo:</label>
                    <input type="text" name="nombre_equipo" id="input_nombre_equipo" placeholder="Nombre">
                    <label for="input_escudo">Escudo:</label>
                    <input type="text" name="escudo" id="input_escudo" placeholder="escudo">
                    <label for="input_escudo">Nombre de la Liga:</label>
                    <!-- Añadido--><input type="text" name="nombre_liga" id="input_nombre_liga" placeholder="Nombre de la Liga">
                    <input type="submit" name="envio_registro" id="button_registro" value="Enviar">
                </form>

                <div id="contenedor_slider">
                    <div class = "titular"><h1>DESTACADOS</h1></div>
                    <div id="slider">
                        <div><img src="../img/imagen1.jpg"/></div>
                        <div><img src="../img/imagen_estadistica.jpg"/></div>
                        <div><img src="../img/imagen4.jpg"/></div>
                        <div><img src="../img/imagen5.jpg"/></div>
                    </div>
                    <div id="titulos">
                        <div class="titulo">Nuevo Nintendo Direct de Animal Crossing<br>
                            <p>Nintendo prepara una nueva emisión centrada en Animal Crossing,donde se centrara
                                en los nuevos amiibo y el futuro juego para las consolas 3DS</p>
                        </div>
                        <div class="titulo">este va con la imagen 2<br>
                            <p>Nintendo prepara una nueva emisión centrada en Animal Crossing,donde se centrara
                                en los nuevos amiibo y el futuro juego para las consolas 3DS</p>
                        </div>
                        <div class="titulo">este va con la imagen 3<br>
                            <p>Nintendo prepara una nueva emisión centrada en Animal Crossing,donde se centrara
                                en los nuevos amiibo y el futuro juego para las consolas 3DS</p>

                        </div>
                        <div class="titulo">este va con la imagen 4<br>
                            <p>Nintendo prepara una nueva emisión centrada en Animal Crossing,donde se centrara
                                en los nuevos amiibo y el futuro juego para las consolas 3DS</p>

                        </div>
                    </div>

                </div>
                <div id="contenido_principal">
                    <div class = "titular"><h1>JUGADORES DESTACADOS</h1></div>
                    <div id="jugadores_destacados">

                        <div class="jugador_destacado">
                            <div class="contenido_jugador_destacado">

                            </div>
                        </div>

                        <div class="jugador_destacado">
                            <div class="contenido_jugador_destacado">

                            </div>
                        </div>

                        <div class="jugador_destacado">
                            <div class="contenido_jugador_destacado">

                            </div>
                        </div>

                    </div>
                    <div class = "titular" id="titular_equipos"><h1>EQUIPOS DESTACADOS</h1></div>
                    <div id="equipos_destacados">

                        <div class="equipo_destacado">
                            <div class="contenido_equipo_destacado">
                                <div class="contenido_equipo_imagen">
                                    <img src="../img/escudos/Equipo1-amarillo.png">
                                </div>
                                <div class="contenido_equipo">
                                    <span id="vermas"><h2>NOMBRE EQUIPO</h2></span>
                                </div>
                            </div>
                        </div>

                        <div class="equipo_destacado">
                            <div class="contenido_equipo_destacado">
                                <div class="contenido_equipo_imagen">
                                    <img src="../img/escudos/Equipo1-amarillo.png">
                                </div>
                                <div class="contenido_equipo">
                                    <span id="vermas2"><h2>NOMBRE EQUIPO</h2></span>
                                </div>
                            </div>
                        </div>

                        <div class="equipo_destacado">
                            <div class="contenido_equipo_destacado">
                                <div class="contenido_equipo_imagen">
                                    <img src="../img/escudos/Equipo1-amarillo.png">
                                </div>
                                <div class="contenido_equipo">
                                    <span id="vermas3"><h2>NOMBRE EQUIPO</h2></span>
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