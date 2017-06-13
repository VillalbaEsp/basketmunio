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

                    //utilizar el getId

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


    //ESTA FUNCION ES PRIVADA Y VA DENTRO DE SET EQUIPO
    public function  creaPlantilla(){

        /*$liga = new CLiga;

        $idLiga= $liga->getId();*/

        $idLiga = 1;

        for($i=0; $i<11; $i++){

            $numero = rand(1, 453);

            //HAY QUE PASARLE EL ID LIGA

            $consulta= $this->mysqli->query("SELECT * FROM jugador_libre WHERE id_liga=".$idLiga."&& id_jugador=".$numero."");


            $jugador = $consulta->fetch_assoc();

            $this->array_fields['jugadores_equipo'][$i]=$jugador;


        }


        $consulta= $this->mysqli->query("SELECT * FROM equipos WHERE id_liga=".$idLiga."&& nombre_equipo='".$this->array_fields['nombre_equipo']."'");

        $equipo = $consulta->fetch_assoc();
        //var_dump($equipo);


        foreach ($this->array_fields['jugadores_equipo'] as $key){

            foreach ($key as $key2 => $value){

                if($key2 == "id_jugador"){
                    //var_dump($value);
                    $consulta1 = $this->mysqli->query("INSERT INTO jugadores_equipos (id_equipo, id_usuario, id_jugador) VALUES (".$equipo['id_equipo'].",".$equipo['id_usuario'].",".$value.")");

                }


            }


        }

    }





}