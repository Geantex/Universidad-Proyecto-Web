<?php


require "../../includes/conexion.php";

$IDparcela = $_POST['parcela'];

$datos = array();

           $sql = "SELECT * FROM vista_mediciones_sondas WHERE IDparcela= $IDparcela";

           $query = mysqli_query($conn, $sql);  



           while ($row = mysqli_fetch_assoc($query)){ 


           $datos['temp'] [] = $row['temp'];

           $datos['hum'] [] = $row['hum'];

           $datos['salin'] [] = $row['salin'];

           $datos['lumin'] [] = $row['lumin'];
}





echo json_encode($datos);

?>