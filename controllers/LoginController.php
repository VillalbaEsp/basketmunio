<?php

session_start();
require_once("../model/CUser.php");

class CRestLogin
{

    private $email;

    private $password;

    public function __construct()
    {

        $this->email = $_POST['email'];
        $this->password = $_POST['password'];

        $this->datos = array(

            'email' => $this->email,
            'password' => $this->password,


        );


    }



    private function loginUsuario()
    {

        $_SESSION['email'] = $_POST['email'];

        $usuario->obtenerUsuario($this->email);

    }

    public function compruebaPass(){

        $usuario = new CUser();

        if($usuario->validaPass($this->email, $this->password)) {
            $_SESSION['email'] = $_POST['email'];
            die('Sesión establecida!');
        }else {
            die("PA FUERA PRINGAO");
        }

    }
}