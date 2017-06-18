<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>Basketmunio_login</title>
    <link rel="stylesheet" href="../css/estilo_ayuda_1366px.css">
    <link rel="stylesheet" href="../css/fontello.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/Ligas/ligas.js"></script>

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

            <img src="../img/Equipo4-naranja.png">

        </div>

        <div class="menu_contenedor_ul" id="menu_dcha">

            <ul>

                <li><a href="#">Calendario</a></li>
                <li><a href="#">Ayuda</a></li>

            </ul>

        </div>

    </nav>

    <div id="contenedor_info">

        <article class="articulo" id="paradero">

            <h1>¿Quienes somos?</h1>

            <p>Hola, somos basketmunio una web para el ocio sin ánimo de lucro donde tú y tus amigos podeís enfrentaros a otras personas para conseguir el primer puesto de una liga.</p>

        </article>

        <article class="articulo" id="instrucciones">

            <h1>¿Cómo funciona?</h1>

            <p>Lo primero que deberás hacer, es crearte un equipo podrás acceder a esta opción en el menú de arriba en Mis Equipos, después dirigete a mercado donde se encontrarán los
            jugadores que quedan libres en tu liga y donde los podrás comprar tienes un presupuesto inicial y no podras excederlo por lo tanto compra jugadores con cabeza y no los mas caros.<br>
            Para poder fichar a un jugador vale con que lo arrastres hacia tu plantilla o pulses el boton de añadir situado a la izquierda del nombre del jugador, siempre que quieras puedes volver
            al mercado y arrastrar los jugadores que no quieras al mercado devolviendote su valor original.<br>
            <br>Dicho esto ya tienes tu equipo por tanto si te diriges al menu Mis Equipos y dentro de este  Plantilla podrás confeccionar tu plantilla como deses, para esto basta con que los ordenes de mayor
            a menor prioridad para tener tu quinteto inicial listo (todos los jugadores puntuan, pero los titulares lo haran más).<br>
            <br>Después de todo esto ya estas listo para jugar y para ello debes unirte a una liga o crearla tu mismo para ello dirígete hacia el menú Ligas y dentro de este Ligas, aquí encontrarás ligas creadas por defecto y
            ligas creadas por los usuarios, puedes unirte a ellas o en cambio crear la tuya propia para poder jugar con tus amigos<br>
            En nuestra web también hay más opciones para mantenerte al tanto de que jugadores son mas valiosos en Estadísticas o ver contra quien juegan tus jugadores en Calendario.<br></p>

        </article>

        <article class="articulo" id="contacto">

            <h1>¿Algo no funciona?</h1>

            <p>Si algo esta "roto" , no funciona , o simplemente hay datos que no concuerdan o son erroneos por favor contáctanos a <span class="email">basketmunio@gmail.com</span>, en asunto pon el problema en sí , y en el contenido por favor
            trata de explicar como se produjo el error o por que esos datos están mal. También aceptamos sugerencias para mejorar la web o algunos aspectos que puedan ser mejorados para ello contacta a <span class="email">basketmunio@gmail.com</span>
                y envianos un mensaje con lo que quieres que mejoremos.</p>

        </article>

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