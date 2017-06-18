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

    if ($_POST['ejecutar'] == "equipoliga") {
        session_start();
        if($equipoliga = $controladorLiga->muestraEquipoLiga($_SESSION['id_usuario'])) {
            echo json_encode($equipoliga);
            return true;
        }else {
            return false;
        }

    }

    if ($_POST['ejecutar'] == "clasificacion") {
        if($clasificacion = $controladorLiga->muestraClasificacion($_SESSION['id_liga'])) {
            echo json_encode($clasificacion);
            return true;
        }else {
            return false;
        }

    }
}

