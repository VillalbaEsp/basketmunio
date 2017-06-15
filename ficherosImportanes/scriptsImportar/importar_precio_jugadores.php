<?php
$myBBDD = mysqli_connect("127.0.0.1" ,"root", "", "basketmunio");

$resultado="";


if ($myBBDD) {

    echo "<h2>Te has conectado a la Base de Datos</h2> <br>";

    for($id = 1; $id<=453; $id++) {
        $numero = rand(0, 10);
        $precio = "";

        switch ($numero) {
            case 0:
                $precio = 100;
                break;

            case 1:
                $precio = 200;
                break;

            case 2:
                $precio = 300;
                break;

            case 3:
                $precio = 400;
                break;

            case 4:
                $precio = 500;
                break;

            case 5:
                $precio = 600;
                break;

            case 6:
                $precio = 700;
                break;

            case 7:
                $precio = 800;
                break;

            case 8:
                $precio = 900;
                break;

            case 9:
                $precio = 1000;
                break;

            case 10:
                $precio = 1100;
                break;

        }

        mysqli_query($myBBDD, "UPDATE jugadores SET precio_jugador ='" . $precio . "' WHERE id_jugador = '" . $id . "'");
        $resultado .= "Para el jugador con ID " . $id . " su precio es de " . $precio . "<br>";

    }

    echo "<h3>Datos</h3><br>".$resultado;

}else{
    echo "No se ha podido conectar a la Base de Datos <br>";
}