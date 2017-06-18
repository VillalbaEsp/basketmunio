<?php


require_once ("../Model/CLiga.php");


class CRestLiga{


    private $nombre;

    private $tipo;

    private $password;

    private $search;


    public function __construct()
    {
        if(isset($_POST['nombre_liga']))
            $this->nombre= $_POST['nombre_liga'];

        if(isset($_POST['tipo_liga']))
            $this->tipo= $_POST['tipo_liga'];

        if(isset($_POST['password']))
            $this->password = $_POST['password'];

        if(isset($_POST['search']))
            $this->search = $_POST['search'];

        $this->datos = array(

            'nombre_liga'   => $this->nombre,
            'tipo_liga'   => $this->tipo,
            'password'   => $this->password

        );

    }


    public function addLiga(){
        //session_start();

        $liga = new Cliga;

        $liga->setDatosLiga($this->datos);

    }

    public function contieneEquiposLiga(){
        $liga = new Cliga;

        $count=$liga->equiposLiga($this->datos['nombre_liga']);

        return $count;

    }

    public function muestraLigas(){

        $liga= new CLiga();
        $ligas=$liga->mostrarLigas($this->search);

        return $ligas;

    }

    public function muestraCalenario($mes){
        $liga= new CLiga();

        $calendario = $liga->obtenCalendario($mes);

        return $calendario;
    }

    public function muestraMercado($idEquipo){
        $liga= new CLiga();

        $mercado = $liga->obtenMercado($idEquipo);

        return $mercado;
    }

    public function muestraClasificacion($idUsuario){
        $liga = new CLiga();

        $clasificacion = $liga->obtenClasificacion($idUsuario);

        return $clasificacion;
    }

    public function muestraEquipoLiga($idLiga){
        $liga = new CLiga();

        $equipoliga = $liga->obtenEquipoLiga($idLiga);

        return $equipoliga;
    }

}