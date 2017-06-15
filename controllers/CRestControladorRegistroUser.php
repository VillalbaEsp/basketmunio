<?php


require_once("RegistroController.php");

$controladorUsuario = new CRestRegistro();

if(!$controladorUsuario->compruebaUsuario() == true) {
    header("Location: /basketmunio/view/html/registro.php?error");
}else {
    $controladorUsuario->registarUsuario();
    header("Location: /basketmunio/view/html/registro-correcto.php");
}




