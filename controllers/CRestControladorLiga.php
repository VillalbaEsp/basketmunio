<?php

require_once("LigaController.php");

$controladorLiga = new CRestLiga();

if(isset($_POST['ejecutar'])) {
    if ($_POST['ejecutar'] == "creaLiga") {
        $controladorLiga->addLiga();

    }

    if ($_POST['ejecutar'] == "muestraLiga") {

        $tablaLiga = $controladorLiga->muestraLigas();
        echo json_encode($tablaLiga);

    }

    if ($_POST['ejecutar'] == "calendario") {
        if($calendario = $controladorLiga->muestraCalenario($_POST['mes'])) {
            echo json_encode($calendario);
            return true;
        }else {
            return false;
        }

    }

    if ($_POST['ejecutar'] == "mercado") {
        if($mercado = $controladorLiga->muestraMercado($_POST['idEquipo'])) {
            echo json_encode($mercado);
            return true;
        }else {
            return false;
        }

    }
}

