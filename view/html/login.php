<!DOCTYPE html>
	
	<html>
		
    <head>
        <meta charset="utf-8">
        <title>Basketmunio_login</title>
        <link rel="stylesheet" href="../css/estilo.css">
        <link rel="stylesheet" href="../css/fontello.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <script src="../js/jquery-3.1.1.min.js"></script>

        <?php
            session_start();
            if(isset($_SESSION['id_usuario']))
                header("Location: /basketmunio/view/html/pagina_principal.php");
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

                
                <div id="menu_contenedor_ul">
                    
                    <ul>
                        
                        <li><a href="#">¿Quienes Somos?</a>
                            <ul class="secundario">
                                <li ><a href="#">¿Quienes Somos?</a></li>
                                <li><a href="#">Conoce al equipo</a></li>
                            </ul>

                        </li>
                        
                        <li><a href="#">Noticias</a>
                            <ul class="secundario">
                                <li><a href="#">Últimas Noticias</a></li>
                                <li><a href="#">Reviews</a></li>
                            </ul>
                        </li>
                        
                        <li><a href="#">Más</a>
                            <ul class="secundario">
                                <li><a href="#">Revista</a></li>
                                <li><a href="#">Foros</a></li>
                            </ul>
                        </li>
                        
                    </ul>
                    
                </div>
                
            </nav>
            
            
            <div id="form_loguin">
                
                <div id="contenido_form">
                    
                    <hgroup>
                        
                        <h1>Es el Momento</h1>

                        <h4>Comienza El Juego</h4>
                        
                        <p>¿Eres nuevo? | <span id="enlace_registro"><a href="registro.html">Registrate</a></span></p>
                        
                    </hgroup>

                    <form id="formulario">

                        <input type="email" name="email" id="email" id="email" placeholder="Correo electronico"><br>

                        <input type="password" name="password" id="password" placeholder="Contraseña" ><br>
                        
                        <div id="enlace_contraseña_olvidada"><a href="contrase%C3%B1a_olvidada.html">¿Has olvidado la contraseña?</a></div>
                        
                        <input type="button" name="envio_loguin" id="button_loguin" value="JUGAR">

                    </form>
                    
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

        <script>
            $("#button_loguin").click(function (e) {

                var email =$("#email").val();

                var password = $("#password").val();
                console.log(email +"-----"+ password);
                $.post("../../controllers/CRestControladorLoginUser.php/compruebaPass", {email: email, password: password}, function($res) {
                alert($res)});
                /*$.ajax({
                    url: '../../controllers/CRestControladorLoginUser.php/compruebaPass',
                    type: 'POST',
                    data: {email: email, password: password},
                    contentType: "application/json; charset=utf-8",
                    success: function () {
                        alert("CONTRASEÑA CORRECTA");
                    },
                    error: function () {
                        alert("CONTRASEÑA INCORRECTA");
                    }
                });*/
            });
        </script>

	</html>