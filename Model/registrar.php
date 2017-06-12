<?php

//CONTROLADOR
$apodo = $_POST['apodo'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$password = $_POST['password'];
$conf_password = $_POST['conf_password'];
$f_nacimiento = $_POST['f_nacimiento'];
//...
//----------------------------------------------------------------------------------
//<-- Tus rutinas para validar los datos, si están completos etc...

//CONTROLADOR    ----- mira si hay campos vacios validación
if(empty($apodo) || empty($nombre) || empty($apellidos) || empty($correo) || empty($password) || empty($conf_password) || empty($f_nacimiento)){
    echo "Debes rellenar todos los campos.";

}

if($password != $conf_password)
{
	echo "Las contraseñas no coinciden.";
}


//CMODEL encriptar la contraseña
$password = password_hash($password, PASSWORD_BCRYPT); //para comprobar que la contraseña introducida es la correcta debemos usar la función password_verify()

//-->

//CONTROLADOR
$aleatorio = uniqid(); //Genera un id único para identificar la cuenta a traves del correo.
/*$contrasena = rand(1999, 9999); //Devuelve un número aleatorio entre los dos rangos. Lo usuaremos como
                                //Contraseña temporal.*/

// $connect= mysqli_connect("mysql.hostinger.es", "u592861914_root", "catalunya69", "u592861914_bm");
//CMODEL
$connect= mysqli_connect("127.0.0.1", "root", "", "basketmunio");
                                
$sql = "Insert Into usuarios (apodo, nombre, apellidos, correo, password, f_nacimiento, codigo, activo) Values ('$apodo', '$nombre', '$apellidos', '$correo', '$password', '$f_nacimiento', '$aleatorio', 0)";

$datos = mysqli_query($connect, $sql);


//Tus rutinas para insertar en la base de datos.

//CONTROLADOR
$mensaje= "¡Te damos la bienvenida a BASKETMUNIO!
	Esta a solo un paso de poder jugar en la plataforma, para ello deberas activar tu cuenta pulsando el siguiente enlace:

	http://www.basketmunio.esy.es/activacion.php?id=".$aleatorio;

$asunto = "Activación de tu cuenta en Basketmunio";

if(mail($correo,$asunto,$mensaje)){
    echo "Se ha enviado un mensaje a tu correo electronico con el enlace de activación";
}else{
    echo "Ha ocurrido un error y no se puede enviar el correo";
}
/*echo "Registrado satisfactoriamente.";*/
?>

