<?php

if(!isset($peticion)) die();

require "../includes/conexion.php";

if($peticion->metodo() === "GET") {
    $paramGet = $peticion->parametrosQuery();

        $sql = "SELECT * FROM `sondas`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($salida, $row);
        }

	//array_push($salida, $paramGet);
//    $paramPath = $peticion->parametrosPath();
//    if(count($paramPath) == 1) {
//        $sql = "SELECT * FROM `sondas` WHERE `ID` = " . $paramPath[0];
//        $result = mysqli_query($conn, $sql);
//        $row = mysqli_fetch_assoc($result);
//        $salida = $row;
//    }
//    if(count($paramPath) == 2 && $paramPath[1] == 'vertices') {
//        $sql = "SELECT `CoorX`, `CoorY` FROM `vista_mediciones_sondas` WHERE `IDsonda` = " . $paramPath[0];
//        $result = mysqli_query($conn, $sql);
//        while ($row = mysqli_fetch_assoc($result)) {
//            $row["CoorX"] = floatval($row["CoorY"]);
//            $row["CoorY"] = floatval($row["CoorX"]);
//            array_push($salida, $row);
//        }
//    }
	//array_push($salida, $paramPath);
}

if($peticion->metodo() === "POST") {

}

if($peticion->metodo() === "PUT") {
    $paramGet = $peticion->parametrosQuery();
    $sql = "UPDATE `sondas` SET `encendido` = 'false' WHERE ID = " . $paramGet['sonda'];
//    die($sql);
    $result = mysqli_query($conn, $sql);
}

if($peticion->metodo() === "DELETE") {

}