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


}

/*
$nombre = $_POST['nombre_liga'];

$tipo = $_POST['tipo_liga'];

$password = $_POST['password'];

$ligaNom = "Omega";

$datos=array(

    'nombre_liga'   => $nombre,
    'tipo_liga'   => $tipo,
    'password'   => $password
);

$liga = new Cliga;

$liga->setDatosLiga($datos);

$count=$liga->equiposLiga($ligaNom);

*/