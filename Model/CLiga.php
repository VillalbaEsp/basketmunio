<?php


class CLiga{

    private $mysqli;

    private $array_fields;

    public function __construct()
    {

        require_once("Conexion.php");

        $this->mysqli=Conexion::conexionMysqli();

        $this->array_fields= array(
            'id_liga'           => '',
            'nombre_liga'       => '',
            'tipo_liga'         => '',
            'password'          => ''
        );
    }


    public function setDatosLiga($array_infos){


        foreach ($array_infos as $key => $value){

            switch ($key){

                case 'nombre_liga':

                    $this->array_fields['nombre_liga'] = $value;

                    break;
                case 'tipo_liga':

                    $this->array_fields['tipo_liga'] = $value;

                    break;
                case 'password':

                    $this->array_fields['password'] = $value;

                    break;

            }


        }


        $this->addLiga();


    }



    private function addLiga(){


        $stmt = $this->mysqli->prepare("INSERT INTO ligas (nombre_liga,tipo_liga, contraseña_liga) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $this->array_fields['nombre_liga'], $this->array_fields['tipo_liga'], $this->array_fields['password']);

        $stmt->execute();

    }


    public function equiposLiga($nombreliga){

        $consulta= $this->mysqli->query("SELECT id_liga FROM ligas WHERE nombre_liga='".$nombreliga."'");

        $idLiga = $consulta->fetch_assoc();

        $consulta1 = $this->mysqli->query("SELECT COUNT(*) FROM equipos WHERE id_liga =".$idLiga['id_liga']);

        $resultado = $consulta1->fetch_assoc();

        /*var_dump($resultado['COUNT(*)']);
        die();*/

        return $resultado['COUNT(*)'];

    }

    public function getIdNombre($nombreLiga){

        $resultado = $this->idParaEquipo($nombreLiga);

        return $resultado;


    }

    private function idParaEquipo($nombreLiga){

        $consulta= $this->mysqli->query("SELECT id_liga FROM ligas WHERE nombre_liga='".$nombreLiga."'");

        $idLiga = $consulta->fetch_assoc();

        return $idLiga['id_liga'];


    }


    public function mostrarLigas($search = null){

        $resultado = $this->selectLigas($search);
        /*var_dump($resultado);
                die();*/

        return $resultado;


    }

    private function selectLigas($search){
        $resultado = array();

        $consulta1= $this->mysqli->query("SELECT COUNT(*) FROM ligas");

        if($search != null) {

            $consulta = $this->mysqli->query("SELECT * FROM ligas WHERE nombre_liga = '" . $search . "'");
            $entrada = $consulta->fetch_assoc();
            $fila = $entrada['nombre_liga'];
            $equipos = $this->equiposLiga($fila);
            array_push($resultado,$fila);
            array_push($resultado,$equipos);
            $resultado['count'] = 1;

        }
        else{
            $consulta = $this->mysqli->query("SELECT * FROM ligas");
            $count = $consulta1->fetch_assoc();
            $resultado['count'] = $count['COUNT(*)'];

            while($entrada = $consulta->fetch_assoc()){
                $fila = $entrada['nombre_liga'];
                $equipos = $this->equiposLiga($fila);
                array_push($resultado,$fila);
                array_push($resultado,$equipos);
                //array_push(

            }
        }




        /*$aux=0;
        foreach ($resultado as $key) {
            foreach ($key as $key2 => $value2){
                if($key2 == 'nombre_liga') {
                    $equipos = $this->equiposLiga($value2);
                    $resultado[$aux]['equipos'] = $equipos;
                }

        }
            $aux++;
        }*/



       //$resultado = $consulta->fetch_assoc();





        return $resultado;


    }



}