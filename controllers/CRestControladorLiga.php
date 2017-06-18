<?php

require_once("LigaController.php");

$controladorLiga = new CRestLiga();

if(isset($_POST['ejecutar'])){
    if($_POST['ejecutar'] == "creaLiga"){
        $controladorLiga->addLiga();

    }

    if($_POST['ejecutar'] == "muestraLiga"){

        $tablaLiga=$controladorLiga->muestraLigas();
            echo json_encode($tablaLiga);
    }

    if($_POST['ejecutar'] == "mercado"){
        $equipo->mercado();
        return true;
    }

}
