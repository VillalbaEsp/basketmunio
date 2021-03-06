<?php

require_once("../model/CUser.php");

class CRestRegistro{


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
        if(isset($_POST['apodo']))
            $this->apodo = $_POST['apodo'];

        if(isset($_POST['nombre']))
            $this->nombre = $_POST['nombre'];

        if(isset($_POST['apellidos']))
            $this->apellidos = $_POST['apellidos'];

        if(isset($_POST['correo']))
            $this->email = $_POST['correo'];

        if(isset($_POST['password']))
            $this->password = $_POST['password'];

        if(isset($_POST['f_nacimiento']))
            $this->fecha = $_POST['f_nacimiento'];

        if(isset($_POST['codigo']))
            $this->codigo = $_POST['codigo'];


        $this->datos = array(

            'apodo' => $this->apodo,
            'nombre'=>  $this->nombre,
            'apellidos' => $this->apellidos,
            'email' => $this->email,
            'password' => $this->password,
            'fecha_nacimiento' => $this->fecha,
            'codigo' => ''

        );


    }


    public function registrarUsuario(){

        $usuario = new CUser();

        $this->datos['codigo'] = $this->generarCodigo(12);

        $usuario->setDatosUsuario($this->datos);

        // Envia email de activacion y devuelve el codigo de activacion
        $this->envioMail();

        if($usuario->setCodigoActivacion($this->codigo))
            return true;
        else
            return false;

    }

    public function activaUser(){

        $usuario = new CUser();

        if($usuario->setActivaUsuario($this->codigo))
            return true;
        else
            return false;
    }

    public function compruebaUsuario(){

        $usuario = new CUser();

        if($usuario->getCompruebaUsuario($this->apodo, $this->email) == true)
            return true;
        else
            return false;

    }


    private function envioMail(){


        $mensaje = "¡Te damos la bienvenida a BASKETMUNIO!
	Esta a solo un paso de poder jugar en la plataforma, para ello deberas activar tu cuenta introduciendo el código en el siguiente enlace: ".$this->datos['codigo']."

	 Introduce el código en el enlace:
        http://www.basketmunio.esy.es/view/html/registro-correcto.php";

        $asunto = "Activación de tu cuenta en Basketmunio";

        $cabeceras = 'From: basketmunio@gmail.com' . "\r\n" .
        'Reply-To: basketmunio@gmail.com' . "\r\n";

        mail($this->email, $asunto, $mensaje, $cabeceras);

    }

    private function confirmacionMail($respuesta){

        $usuario = new CUser();

        if($respuesta = $this->codigo){

            $usuario->confirmacionUser($this->codigo);

        }
    }


  private function generarCodigo($longitud) {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $max = strlen($pattern)-1;
        for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
        //$key = uniqid();
        return $key;
  }

    public function olvidoPassword($email)
    {

        $usuario = new CUser();

        $this->codigo = $this->generarCodigo(14);

        if ($usuario->ponerCodigoPassword($email, $this->codigo)) {
            $this->envioMailPassword($this->codigo);
            return true;
        } else{
            return false;
        }
    }

    private function envioMailPassword(){


        $mensaje = "Para poder recuperar tu contrañseña accede al siguiente enlace:
        http://www.basketmunio.esy.es/view/html/olvido-password.php?codigo=".$this->codigo;

        $asunto = "Activación de tu cuenta en Basketmunio";

        $cabeceras = 'From: basketmunio@gmail.com' . "\r\n" .
            'Reply-To: basketmunio@gmail.com' . "\r\n";

        mail($this->email, $asunto, $mensaje, $cabeceras);

    }

    public function nuevaPassword( $codigoUrl, $password){

        $usuario = new CUser();

        $this->password = $password;

        $this->codigo = $codigoUrl;

        if($usuario->ponerNuevaPassword( $this->codigo, $this->password))
            return true;
        else
            return false;

    }





}