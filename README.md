# Basketmunio

http://www.taringa.net/comunidades/webdesign/3519713/Aporte-Groso-Enviar-email-de-confirmacion-al-registrar.html

https://www.fosforito.net/2016/05/21/enviar-emails-php-mail/

http://snipplr.com/view/48702/registrar-usuarios-en-php-con-validacion-de-datos-y-activacin-por-mail--3/

SCRIPT DE EXCEL A LA BDD
https://www.puntogeek.com/2011/06/24/de-excel-a-mysql-facilmente-y-sin-romperte-la-cabeza/

Visor CSV
http://www.becsv.com/csv-viewer.php

HOLA WAPI 

<?php
$myBBDD = mysqli_connect("127.0.0.1","root","");
if ($myBBDD) {

	/*mysqli_query($myBBDD, "CREATE DATABASE IF NOT EXISTS IpPaises;"); 

	mysqli_select_db($myBBDD, "IpPaises");

	mysqli_query($myBBDD," CREATE TABLE IF NOT EXISTS `ipPais` ( 
	  `ipInicial` varchar(100) NOT NULL,
	  `IpFinal` varchar(100) NOT NULL,
	  `Pais` varchar(100) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;"); */
	
	$BD = mysqli_connect("127.0.0.1","root","","basketmunio_prueba");
	
	echo "Te has conectado a la Base de Datos <br>";
}else{
		echo "No se ha podido conectar a la Base de Datos <br>";
}
	
	if (($fichero = fopen("jugadores_posicion_equipo.csv", "r")) !== FALSE) { //cuando lo ejecutes por 1 vez salta  un error por el tiempo qu tarda en meter los datos
	    // Lee los registros
	    while (($datos = fgetcsv($fichero, 0, ",")) !== FALSE) {
				
	    	mysqli_query($BD, "INSERT INTO `ipPais` (`ipInicial`, `IpFinal`,`Pais`) VALUES ('$datos[0]','$datos[1]','$datos[4]');");

	    }
	    fclose($fichero);  //Hasta aqui el ejercicio IPPais
	    }
		

	echo "Tu direccion ip: ".obtenerIpCliente()." (desde la que estas conectado)<br>"; //Aqui empieza Detectar conexiones
	
	function obtenerIpCliente(){
	
		$ip=0;
	
	
		if(!empty ($_SERVER['HTTP_CLIENT_IP']))
			$ip= $_SERVER['HTTP_CLIENT_IP'];
	
			
		
			if (!empty ($_SERVER['HTTP_X_FORWARDED_FOR'])){
				
				$ListaDeip= explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
					
				
				if($ip){
					array_unshift($ListaDeIp, $ip);
					$ip= 0;
				}
				
				foreach($ListaDeip as $direccion)
					if (!eregi ("^(192\.168|172\.16|10|224|127|0|\.", $direccion)) return $direccion;
			}
	
			
			return $ip ? $ip : $_SERVER['REMOTE_ADDR'];
	}
	
	
	
	
		
		$ip =ip2long("1.0.1.0"); //dentro del ip2long deberiamos meter la funcion obtenerIpCliente() que es nuestra ip y estara en el rango de ip de nuestro pais
		
		$resultado = mysqli_query($BD, "SELECT Pais FROM ippais WHERE  $ip BETWEEN `ipInicial` and `IpFinal`"); 
		$resultado1 = mysqli_fetch_row($resultado);
		
		echo "El país desde el que te conectas ".$resultado1[0];


