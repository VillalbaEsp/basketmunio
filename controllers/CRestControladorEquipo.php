<?php


require_once("EquipoController.php");

$equipo = new CRestEquipo();


















if(isset($_POST['metodo'])) {
    if ($_POST['metodo'] == "misEquipos") {
        if($info = $equipo->mostrarEquipoUsuario()){
            echo json_encode($info);
            return true;
        }
    }

    if ($_POST['metodo'] == "muestraInfo" && isset($_POST['idEquipo'])) {
        if($info = $equipo->infoMiEquipo($_POST['idEquipo'])){
            echo json_encode($info);
            return true;
        }
    }
}










$equipo->addEquipo();