
<?php
$myBBDD = mysqli_connect("127.0.0.1" ,"root", "", "basketmunio");

$resultado="";


if ($myBBDD) {

		echo "<h2>Te has conectado a la Base de Datos</h2> <br>";

		if (($fichero = fopen("../excelsDatos/jugadores_posicion_equipo.csv", "r")) !== FALSE) { 

		mysqli_query($myBBDD, "DELETE FROM jugadores");
		mysqli_query($myBBDD, "ALTER TABLE jugadores AUTO_INCREMENT=0"); // Reinicia AUTO_INCREMENT

		while (!empty(($datos = fgetcsv($fichero, 0, ",")))) {
	    	mysqli_query($myBBDD, "INSERT INTO `jugadores` (`nombre_jugador`, `posicion_jugador`, `equipo_real_jugador`, `precio_jugador`) VALUES ('$datos[0]','$datos[1]','$datos[2]', '$datos[3]');");
	    	$resultado.= $datos[0].", ".$datos[1].", ".$datos[2].", ".$datos[3]."<br>";
	    }

	    fclose($fichero);
	    echo "<h3>Datos</h3><br>".$resultado;
	}

}else{
		echo "No se ha podido conectar a la Base de Datos <br>";
}