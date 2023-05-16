<?php

//$serverNombre = "localhost:3306";
//$userNombre = "cbotnav_gti";
//$password = "GTI2022G@ndia";
//$dbNombre = "cbotnav_hozsens";

$serverNombre = "localhost";
$userNombre = "root";
$password = "";
$dbNombre = "hozsens";


//$serverNombre = "localhost";
//$userNombre = "cbotnav_gti";
//$password = "GTI2022G@ndia";
//$dbNombre = "cbotnav_hozsens_gabriel";



// Crear la conexión
$conn = mysqli_connect($serverNombre, $userNombre, $password, $dbNombre);

// Chequear la conexión
if (!$conn) {
    die("Error: " . mysqli_connect_error());
}

mysqli_query($conn, 'SET NAMES utf8');
