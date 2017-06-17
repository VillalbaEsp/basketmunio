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

    private $codigo;

    public function __construct()
    {

        $this->apodo = $_POST['apodo'];
        $this->nombre = $_POST['nombre'];
        $this->apellidos = $_POST['apellidos'];
        $this->email = $_POST['correo'];
        $this->password = $_POST['password'];
        $this->fecha = $_POST['f_nacimiento'];

        $this->codigo = "";


        $this->datos = array(

            'apodo' => $this->apodo,
            'nombre'=>  $this->nombre,
            'apellidos' => $this->apellidos,
            'email' => $this->email,
            'password' => $this->password,
            'fecha_nacimiento' => $this->fecha

        );


    }


    public function registarUsuario(){

        $usuario = new CUser();

        $usuario->setDatosUsuario($this->datos);

        //$this->envioMail();

        //$this->confrimacionMail("");

        /* $usuario->obtenerUsuario("aleman324");

         printf($usuario->get_id());

         printf($usuario->get_apodo());*/
    }


    private function envioMail(){

        $this->codigo = $this->generarCodigo(6);


        $mensaje = "¡Te damos la bienvenida a BASKETMUNIO!
	Esta a solo un paso de poder jugar en la plataforma, para ello deberas activar tu cuenta introduciendo el código en el siguiente enlace:

	 Introduce el siguiente código en el enlace "  . $this->codigo;

        $asunto = "Activación de tu cuenta en Basketmunio";

        mail($this->email, $asunto, $mensaje);

    }

    private function confrimacionMail($respuesta){

        $usuario = new CUser();

        if($respuesta = $this->codigo){

            $usuario->confirmacionUser($this->codigo);

        }



    }

//$codigo = "23674D";

  private function generarCodigo($longitud) {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern)-1;
        for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
        return $key;
  }










}