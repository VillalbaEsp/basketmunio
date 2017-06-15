<!DOCTYPE html>
	
	<html>
		
        <head>
            
            <meta charset="utf-8">
            <title>Basketmunio_registro</title>
            <link rel="stylesheet" href="../css/estilos_registro.css">
            <link rel="stylesheet" href="../css/fontello.css">
            <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
            <script src="../js/jquery-3.1.1.min.js"></script>
            <script src="../js/validaFormRegistro.js"></script>
        <?php

        if(!isset($_GET["error"])) {
            $display = "display: none;";
        }else {
            $display = "display: block;";
            $msg = "error";
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

                    <div id="msg_error" style="<?php echo $display ?>;">Apodo o correo electrónico ya registrado.</div>
                
                <div id="form_registro">
                
                   <form id="formulario" method="post" action="../../controllers/CRestControladorRegistroUser.php" >

                       <label for="input_registrado" id="label_registrado">Se ha registrado correctamente, en unos momentos le llegara un email de confirmación, por favor intoduce el código de activación para activar la cuenta: </label>
                       <input type="text" name="cactivacion" id="input_registrado" required >
                    
                       <input type="submit" name="envio_registro" id="button_registro" value="Enviar">

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