<?php
$myBBDD = mysqli_connect("127.0.0.1" ,"root", "", "basketmunio");

$resultado= array();

$liga=1;

if ($myBBDD) {

    echo "<h2>Te has conectado a la Base de Datos</h2> <br>";

        $consulta=mysqli_query($myBBDD, "SELECT id_jugador FROM jugadores");

    while ($row = mysqli_fetch_assoc($consulta)) {
        array_push($resultado,$row);
    }

    foreach($resultado as $key){
        foreach ($key as $key2 => $value){

            $consulta=mysqli_query($myBBDD, "INSERT INTO jugador_libre (id_jugador,id_liga) VALUES (".$value.",".$liga.")");
        }
    }




}else{
    echo "No se ha podido conectar a la Base de Datos <br>";
}