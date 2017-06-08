<?php
$myBBDD = mysqli_connect("127.0.0.1" ,"root", "", "basketmunio");

$resultado="";


if ($myBBDD) {

    echo "<h2>Te has conectado a la Base de Datos</h2> <br>";

    if (($fichero = fopen("../excelsDatos/calendarioDefinitivo.csv", "r")) !== FALSE) {

        mysqli_query($myBBDD, "DELETE FROM partidos_reales");
        mysqli_query($myBBDD, "ALTER TABLE partidos_reales AUTO_INCREMENT=1"); // Reinicia AUTO_INCREMENT

        while (!empty(($datos = fgetcsv($fichero, 0, ",")))) {
            $res = $myBBDD->query("INSERT INTO partidos_reales (fecha_hora_partido, equipo_local_partido, equipo_visitante_partido, resultado_partido) VALUES ('".$datos[0]."','".$datos[1]."','".$datos[3]."', '".$datos[2]." - ".$datos[4]."' )");

            if ($myBBDD) {
                print_r("<span style='background-color: green'>Correcto, dato introducido</span><br>");
                print_r($datos[0].", ".$datos[1].", ".$datos[3].", ".$datos[2].", ".$datos[4]."<br>");
                print_r("***********************<br>");
            } else {
                print_r("<span style='background-color: red'>Error, dato no introducido</span><br>");
                print_r(".$datos[0].", ".$datos[1].", ".$datos[3].", ".$datos[2].", ".$datos[4].<br>");
                print_r("------------------------<br>");
            }
        }
    }
}
	    fclose($fichero);
?>