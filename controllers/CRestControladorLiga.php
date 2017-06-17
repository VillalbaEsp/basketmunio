<?php

require_once ("RegistroLiga.php");

$controladorLiga = new CRestLiga();

if(isset($_POST['ejecutar'])) {
    if ($_POST['ejecutar'] == "creaLiga") {
        $controladorLiga->addLiga();

    }

    $prueba = array("hola", "adios");


    if ($_POST['ejecutar'] == "muestraLiga") {

        $tablaLiga = $controladorLiga->muestraLigas();
        echo json_encode($tablaLiga);

    }
}

