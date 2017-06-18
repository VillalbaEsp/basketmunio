<?php
$myBBDD = mysqli_connect("127.0.0.1" ,"root", "", "basketmunio");

$resultado="";


if ($myBBDD) {

    echo "<h2>Te has conectado a la Base de Datos</h2> <br>";

    $res = $myBBDD->query("SELECT id_equipo FROM equipos");
    $equipos =array();

    while ($row=$res->fetch_assoc()){
        array_push($equipos,$row);
    }

    foreach ($equipos as $key ){
        $jugadores =array();
        $ptosJugadores = array();
        $ptosTotales = 0;
        foreach ($key as $key2 => $value){
            $res = $myBBDD->query("SELECT je.id_jugador FROM jugadores_equipos je, equipos e WHERE e.id_equipo=".$value." AND e.id_equipo=je.id_equipo");

            while ($row=$res->fetch_assoc()){
                array_push($jugadores,$row);
            }

                foreach ($jugadores as $key3){
                    foreach ($key3 as $key4 => $idJugador) {
                        $res = $myBBDD->query("SELECT round(((gp_estadistica_total+min_estadistica_total+pts_estadistica_total+ast_estadistica_total+blk_estadistica_total+reb_estadistica_total+dreb_estadistica_total+oreb_estadistica_total+stl_estadistica_total)/9), 0) media_total_jugador FROM estadisticas_totales WHERE id_jugador=" . $idJugador . "");

                        array_push($ptosJugadores, $res->fetch_assoc());
                    }
                }

            foreach ($ptosJugadores as $key5){
                foreach ($key5 as $key6 => $ptos) {
                    $ptosTotales += $ptos;
                }
            }
            if($myBBDD->query("UPDATE equipos SET pts_equipo=".$ptosTotales." WHERE id_equipo=".$value.""))
                echo "Los puntos que corresponden al equipo con id ".$value." son: ".$ptosTotales."<br>";
            else
                echo "No se han asignado puntos al equipo con id ".$value."<br>";
        }


        }

    }

else{
    echo "No se ha podido conectar a la Base de Datos <br>";
}