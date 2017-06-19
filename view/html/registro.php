<!DOCTYPE html>
	
	<html>
		
        <head>
            
            <meta charset="utf-8">
            <title>Basketmunio</title>
            <link rel="stylesheet" href="../css/estilos_registro.css">
            <link rel="stylesheet" href="../css/fontello.css">
            <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
            <script src="../js/jquery-3.1.1.min.js"></script>
            <script src="../js/registro/validaFormRegistro.js"></script>
        <?php

        if(!isset($_GET["error"])) {
            $display = "display: none;";
            $msg="";
        }else{
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
                
                <div id="menu_contenedor_ul">
                    
                </div>
                
            </nav>
                
                <div id="contenedor_form_registro">

                    <div id="msg_error" style="<?php echo $display ?>;">Apodo o correo electrónico ya registrado.</div>
                    <div id="msg_valida" style="display: none;">Algunos de los datos del registro son incorrectos</div>
                
                <div id="form_registro">
                
                   <form id="formulario" method="post"> <!-- Action en el jQuery-->

                       <label for="input_apodo"> Apodo:</label>
                       <input type="text" name="apodo" class="<?php echo $msg ?>" id="input_apodo" placeholder="Apodo" required >
                       
                       <label for="input_nombre">Nombre:</label>
                       <input type="text" name="nombre" id="input_nombre" placeholder="Nombre" required>

                       <label for="input_apellidos">Apellidos:</label>
                       <input type="text" name="apellidos" id="input_apellidos" placeholder="Apellidos" required>
                       
                       <label for="input_correo">Correo Electrónico:</label>
                       <input type="email" name="correo" id="input_correo" class="<?php echo $msg ?>" placeholder="Correo electrónico" required>
                       
                       <label for="input_f_nacimiento">Fecha Nacimiento:</label>
                       <input type="date" name="f_nacimiento" id="input_f_nacimiento" step="1" min="1950-01-01" max="<?php echo date('Y-m-d');?>" value="<?php echo date('Y-m-d');?>" required><!--No funciona en firefox averiguar por que -->
                       
                       <label for="input_password">Contraseña:</label>
                       <input type="password" name="password" id="input_password" placeholder="Contraseña" required>
                       
                       <label for="input_conf_password">Confirmar Contraseña:</label>
                       <input type="password" name="conf_password" id="input_conf_password" placeholder="Confirmar Contraseña" required>
                    
                       <input type="submit" name="envio_registro" id="button_registro" value="Enviar">

                    </form>
                
                    
                </div>
            </div>
            </section>
            
            <footer>
                <div id="contenedor_info">
                
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