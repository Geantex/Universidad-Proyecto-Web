<?php

if (!isset($peticion)) die();
if (!isset($conn)) require "../includes/conexion.php";

if ($peticion->metodo() === "GET") {
    $sql = "SELECT * FROM `vista_datos_usuario`";

    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($salida, $row);
    }
}

if ($peticion->metodo() === "PUT") {
    $sql = "UPDATE `Datos` SET 
                   `Nombre`='". $peticion->parametrosBody()->nombre ."',
                    `Apellidos`='". $peticion->parametrosBody()->apellidos . "',
                    `email`='" . $peticion->parametrosBody()->email . "',
                     `telefono`= '" . $peticion->parametrosBody()->telefono . "' 
                     WHERE `ID`=" . $peticion->parametrosBody()->IDDatos;
    //die($sql);
    mysqli_query($conn, $sql);
}

if ($peticion->metodo() === "POST") {

    $sql = "INSERT INTO `Datos`(`Nombre`, `Apellidos`, `telefono`, `email`) 
    VALUES('" . $peticion->parametrosPost()["nombre"] . "',
           '" . $peticion->parametrosPost()["apellidos"] . "', 
           '" . $peticion->parametrosPost()["telefono"] . "',
           '" . $peticion->parametrosPost()["email"] . "')";
    //die($sql);
    mysqli_query($conn, $sql);
    $idDatos = mysqli_insert_id($conn);
    printf("idDatos: ".$idDatos."\n");
    $sql = "INSERT INTO `usuarios`(`nombre`,`password`,`rol`)
           VALUES('" . $peticion->parametrosPost()["usuario"] . "',
           '" . $peticion->parametrosPost()["password"] . "',
           '" . $peticion->parametrosPost()["rol"] . "')";
    mysqli_query($conn, $sql);
    $idUsuarios = mysqli_insert_id($conn);
    $sql = "INSERT INTO `Datos_Usuarios`
           VALUES(".$idUsuarios.",".$idDatos.")";
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