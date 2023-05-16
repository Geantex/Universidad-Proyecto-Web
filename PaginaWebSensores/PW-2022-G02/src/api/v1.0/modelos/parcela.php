<?php

if(!isset($peticion)) die();

require "../includes/conexion.php";

if($peticion->metodo() === "GET") {
    $paramGet = $peticion->parametrosQuery();
    if(isset($paramGet["usuario"])) {
        $sql = "SELECT * FROM `vista_propiedad_parcelas` WHERE `nombre_usuario` = '" . $paramGet["usuario"] . "'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($salida, $row);
        }
    }
	//array_push($salida, $paramGet);
    $paramPath = $peticion->parametrosPath();
    if(count($paramPath) == 1) {
        $sql = "SELECT * FROM `parcelas` WHERE `id` = " . $paramPath[0];
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $salida = $row;
    }
    if(count($paramPath) == 2 && $paramPath[1] == 'vertices') {
        $sql = "SELECT `lat`, `lng` FROM `vertices` WHERE `parcela` = " . $paramPath[0];
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $row["lat"] = floatval($row["lat"]);
            $row["lng"] = floatval($row["lng"]);
            array_push($salida, $row);
        }
    }
	//array_push($salida, $paramPath);
}

if($peticion->metodo() === "POST") {

}

if($peticion->metodo() === "PUT") {

}

if($peticion->metodo() === "DELETE") {

}