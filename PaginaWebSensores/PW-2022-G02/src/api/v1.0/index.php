<?php

require_once '../includes/PeticionREST.inc';

$peticion = new PeticionREST('v1.0');

$salida = [];

$ruta = pathinfo($peticion->recurso(), PATHINFO_FILENAME); // ELimino la extensión.php en algunos casos la petición lo lleva (login) y otos casos no



require "modelos/" . $ruta . ".php";

header('Content-Type: application/json; charset=utf-8');
echo json_encode($salida);