<?php


require_once("RegistroController.php");

$controladorUsuario = new CRestRegistro();

if(isset($_POST['ejecuta'])) {
    if ($_POST['ejecuta'] == "activaUser") {
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




