<?php

if (!isset($peticion)) die();
if (!isset($conn)) require "../includes/conexion.php";

if ($peticion->metodo() === "GET") {
    $sql = "SELECT * FROM `vista_propiedad_parcelas`";

    if(isset($peticion->parametrosQuery()['propietario'])) {
        $sql .= " WHERE `usuario` = " . $peticion->parametrosQuery()['propietario'];
    }

    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($salida, $row);
    }
}

if ($peticion->metodo() === "PUT") {
    $sql = "UPDATE `parcelas` SET 
                   `nombre`='". $peticion->parametrosBody()->nameP ."',
                    `color`='". $peticion->parametrosBody()->color . "'  
                     WHERE `id`=" . $peticion->parametrosBody()->IDparcela;
    //die($sql);

    mysqli_query($conn, $sql);
}

if ($peticion->metodo() === "POST") {

    $sql = "INSERT INTO `parcelas`(`nombre`, `color`)
    VALUES('" . $peticion->parametrosPost()["nameP"] . "',
           '" . $peticion->parametrosPost()["color"]. "')";
    //die($sql);
    mysqli_query($conn, $sql);
    $idpar = mysqli_insert_id($conn);
    //printf("idparcela: ".$idpar."\n");
    $sql = "INSERT INTO `usuarios_parcelas`(`usuario`,`parcela`)
           VALUES('" . $peticion->parametrosPost()["IDusuario_parcela"] . "',
           '" . $idpar . "')";
    //die($sql);
    mysqli_query($conn, $sql);
}

if ($peticion->metodo() === "DELETE") {

    $sql = "DELETE FROM `parcelas` WHERE `id` = " . $peticion->parametrosPath()[0];
    mysqli_query($conn, $sql);
}