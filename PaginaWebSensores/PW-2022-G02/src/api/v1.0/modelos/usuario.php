<?php

if( !isset($peticion) ) die();

require '../includes/conexion.php';

if($peticion->metodo() === "GET") {
    $sql = 'SELECT * FROM usuarios';
    $resultado = mysqli_query($conn, $sql);
    while ($fila = mysqli_fetch_assoc($resultado)) {
        array_push($salida, $fila);
    }
}

if($peticion->metodo() === "POST"){
    $sql = 'SELECT * FROM usuarios WHERE nombre = "' . $peticion->parametrosPost()['user']. '" AND password = "' .$peticion->parametrosPost()['password'] . '"';
    $resultado = mysqli_query($conn, $sql);
    if(mysqli_num_rows($resultado) != 1) {
        http_response_code(401);
    }
    while ($fila = mysqli_fetch_assoc($resultado)) {
        array_push($salida, $fila);
    }
}