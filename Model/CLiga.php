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
        $this->jugadoresLiga();


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


    private function jugadoresLiga(){
        $idLiga=$this->idParaEquipo($this->array_fields['nombre_liga']);

        $resultado= array();

        $consulta=$this->mysqli->query("SELECT id_jugador FROM jugadores");

        while ($row = $consulta->fetch_assoc()) {
            array_push($resultado,$row);
        }

        foreach($resultado as $key){
            foreach ($key as $key2 => $value){

                $consulta=$this->mysqli->query("INSERT INTO jugador_libre (id_jugador,id_liga) VALUES (".$value.",".$idLiga.")");
            }
        }





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

    public  function obtenCalendario($mes){
        $calendario = $this->extraeCalendario($mes);
        return $calendario;
    }

    private function extraeCalendario($mes){

        $res = $this->mysqli->query("SELECT * FROM partidos_reales WHERE MONTH(fecha_hora_partido) =".$mes."");

        $calendario = array();

        while($row = $res->fetch_assoc()){
            array_push($calendario, $row);
        }

        return $calendario;
    }

    public function obtenMercado($idEquipo){
        $mercado = $this->extraeMercado($idEquipo);
        return $mercado;
    }

    private function extraeMercado($idEquipo){

        $res = $this->mysqli->query("SELECT id_liga FROM equipos WHERE id_equipo=".$idEquipo."");
        $res = $res->fetch_assoc();

        $idLiga = $res['id_liga'];

        $res = $this->mysqli->query("SELECT j.* FROM jugador_libre jl, jugadores j WHERE jl.id_liga=".$idLiga." AND jl.id_jugador=j.id_jugador");

        $calendario = $res->fetch_all();

        return $calendario;
    }

    public function obtenClasificacion($idLiga){
        $clasificacion = $this->extraeClasificacion($idLiga);
        return $clasificacion;
    }

    private function extraeClasificacion($idLiga){

        $res = $this->mysqli->query("SELECT id_liga FROM equipos WHERE id_equipo=".$idEquipo."");
        $res = $res->fetch_assoc();

        $idLiga = $res['id_liga'];

        $res = $this->mysqli->query("SELECT j.* FROM jugador_libre jl, jugadores j WHERE jl.id_liga=".$idLiga." AND jl.id_jugador=j.id_jugador");

        $calendario = $res->fetch_all();

        return $calendario;
    }

    public function obtenEquipoLiga($idUsuario){
        $equipoliga = $this->extraeEquipoLiga($idUsuario);
        return $equipoliga;
    }

    private function extraeEquipoLiga($idUsuario){

        $res = $this->mysqli->query("SELECT e.id_equipo, e.nombre_equipo , l.id_liga, l.nombre_liga FROM equipos e, ligas l WHERE e.id_usuario=".$idUsuario." AND e.id_liga=l.id_liga");

        $equipoliga = $res->fetch_all();

        return $equipoliga;
    }

}