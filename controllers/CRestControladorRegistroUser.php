<?php


require_once("RegistroController.php");

$controladorUsuario = new CRestRegistro();

if($_POST['ejecuta'] == "activaUser"){
    if($controladorUsuario->activaUser()) {
        $info = array(
            'validar'=>"true",
        );
        echo json_encode($info);
    }else {
        $info = array(
            'validar'=>"false",
        );
        echo json_encode($info);
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




