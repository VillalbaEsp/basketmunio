<?php


require_once("RegistroController.php");

$controladorUsuario = new CRestRegistro();
die("SUUUU1");
if(isset($_POST['ejecuta'])) {
    die("SUUUU2");
    if ($_POST['ejecuta'] == "activaUser") {
        die("SUUUU3");
        if ($controladorUsuario->activaUser()) {
            die("correcto");//echo 1;
            echo 1;
        } else {
            die("incorrecto");
            echo 0;
        }
    }
}

if(!$controladorUsuario->compruebaUsuario() == true) {
    header("Location: /basketmunio/view/html/registro.php?error");
}else {
    if($controladorUsuario->registrarUsuario())
        header("Location: /basketmunio/view/html/registro-correcto.php");
    else
        header("Location: /basketmunio/view/html/registro.php?error");
}




