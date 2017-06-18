<?php


require_once("EquipoController.php");

$equipo = new CRestEquipo();

if(isset($_POST['ejecutar'])){

    if($_POST['ejecutar'] == "equipoDestacado"){
        $destacados = $equipo->equiposDestacados();

        echo json_encode($destacados);
        return true;

    }


    if($_POST['ejecutar'] == "escudoDestacado"){
        $destacados = $equipo->escudosDestacados();

        echo json_encode($destacados);
        return true;

    }

    if($_POST['ejecutar'] == "jugadorDestacado"){
        $destacados = $equipo->jugadoresDestacados();
        echo json_encode($destacados);
        return true;

    }

    if($_POST['ejecutar'] == "creaEquipo"){
        $equipo->addEquipo();
        return true;
    }



}


























