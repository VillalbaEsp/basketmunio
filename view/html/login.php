<!DOCTYPE html>
	
	<html>
		
    <head>
        <meta charset="utf-8">
        <title>Basketmunio</title>
        <link rel="stylesheet" href="../css/estilo.css">
        <link rel="stylesheet" href="../css/fontello.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <script src="../js/jquery-3.1.1.min.js"></script>

        <?php
            session_start();
            if(isset($_SESSION['id_usuario']))
                header("Location: /basketmunio/view/html/pagina_principal.php");

            if(!isset($_GET["error"])) 
                $display = "display: none;";
            else 
                $display = "display: block;";
        ?>

    </head>
        
    <body> 
        
        <section id="contenedor_loguin">
        
            <!--formulario del logueo con una imagen de fondo varios enlaces y demás cosas-->
            
            <nav id="menu_cabecera">
                
                <div id="menu_contenedor_img">
                    
                    <img src="../img/logo.png">
                    
                </div>



            </nav>
            
            
            <div id="form_loguin">
                
                <div id="contenido_form">
                    
                    <hgroup>
                        
                        <h1>Es el Momento</h1>

                        <h4>Comienza El Juego</h4>
                        
                        <p>¿Eres nuevo? | <span id="enlace_registro"><a href="registro.php">Registrate</a></span></p>
                        
                    </hgroup>

                    <form id="formulario" method="post" action="../../controllers/CRestControladorLoginUser.php"/>

                        <input type="email" name="email" id="email" id="input_email" placeholder="Correo electronico"><br>

                        <input type="password" name="password" id="input_password" placeholder="Contraseña" ><br>
                        
                        <div id="enlace_contraseña_olvidada"><a href="contrase%C3%B1a_olvidada.html">¿Has olvidado la contraseña?</a></div>
                        
                        <input type="submit" name="envio_loguin" id="button_loguin" value="JUGAR">

                    </form>

                    <div id="msg_error" style="<?php echo $display ?>;">Credencidales incorrectas o cuenta no activada.</div>
                    
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