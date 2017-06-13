<?php

require_once("CEquipo.php");

//CONTROLADOR
$nombre_equipo = $_POST['nombre_equipo'];
$escudo = $_POST['escudo'];

$datos = array(

    'id_usuario'        => 1,
    'nombre_equipo'     => $nombre_equipo,
    'escudo'            => $escudo,
    'pts_equipo'        => 98,

);


$equipo = new CEquipo();


$equipo->setEquipo($datos);