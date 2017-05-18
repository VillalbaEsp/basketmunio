
<?php

$ficheros= array();

$directorio = opendir("../excelsDatos/jugadoresEstadisticas"); //ruta actual
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
    if (!is_dir($archivo))//verificamos si es o no un directorio
    {
    	array_push($ficheros, $archivo);
    }
}

$myBBDD = mysqli_connect("127.0.0.1" ,"root", "", "basketmunio");

$resultado="";

if ($myBBDD) {

	echo "<h2>Te has conectado a la Base de Datos</h2> <br>";
	foreach ($ficheros as $key => $value) {

		if (($fichero = fopen("../excelsDatos/jugadoresEstadisticas/".$value , "r")) !== FALSE) { 

			while (($datos = fgetcsv($fichero, 0, ",")) !== FALSE) {

				$jugador_id = mysqli_query($myBBDD, "SELECT id_jugador FROM jugadores WHERE nombre_jugador='".$datos[0]."'");
				$jugador_id = $jugador_id->fetch_array();

				mysqli_query($myBBDD, "INSERT INTO estadisticas_totales (`id_jugador`, `gp_estadistica_total`, `min_estadistica_total`, `ptos_estadistica_total`, `ast_estadistica_total`, `blk_estadistica_total`, `reb_estadistica_total`, `dreb_estadistica_total`, `oreb_estadistica_total`, `stl_estadistica_total` ) VALUES ('$jugador_id', $datos[1]','$datos[2]','$datos[3]', '$datos[16]', '$datos[19]','$datos[15]','$datos[14]', '$datos[13]','$datos[18] );");
				$resultado.= $datos[1].', '.$datos[2].', '.$datos[3].', '.$datos[16].', '.$datos[19].', '.$datos[15].', '.$datos[14].', '.$datos[13].', '.$datos[18]."<br>";
	    	//$resultado.= var_dump($datos);
			}

			fclose($fichero);
		}
	}
	echo "<h3>Datos</h3><br>".$resultado;
}else{
	echo "No se ha podido conectar a la Base de Datos <br>";
}

/*

gp_estadistica_total -> [1]
min_estadistica_total -> [2]
ptos_estadistica_total -> [3]
ast_estadistica_total -> [16]
blk_estadistica_total -> [19]
reb_estadistica_total ->[15]
dreb_estadistica_total ->[14]
oreb_estadistica_total ->[13]
stl_estadistica_total ->[18]

*/