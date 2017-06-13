<?php

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



    private function loginUsuario($email)
    {
        session_start();

        $usuario = new CUser();

        $usuario->obtenerUsuario($email);

        $_SESSION['id_usuario'] = $usuario->get_id();

        header("Location: /basketmunio/view/html/pagina_principal.html");
        
    }

    public function compruebaPass(){

        $usuario = new CUser();

        if($usuario->validaPass($this->email, $this->password)) {
            $email =  $_POST['email'];
            $this->loginUsuario($email);
        }else {
            die("PA FUERA PRINGAO");
        }

    }
}