<!DOCTYPE html>
	
	<html>
		
        <head>
            
            <meta charset="utf-8">
            <title>Basketmunio</title>
            <link rel="stylesheet" href="../css/estilos_registro.css">
            <link rel="stylesheet" href="../css/fontello.css">
            <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
            <script src="../js/jquery-3.1.1.min.js"></script>
            <script src="../js/registro/olvidoPassword.js"></script>
        <?php

        if(isset($_GET["error"])) {
            $displayError = "display: block;";
            $form = "display:block";
        }else {
            $displayError = "display: none;";
        }

        if(isset($_GET["success"])) {
            $displaySucces = "display: block;";
            $form = "display:none";
        }else {
            $displaySucces = "display: none;";
            $form = "display:block";
        }

        ?>

        </head>

        <body>
            
            
            <section id="contenedor_registro">
            
                <nav id="menu_cabecera">
                
                <div id="menu_contenedor_img">

                    <img src="../img/logo.png" >
                    
                </div>

            </nav>
                
                <div id="contenedor_form_registro">

                    <div id="msg_error" style="<?php echo $displayError ?>;">Email incorrecto.</div>
                    <div id="msg_success" style="<?php echo $displaySucces ?>;">Email enviado.</div>

                <div id="form_registro" style="<?php echo $form?>">
                
                   <form id="formulario">

                       <label for="input_registrado" id="label_registrado">Introduzca su email, en unos minutos le enviaremos un enlace al mismo para restablecerla:</label>
                       <input type="text" name="codigo" id="input_codigo" placeholder="Email" required >
                    
                       <input type="button" name="envio_codigo" id="button_registro" value="Enviar">

                   </form>
                
                    
                </div>
            </div>
            </section>
            
            <footer>
                <div id="contenedor_info">
                
                    <div id="info">
                        <h4>Puedes seguirnos</h4>
                        <a href="https://es-es.facebook.com/" class="icon-facebook-squared"></a> | 
                        <a href="https://twitter.com/?lang=es" class="icon-twitter"></a>  
                        <p>Basketmunio creado y diseñado para fines no lucrativos | <span class="icon-copyright"></span> BASKETMUNIO</p>

                    </div>
                
                </div>
            </footer>

        </body>

    </html>