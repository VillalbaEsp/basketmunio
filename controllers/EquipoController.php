<?php

require_once("../Model/CEquipo.php");
require_once("../Model/CUser.php");
require_once("../Model/CLiga.php");



class CRestEquipo{


    private $nombre;

    private $escudo;

    private $puntosEquipo;

    private $datos;

    private $nombreLiga;


    public function __construct()
    {
        if(isset($_POST['nombre_equipo']))
            $this->nombre= $_POST['nombre_equipo'];


        if(isset($_POST['escudo']))
            $this->escudo= $_POST['escudo'];

        if(isset($_POST['nombre_liga']))
            $this->nombreLiga = $_POST['nombre_liga'];

        $this->datos = array(

            'nombre_equipo' => $this->nombre,
            'escudo_equipo' => $this->escudo,
            'puntos_equipo' => 0, //Hay que sacarlos de las medias de los jugadores
            'id_usuario'    => '',
            'id_liga'       => ''

        );

    }


    public function addEquipo(){
        session_start();

        $equipo = new CEquipo();

       /*Añadido*/ $liga = new CLiga();

        //$usuario = new CUser();

       $this->datos['id_usuario']=$_SESSION['id_usuario'];

        //$this->datos['id_usuario']= 1;

        /*var_dump($this->datos);
        die();*/

        $this->datos['id_liga'] = $liga->getIdNombre($this->nombreLiga);
        //$this->datos['id_liga']=$liga->

      /*  var_dump("datos");*/

      var_dump($this->datos);


        $equipo->setEquipo($this->datos);

    }


    public function mostrarEquipoUsuario(){

        session_start();
        $equipo = new CEquipo();
        $idUsuario = $_SESSION['id_usuario'];

        $equiposUsuarios = $equipo->muestraExtraccionEquiposUsuario($idUsuario);

        return $equiposUsuarios;
    }

    public function infoMiEquipo($idEquipo){
        session_start();

        $equipo = new CEquipo();

        $idUsuario = $_SESSION['id_usuario'];

        $infoEquipo = $equipo->obtenInfoMiEquipo($idUsuario, $idEquipo);

        return $infoEquipo;

    }

    public function equiposDestacados(){

        $equipo = new CEquipo();

        $resultado = $equipo->muestraEquipoDestacado();

        return $resultado;

    }


    public function escudosDestacados(){

        $equipo = new CEquipo();

        $resultado = $equipo->muestraEscudoDestacado();

        return $resultado;

    }

    public function jugadoresDestacados(){

        $equipo = new CEquipo();

        $resultado = $equipo->muestraJugadoresDestacado();

        return $resultado;

    }


}