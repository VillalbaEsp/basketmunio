<?php

require_once("CUser.php");

class CRestUser{


    private $apodo;

    private $nombre;

    private $apellidos;

    private $email;

    private $password;

    private $fecha;


    private $datos;



    public function __construct()
    {

        $this->apodo = $_POST['apodo'];
        $this->nombre = $_POST['nombre'];
        $this->apellidos = $_POST['apellidos'];
        $this->email = $_POST['correo'];
        $this->password = $_POST['password'];
        $this->fecha = $_POST['f_nacimiento'];


        $this->datos = array(

            'apodo' => $this->apodo = $_POST['apodo'],
            'nombre'=>  $this->nombre = $_POST['nombre'],
            'apellidos' => $this->apellidos = $_POST['apellidos'],
            'email' => $this->email = $_POST['correo'],
            'password' => $this->password = $_POST['password'],
            'fecha_nacimiento' => $this->fecha = $_POST['f_nacimiento']

        );



    }




//$codigo = "23674D";
  public function obtenerCodigo(){

  }


  public function registarUsuario(){
      $usuario = new CUser();

      //$usuario->setDatosUsuario($this->datos,$codigo);

     /* $usuario->obtenerUsuario("aleman324");

      printf($usuario->get_id());

      printf($usuario->get_apodo());*/
  }










}