
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

$myBBDD = new mysqli("127.0.0.1" ,"root", "", "basketmunio");
$myBBDD2 = new mysqli("127.0.0.1" ,"root", "", "basketmunio");

$resultado="";

if ($myBBDD) {

    echo "<h2>Te has conectado a la Base de Datos</h2> <br>";
    foreach ($ficheros as $key => $value) {

        if (($fichero = fopen("../excelsDatos/jugadoresEstadisticas/".$value , "r")) !== FALSE) {

            while (($datos = fgetcsv($fichero, 0, ",")) !== FALSE) {
                $resultado = $myBBDD->query("SELECT id_jugador FROM jugadores WHERE nombre_jugador='".$datos[0]."'");
                if($resultado != false){
                $info = $resultado->fetch_array();
                $jugador_id = $info['id_jugador'];

                if($jugador_id == "") {
                    print_r($value."<br>");
                    print_r("<span style='background-color: red'>El jugador " . $datos[0] . " tiene el ID " . $jugador_id . "</span><br>");
                } else {
                    print_r($value."<br>");
                    print_r("<span style='background-color: green'>El jugador " . $datos[0] . " tiene el ID " . $jugador_id . "</span><br>");
                }

                $valido= mysqli_query($myBBDD2, "INSERT INTO `estadisticas_totales` (`id_jugador`, `gp_estadistica_total`, `min_estadistica_total`, `pts_estadistica_total`, `ast_estadistica_total`, `blk_estadistica_total`, `reb_estadistica_total`, `dreb_estadistica_total`, `oreb_estadistica_total`, `stl_estadistica_total` ) VALUES ('$jugador_id', '$datos[1]','$datos[2]','$datos[3]', '$datos[16]', '$datos[19]','$datos[15]','$datos[14]', '$datos[13]','$datos[18]')");
//                print_r("INSERT INTO estadisticas_totales (`id_jugador`, `gp_estadistica_total`, `min_estadistica_total`, `pts_estadistica_total`, `ast_estadistica_total`, `blk_estadistica_total`, `reb_estadistica_total`, `dreb_estadistica_total`, `oreb_estadistica_total`, `stl_estadistica_total` ) VALUES ('$jugador_id', '$datos[1]','$datos[2]','$datos[3]', '$datos[16]', '$datos[19]','$datos[15]','$datos[14]', '$datos[13]','$datos[18]')<br>");
//                var_dump($valido);
//                die();

                if($valido) {
                    print_r("<span style='background-color: green'>Correcto, dato introducido</span><br>");
                    print_r("------------------------<br>");
                } else {
                    print_r("<span style='background-color: red'>Error, dato no introducido</span><br>");
                    print_r("------------------------<br>");
                }
                //$resultado.= $jugador_id.', '.$datos[1].', '.$datos[2].', '.$datos[3].', '.$datos[16].', '.$datos[19].', '.$datos[15].', '.$datos[14].', '.$datos[13].', '.$datos[18]."<br>";
                }
            }

            fclose($fichero);
        }
    }
    //echo "<h3>Datos</h3><br>".$resultado;
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