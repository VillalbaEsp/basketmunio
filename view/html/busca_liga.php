<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>Basketmunio</title>
    <link rel="stylesheet" href="../css/estilo_busca_liga_1366px.css">
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

            <img src="../img/logo.png">

        </div>

        <div class="menu_contenedor_ul" id="menu_dcha">

            <ul>

                <li><a href="#">Calendario</a></li>
                <li><a href="#">Ayuda</a></li>

            </ul>

        </div>

    </nav>

    <div id="contenedor_form">
        <h1>Busca una liga o Creala</h1>
        <form id="formulario_search" method="post">

            <input type="text" name="search" id="search" placeholder="Nombre de la liga">
            <input type="button" name="envio_search" id="envio_search" value="Buscar">

        </form><!--action="../controllRegistroLigaController.php.php"-->
            <form id="formulario_creacion" method="post">

                <!--<label for="nombre_liga">Nombre Equipo:</label>-->
                <input type="text" name="nombre_liga" id="nombre_liga" placeholder="Nombre Liga"><br>

                <select name="tipo_liga" id="tipo_liga">
                    <option value="pu">Pública</option>
                    <option value="pv">Privada</option>
                </select><br>

                <!-- <label for="password">Contraseña:</label><br>-->
                <input type="text" name="password" id="password" placeholder="Contraseña">

                <input type="button" name="envio_liga" id="registro_liga" value="Crear">

               <!-- <input type="text" name="input_crear" id="input_crear" placeholder="Nombre de la liga">
                <input type="submit" name="crear" id="crear" value="Crear">-->

            </form>
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