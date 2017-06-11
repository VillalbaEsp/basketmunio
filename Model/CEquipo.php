<?php
require_once ("CUser.php");

class CEquipo {

    private $mysqli;

    private $array_fields;


    public function __construct()
    {

        require_once("Conexion.php");

        $this->mysqli=Conexion::conexionMysqli();

        $this->array_fields= array(
            'id_usuario'        => '',
            'nombre_equipo'     => '',
            'escudo'            => '',
            'presupuesto'       => '',
            'pts_equipo'        => '',
            'jugadores_equipos' => array()


        );
    }


    public function setEquipo($array_infos){

/*
        $usuario = new CUser();

        $this->array_fields['id_usuario'] = $usuario->get_id();

*/
        foreach ($array_infos as $key => $value){

            switch ($key){

                case 'id_usuario':

                    $this->array_fields['id_usuario'] = $value;

                    break;
                case 'nombre_equipo':

                    $this->array_fields['nombre_equipo'] = $value;

                    break;
                case 'escudo':

                    $this->array_fields['escudo'] = $value;

                    break;
                case 'pts_equipo':

                    $this->array_fields['pts_equipo'] = $value;

                    break;

            }


        }

        /*var_dump($this->array_fields);
        die();*/

        $this->addEquipo($this->array_fields);

    }


    private function addEquipo($array_fields){
        $idliga = 1;
        $stmt = $this->mysqli->prepare("INSERT INTO equipos (id_usuario,id_liga, nombre_equipo, escudo_equipo, pts_equipo) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iissi", $this->array_fields['id_usuario'], $idliga, $this->array_fields['nombre_equipo'], $this->array_fields['escudo'], $this->array_fields['pts_equipo']);

        $stmt->execute();

        //$prueba = $this->mysqli;

       /* var_dump($prueba);
        die();*/
    }









}