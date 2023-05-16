<?php

if (!isset($peticion)) die();
if (!isset($conn)) require "../includes/conexion.php";

if ($peticion->metodo() === "GET") {
    $sql = "SELECT * FROM `contacto`";

    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($salida, $row);
    }
}

if ($peticion->metodo() === "PUT") {
}

if ($peticion->metodo() === "POST") {

    $sql = "INSERT INTO `contacto`(`correo`, `Nombre`, `telefono`, `Mensaje`) 
    VALUES('" . $peticion->parametrosPost()["correo"] . "',
           '" . $peticion->parametrosPost()["Nombre"] . "', 
           '" . $peticion->parametrosPost()["telefono"] . "',
           '" . $peticion->parametrosPost()["mensajetexto"] . "')";
    array_push($salida, $sql);
    //die($sql);
    mysqli_query($conn, $sql);
}

if ($peticion->metodo() === "DELETE") {

}
