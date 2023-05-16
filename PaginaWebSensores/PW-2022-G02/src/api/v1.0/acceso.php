<?php
session_start();



require "../includes/conexion.php";



// Recepción de datos enviados mediante POST desde ajax

$usuario = $_POST['usuario'];
$password = $_POST['password'];






// Compruebo si es un usuario registrado

$consulta = "SELECT * FROM usuarios WHERE nombre='$usuario' AND password='$password ' ";



$sql = mysqli_query($conn, $consulta);

$row = mysqli_fetch_assoc($sql);

$numero_filas = mysqli_num_rows($sql);




// Si es el usuario es con rol administrador

if($numero_filas >= 1 &&  $row['rol']  == 'admin'){

    $_SESSION["administrador"] = $row['id'];

    $data = "admin.php";
    // $data = 'header_nav_cerrarSesion';



}


// Si es el usuario es con rol normal

elseif($numero_filas >= 1 && $row['rol'] == 'normal'){

    $_SESSION["usuario"] = $row['nombre'];

    $data = 'mapas.php?usuario='. $row['nombre'];

}


// Si no está registrado me lleva a scrip-css.jp para controlar el error login

else{

    $_SESSION["administrador"] = null;

    $_SESSION["usuario"] = null;

    $data = null;


}


// Pasa el resultado de data


print json_encode($data);

$conexion = null;





