<?php

if (!isset($peticion)) die();
if (!isset($conn)) require "../includes/conexion.php";

if ($peticion->metodo() === "GET") {
    $sql = "SELECT * FROM `vista_parcelas_con_vertices`";

    if(isset($peticion->parametrosQuery()['parcela'])) {
        $sql .= " WHERE `id` = " . $peticion->parametrosQuery()['parcela'];
    }

    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($salida, $row);
    }
}

if ($peticion->metodo() === "PUT") {

}

if ($peticion->metodo() === "POST") {

    $sql = "INSERT INTO `vertices`(`lat`, `lng`, `parcela`) 
    VALUES('" . $peticion->parametrosPost()["nombre"] . "',
           '" . $peticion->parametrosPost()["apellidos"] . "', 
           '" . $peticion->parametrosPost()["telefono"] . "',
           '" . $peticion->parametrosPost()["email"] . "')";
    //die($sql);
    mysqli_query($conn, $sql);
}

if ($peticion->metodo() === "DELETE") {

    $sql = "DELETE FROM `usuarios` WHERE `id` = " . $peticion->parametrosPath()[0];
    //array_push($salida, $sql);
    mysqli_query($conn, $sql);
    $sql = "DELETE FROM `Datos` WHERE `ID` = " . $peticion->parametrosPath()[1];
    //die($sql);
    mysqli_query($conn, $sql);
}