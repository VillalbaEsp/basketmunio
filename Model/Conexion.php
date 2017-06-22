<?php

class Conexion{


    public static function conexionMysqli(){

        
        $mysqli = new mysqli("127.0.0.1","root","","basketmunio");

        if($mysqli->connect_errno){//Si se cumple esta condición no se ha podido conectar a la BBDD entonces le decimos que nos diga que error

            echo "Error al conectarse a la BBDD" . $mysqli->connect_errno;
        }
        else{
            $mysqli->set_charset("utf8");//le decimos que utilice utf8
        }

        return $mysqli;

    }









}
