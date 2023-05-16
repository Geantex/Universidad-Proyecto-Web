<?php
if (!isset($conn)) require "../includes/conexion.php";

if ($peticion->metodo() === "PUT") {
    $sql = "UPDATE `Datos` SET 
                   `Nombre`='". $peticion->parametrosBody()->nombre ."',
                    `Apellidos`='". $peticion->parametrosBody()->apellidos . "',
                    `email`='" . $peticion->parametrosBody()->email . "',
                     `telefono`= '" . $peticion->parametrosBody()->telefono . "' 
                     WHERE `ID`=" . $peticion->parametrosBody()->IDDatos;
    die($sql);
//    mysqli_query($conn, $sql);
}