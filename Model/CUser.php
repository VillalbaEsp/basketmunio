<?php


class CUser{

    private $mysqli;

    private $array_fields;

    private $array_fields_registrado;

    public function __construct()
    {

        require_once("Conexion.php");

        $this->mysqli=Conexion::conexionMysqli();
        $this->array_fields = array(

            'id'     => 0,
            'apodo'  => '',
            'nombre' => '',
            'apellidos' => '',
            'email'     => '',
            'password'  => '',
            'fecha_nacimiento'   => '',
            'codigo_activacion'  => '0',
            'activado'           => 0
        );

        $this->array_fields_registrado = array(

            'id'     => 0,
            'apodo'  => '',
            'nombre' => '',
            'apellidos' => '',
            'email'     => '',
            'password'  => '',
            'fecha_nacimiento'   => '',
            'codigo_activacion'  => '0',
            'activado'           => 0

        );




    }



    public function setDatosUsuario($array_infos, $codigo=null)
    {

        foreach ($array_infos  as $key => $value){

            switch ($key){

                case 'apodo':

                    $this->array_fields['apodo'] = $value;

                    break;
                case 'nombre':

                    $this->array_fields['nombre'] = $value;

                    break;
                case 'apellidos':

                    $this->array_fields['apellidos'] = $value;

                    break;
                case 'email':

                    $this->array_fields['email'] = $value;

                    break;
                case 'password':

                    $this->array_fields['password'] = password_hash($value, PASSWORD_DEFAULT);

                    break;
                case 'fecha_nacimiento':

                    $this->array_fields['fecha_nacimiento'] = $value;

                    break;

            }

        }

        //falta por hacer obtener el codigo de activacion y si esta activada la cuenta qque esto último se hará aparte en otro metodo, también tengo que hacer los get de todo

        $this->addUser($this->array_fields);
        $this->obtenerID();
        $this->activacionUser($codigo);
    }


    private function activacionUser($codigo){


        if($codigo != null ){

            /*$prueba2 = "UPDATE usuarios SET codigo_activacion_usuario='". $codigo ."' WHERE id_usuario=".$this->array_fields['id'].")";
            

            $consulta = $this->mysqli->query("UPDATE usuarios SET codigo_activacion_usuario='". $codigo ."' WHERE id_usuario=".$this->array_fields['id']);

            $prueba = $this->mysqli;*/


            $stmt = $this->mysqli->prepare("UPDATE usuarios SET codigo_activacion_usuario=? WHERE id_usuario=?");

            $stmt->bind_param("si",$codigo,$this->array_fields['id']);

            $stmt->execute();



           /*printf($prueba2);
            die();*/

            $this->array_fields['activado'] = 1;

            $consulta ="";

            $consulta = $this->mysqli->query("UPDATE usuarios SET activado_usuario=". $this->array_fields['activado']." WHERE id_usuario=". $this->array_fields['id']);


        }
    }

    private function obtenerID(){
        $consulta = $this->mysqli->query("SELECT id_usuario from usuarios where email_usuario = '".$this->array_fields['email']."'");


       $resultado=$consulta->fetch_assoc();

       $this->array_fields['id']=$resultado['id_usuario'];

       //$this->array_fields_registrado['id']=$resultado['id_usuario'];



    }
    private function addUser($array_fields){

        $consulta="";

        //$prueba = "INSERT INTO usuarios (apodo_usuario, nombre_usuario, apellidos_usuario, email_usuario, password_usuario, fecha_nacimiento_usuario, codigo_activacion_usuario, activado_usuario) VALUES ('$apodo','$nombre','$apellidos','$email','$password','$fecha','$codigo','$activado')";

        $consulta = $this->mysqli->query("INSERT INTO usuarios (apodo_usuario, nombre_usuario, apellidos_usuario, email_usuario, password_usuario, fecha_nacimiento_usuario, codigo_activacion_usuario, activado_usuario) VALUES ('".$array_fields['apodo']."','".$array_fields['nombre']."','".$array_fields['apellidos']."','".$array_fields['email']."','".$array_fields['password']."','".$array_fields['fecha_nacimiento']."','".$array_fields['codigo_activacion']."','".$array_fields['activado']."')");

    }


    public function obtenerUsuario($email){


        $stmt = $this->mysqli->prepare("SELECT * FROM usuarios WHERE_email_usuario=?");
        $stmt->$this->myslq->bind_param("i", $email);
        $stmt->$this->mysql->execute();
        $resultado = $stmt->$this->mysqli->get_result();
        $resultado = $this->mysqli->fetch_assoc();



       // $prueba = $this->mysqli;


       // $resultado=$consulta->fetch_assoc();


        $this->array_fields_registrado['id'] = $resultado['id_usuario'];

        $this->array_fields_registrado['apodo'] = $resultado['apodo_usuario'];

        $this->array_fields_registrado['nombre'] = $resultado['nombre_usuario'];

        $this->array_fields_registrado['apellidos'] = $resultado['apellidos_usuario'];

        $this->array_fields_registrado['email'] = $resultado['email_usuario'];

        $this->array_fields_registrado['password'] = $resultado['password_usuario'];

        $this->array_fields_registrado['fecha_nacimiento'] = $resultado['fecha_nacimiento_usuario'];

    }

    public function validaPass($email, $pass)
    {
        $stmt = $this->mysqli->prepare("SELECT password_usuario FROM usuarios WHERE email_usuario=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $resultado = $resultado->fetch_assoc();
        $passBD = $resultado['password_usuario'];

        //$passLogin = password_hash(base64_encode(hash('sha256', $pass, true)),PASSWORD_DEFAULT);

        if(password_verify($pass, $passBD))
            return true;
        else
            return false;

    }



   public function get_id()
    {
        return $this->array_fields_registrado['id'];
    }

    public function get_apodo()
    {
        return $this->array_fields_registrado['apodo'];
    }

    public function get_nombre()
    {
        return $this->array_fields_registrado['nombre'];
    }

    public function get_apellidos()
    {
        return $this->array_fields_registrado['apellidos'];
    }

    public function get_email()
    {
        return $this->array_fields_registrado['email'];
    }

    public function get_password()
    {
        return $this->array_fields_registrado['password'];
    }

    public function get_fecha_nacimiento()
    {
        return $this->array_fields_registrado['fecha_nacimiento'];
    }

    public function get_codigo_activacion()
    {
        return $this->array_fields_registrado['codigo_activacion'];
    }

    public function get_activado()
    {
        return $this->array_fields_registrado['activado'];
    }


}