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

    if($_POST['ejecutar'] == "estadisticas"){
        $estadisticas = $equipo->mostrarEstadisticas($_POST['equipo']);
        echo json_encode($estadisticas);
        return true;
    }
}



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






















