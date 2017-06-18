<?php


require_once("RegistroController.php");

$controladorUsuario = new CRestRegistro();

if(isset($_POST['ejecuta'])) {

    if ($_POST['ejecuta'] == "activaUser") {
        if ($controladorUsuario->activaUser()) {
            $respuesta = array ('estado' => 'correcto');
            echo json_encode($respuesta);
            return true;
        } else {
            $respuesta = array ('estado' => 'incorrecto');
            echo json_encode($respuesta);
            return false;
        }
    }

    if ($_POST['ejecuta'] == "olvidoPassword") {
        if ($controladorUsuario->olvidoPassword($_POST['correo'])) {
            $respuesta = array ('estado' => 'correcto');
            echo json_encode($respuesta);
            return true;
        } else {
            $respuesta = array ('estado' => 'incorrecto');
            echo json_encode($respuesta);
            return false;
        }
    }

    if ($_POST['ejecuta'] == "nuevaPassword") {
        if ($controladorUsuario->nuevaPassword( $_POST['codigoUrl'], $_POST['password'])) {
            $respuesta = array ('estado' => 'correcto');
            echo json_encode($respuesta);
            return true;
        } else {
            $respuesta = array ('estado' => 'incorrecto');
            echo json_encode($respuesta);
            return false;
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




