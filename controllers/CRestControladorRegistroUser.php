<?php


require_once("RegistroController.php");

$controladorUsuario = new CRestRegistro();

if($_POST['ejecuta'] == "activaUser"){
    if($controladorUsuario->activaUser()) {
        //echo 1;
        echo json_encode(array('success'=>'true'));
    }else {
        echo 0;
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




