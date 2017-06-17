<?php
$myBBDD = mysqli_connect("127.0.0.1" ,"root", "", "basketmunio");

$resultado="";


if ($myBBDD) {

    echo "<h2>Te has conectado a la Base de Datos</h2> <br>";

    $res = $myBBDD->query("SELECT id_equipo FROM equipos");
    $equipos =array();
    $jugadores =array();
    while ($row=$res->fetch_assoc()){
        array_push($equipos,$row);
    }

    foreach ($equipos as $key ){
        foreach ($key as $key2 => $value){
            $res1 = $myBBDD->query("SELECT id_jugador FROM jugadores_equipos je, equipos e WHERE e.id_equipo=".$value."AND e.id_equipo=je.id_equipo");

               $row=$res->fetch_assoc();
            var_dump($row);
            die();
                array_push($jugadores,$row);
            }

        }
    }



   /* foreach ($equipos as $equipo){
        
    }*/



else{
    echo "No se ha podido conectar a la Base de Datos <br>";
}