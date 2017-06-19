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



    public function setDatosUsuario($array_infos)
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

                case 'codigo':
                    $this->array_fields['codigo_activacion'] = $value;

                    break;

            }

        }

        //falta por hacer obtener el codigo de activacion y si esta activada la cuenta qque esto último se hará aparte en otro metodo, también tengo que hacer los get de todo

        $this->addUser($this->array_fields);

    }


    public function confirmacionUser($codigo=null){

        $this->obtenerID();
        $this->activacionUser($codigo);

    }



    public function getCompruebaUsuario($apodo, $email)
    {

        $stmt = $this->mysqli->prepare("SELECT * FROM usuarios WHERE apodo_usuario=? OR email_usuario=?");

        $stmt->bind_param("ss", $apodo, $email);

        $stmt->execute();

        $res = $stmt->get_result();

        if ($res->num_rows != 0)
            return false;
        else
            return true;

    }


    private function codigoActivacionUser(){

        if($this->array_fields['codigo_activacion'] ){

            $stmt = $this->mysqli->prepare("UPDATE usuarios SET codigo_activacion_usuario=? WHERE id_usuario=?");

            $stmt->bind_param("si",$this->array_fields['codigo_activacion'],$this->array_fields['id']);

            if($stmt->execute())
                return true;
            else
                return false;

            }
            return false;
    }

    private function activaUsuario($codigo){

        $stmt = $this->mysqli->prepare("SELECT id_usuario FROM usuarios WHERE codigo_activacion_usuario=?");

        $stmt->bind_param("s", $codigo);

        $stmt->execute();

        $res = $stmt->get_result();

        $res = $res->fetch_assoc();

        $id= $res['id_usuario'];

        if(isset($id)) {
            if ($this->mysqli->query("UPDATE usuarios SET activado_usuario=1 WHERE id_usuario=" . $id . " AND codigo_activacion_usuario='" . $codigo . "'"))
            return true;
        }else{
            return false;
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

        $stmt = $this->mysqli->prepare("SELECT * FROM usuarios WHERE email_usuario=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $res = $stmt->get_result();

        $info = array();

        $row = $res->fetch_assoc();

        foreach ($row as $key => $value)
                $info[$key] = $value;

        $this->array_fields_registrado['id'] = $info['id_usuario'];

        $this->array_fields_registrado['apodo'] = $info['apodo_usuario'];

        $this->array_fields_registrado['nombre'] = $info['nombre_usuario'];

        $this->array_fields_registrado['apellidos'] = $info['apellidos_usuario'];

        $this->array_fields_registrado['email'] = $info['email_usuario'];

        $this->array_fields_registrado['password'] = $info['password_usuario'];

        $this->array_fields_registrado['fecha_nacimiento'] = $info['fecha_nacimiento_usuario'];

    }

    public function validaPass($email, $pass)
    {
        $stmt = $this->mysqli->prepare("SELECT password_usuario FROM usuarios WHERE email_usuario=? AND activado_usuario=1");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $resultado = $resultado->fetch_assoc();
        $passBD = $resultado['password_usuario'];

        if(password_verify($pass, $passBD))
            return true;
        else
            return false;

    }


    public function setCodigoActivacion($codigo){
        if($this->codigoActivacionUser($codigo))
            return true;
        else
            return false;
    }

    public function setActivaUsuario($codigo){
        if($this->activaUsuario($codigo))
            return true;
        else
            return false;

    }

    public function ponerCodigoPassword($email,$codigo){

        if($this->setCodigoPassword($email,$codigo))
            return true;
        else
            return false;
    }

    private function setCodigoPassword($email, $codigo){

        $stmt = $this->mysqli->prepare("UPDATE usuarios SET codigo_activacion_usuario=? WHERE email_usuario=?");

        $stmt->bind_param("ss", $codigo, $email);
        $stmt->execute();

        //var_dump($stmt);


        if($stmt->affected_rows == 1)
            return true;
        else
            return false;

    }

    public function ponerNuevaPassword($codigoUrl, $password){

        if($this->setNuevaPassword($codigoUrl, $password))
            return true;
        else
            return false;

    }

    private function setNuevaPassword($codigoUrl, $password){

        $password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->mysqli->prepare("UPDATE usuarios SET password_usuario=? WHERE codigo_activacion_usuario=?");

        $stmt->bind_param("ss", $password, $codigoUrl);

        $stmt->execute();

        if($stmt->affected_rows == 1)
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