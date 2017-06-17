<?php
require_once ("CUser.php");

class CEquipo {

    private $mysqli;

    private $array_fields;

    private $listaBorrados;


    public function __construct()
    {

        require_once("Conexion.php");

        $this->mysqli=Conexion::conexionMysqli();

        $this->array_fields= array(
            'id_usuario'        => '',
            'id_liga'           => '',
            'nombre_equipo'     => '',
            'escudo'            => '',
            'presupuesto'       => '',
            'pts_equipo'        => '',
            'jugadores_equipos' => array(),


        );

        $this-> listaBorrados = array();
    }


    public function setEquipo($array_infos){

        foreach ($array_infos as $key => $value){

            switch ($key){

                case 'id_usuario':

                    //utilizar el getId

                    $this->array_fields['id_usuario'] = $value;

                    break;
            /*Añadido */case 'id_liga':

                    $this->array_fields['id_liga'] = $value;

                    break;
                case 'nombre_equipo':

                    $this->array_fields['nombre_equipo'] = $value;

                    break;
                case 'escudo_equipo':

                    $this->array_fields['escudo'] = $value;

                    break;
                case 'puntos_equipo':

                    $this->array_fields['pts_equipo'] = $value;

                    break;

            }




        }

        /*var_dump($this->array_fields);
        die();*/

        $this->addEquipo($this->array_fields);
        $this->creaPlantilla();
        $this->borraJugadorsLibre();

    }


    private function addEquipo($array_fields){
        $idliga = 1;
        $stmt = $this->mysqli->prepare("INSERT INTO equipos (id_usuario,id_liga, nombre_equipo, escudo_equipo, pts_equipo) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iissi", $this->array_fields['id_usuario'], $this->array_fields['id_liga'], $this->array_fields['nombre_equipo'], $this->array_fields['escudo'], $this->array_fields['pts_equipo']);
                                                                       /*AÑADIDO*/
        $stmt->execute();

        //$prueba = $this->mysqli;

       /* var_dump($prueba);
        die();*/
    }


    private function ListaBorrados(){

        //$idLiga = 1;

        $consulta= $this->mysqli->query("SELECT je.id_jugador FROM jugadores_equipos je, equipos e WHERE je.id_equipo=e.id_equipo AND e.id_liga =".$this->array_fields['id_liga']);
                                                                                                                                                            /*AÑADIDO*/

        //$arrayres=array();


        /*var_dump($arrayres);
        die();*/

        while($resultado = $consulta->fetch_assoc()){
            $fila = $resultado['id_jugador'];

            array_push($this->listaBorrados,$fila);


        }

        var_dump($this->listaBorrados);


    }




    //ESTA FUNCION ES PRIVADA Y VA DENTRO DE SET EQUIPO
    private function  creaPlantilla(){

        /*$liga = new CLiga;

        $idLiga= $liga->getId();*/
        $this->ListaBorrados();
        $idLiga = 1;
        $i = 0;

        while($i<11) {

            $numero = mt_rand(1, 453);
            //HAY QUE PASARLE EL ID LIGA
            //$numero = 5;
            if(!in_array($numero , $this->listaBorrados)){


                $consulta= $this->mysqli->query("SELECT * FROM jugador_libre WHERE id_liga=".$idLiga."&& id_jugador=".$numero."");


                $jugador = $consulta->fetch_assoc();

                $this->array_fields['jugadores_equipo'][$i]=$jugador;

                $i++;

            }


        }


        $consulta= $this->mysqli->query("SELECT * FROM equipos WHERE id_liga=".$this->array_fields['id_liga']."&& nombre_equipo='".$this->array_fields['nombre_equipo']."'");
                                                                                /*AÑADIDO*/
        $equipo = $consulta->fetch_assoc();
        //var_dump($equipo);


/*var_dump($this->array_fields['jugadores_equipo'][0]['id_jugador']);
        die();*/



        foreach ($this->array_fields['jugadores_equipo'] as $key){

            foreach ($key as $key2 => $value){

                if($key2 == "id_jugador"){


                    //var_dump($value);
                    $consulta1 = $this->mysqli->query("INSERT INTO jugadores_equipos (id_equipo, id_usuario, id_jugador) VALUES (".$equipo['id_equipo'].",".$equipo['id_usuario'].",".$value.")");

                }


            }

        }

    }


    /**
     * @return array
     */
    private function borraJugadorsLibre()
    {

    //$liga = 1;
        foreach ($this->array_fields['jugadores_equipo'] as $key ){


            foreach ($key as $key2 => $value){


                $consulta = $this->mysqli->query("DELETE FROM `jugador_libre` WHERE id_jugador=".$value."&& id_liga=".$this->array_fields['id_liga']);
                                                                                                                            /*Añadido*/

            }



        }


    }

    public function muestraExtraccionEquiposUsuario($idUsuario){
        $res = $this->extraeEquiposUsuario($idUsuario);
        return $res;
    }

    private function extraeEquiposUsuario($idUsuario){

        $res = $this->mysqli->query("SELECT id_equipo, nombre_equipo FROM equipos WHERE id_usuario=".$idUsuario."");

        $info = array ();

        while($row = $res->fetch_assoc()){
            array_push($info, $row);
        }

        return ($info);

    }

    public function obtenInfoMiEquipo($idUsuario, $idEquipo){

        $res = $this->extraeInfoMiEquipo($idUsuario, $idEquipo);

        return $res;

    }

    private function extraeInfoMiEquipo($idUsuario, $idEquipo){

        $res = $this->mysqli->query("SELECT j.nombre_jugador, j.posicion_jugador FROM jugadores_equipos je, jugadores j WHERE je.id_usuario=".$idUsuario." AND je.id_equipo=".$idEquipo." AND j.id_jugador=je.id_jugador");

        $info = array ();

        while($row = $res->fetch_assoc()){
            array_push($info, $row);
        }

        return ($info);
    }
}