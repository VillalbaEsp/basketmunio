<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>Basketmunio</title>
    <link rel="stylesheet" href="../css/estilo_creaEquipo_1366px.css">
    <link rel="stylesheet" href="../css/fontello.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/equipos/equipos.js"></script>

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

    <div id="escudo">
        <div class="escudo"> <img src="../img/escudos/Equipo1-amarillo.png">Equipo1-amarillo.png</div>
        <div class="escudo"> <img src="../img/escudos/Equipo1-gris.png">Equipo1-gris.png</div>
        <div class="escudo"> <img src="../img/escudos/Equipo1-naranja.png">Equipo1-naranja.png</div>
        <div class="escudo"> <img src="../img/escudos/Equipo1-rojo.png">Equipo1-rojo.png</div>
        <div class="escudo"> <img src="../img/escudos/Equipo1-verde.png">Equipo1-verde.png</div>
        <div class="escudo"> <img src="../img/escudos/Equipo2-amarillo.png">Equipo2-amarillo.png</div>
        <div class="escudo"> <img src="../img/escudos/Equipo2-gris.png">Equipo2-gris.png</div>
        <div class="escudo"> <img src="../img/escudos/Equipo2-naranja.png">Equipo2-naranja.png</div>
        <div class="escudo"> <img src="../img/escudos/Equipo2-rojo.png">Equipo2-rojo.png</div>
        <div class="escudo"> <img src="../img/escudos/Equipo2-verde.png">Equipo2-verde.png</div>
        <div class="escudo"> <img src="../img/escudos/Equipo3-amarillo.png">Equipo3-amarillo.png</div>
        <div class="escudo"> <img src="../img/escudos/Equipo3-gris.png">Equipo3-gris.png</div>
        <div class="escudo"> <img src="../img/escudos/Equipo3-naranja.png">Equipo3-naranja.png</div>
        <div class="escudo"> <img src="../img/escudos/Equipo3-rojo.png">Equipo3-rojo.png</div>
        <div class="escudo"> <img src="../img/escudos/Equipo3-verde.png">Equipo3-verde.png</div>
        <div class="escudo"> <img src="../img/escudos/Equipo4-amarillo.png">Equipo4-amarillo.png</div>
        <div class="escudo"> <img src="../img/escudos/Equipo4-gris.png">Equipo4-gris.png</div>
    </div>

    <form id="formulario" method="post">
        <div id="input_form">
            <label for="input_nombre_equipo">Nombre Equipo:</label>
            <input type="text" name="nombre_equipo" id="nombre_equipo" placeholder="Nombre">

            <label for="input_escudo">Nombre de la Liga:</label>
            <!-- Añadido--><input type="text" name="nombre_liga" id="nombre_liga" placeholder="Nombre de la Liga">

            <input type="button" name="envio_registro" id="button_registro" value="Crear">
        </div>
    </form>
        <div id='registro_equipo'>Equipo creado Correctamente</div>
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