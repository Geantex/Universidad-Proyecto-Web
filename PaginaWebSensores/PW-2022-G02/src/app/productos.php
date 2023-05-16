<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/styles.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</head>


<?php require 'header_nav_v.php'; ?>

<body>




<h1 class="titulo_productos">PRODUCTOS</h1>

<div class="contenedorProductos">

    <div class="caja_ambiente">

        <div><img src="img/ambiente.svg"></div>

        <div ><h2>Ambiente</h2></div>

        <p>Gracias a las sondas de GTI puedes llevar un mejor control de la iluminación de los campos, gracias a contar con un sensor lumínico. Por otro lado, puedes hacer un seguimiento de la temperatura en cada parcela de tus campos.</p>

    </div>


    <div class="caja_riego">

        <div><img src="img/riego.svg"></div>

        <div ><h2>Riego</h2></div>

        <p>Las sondas de GTI te permiten que realizes un mejor seguimiento del riego de tus campos, pudiendo medir la humedad y salinidad de cada uno de éstos. Estas mediciones se realizan gracias a las sondas de humedad y salinidad incorporadas.</p>

    </div>


    <div class="caja_localizacion">

        <div><img src="img/localizacion.svg"></div>

        <div ><h2>Localización</h2></div>

        <p>Las sondas de GTI cuentan con un sensor de localización, que te permite saber el lugar de la ubicación de cada sonda. Además, te ofrece un seguimiento en tiempo real de la localización exacta de estas sondas. </p>

    </div>


    <div class="caja_seguridad">

        <div><img src="img/seguridad.svg"></div>

        <div ><h2>Seguridad</h2></div>

        <p>Nuestras sondas cuentan con un acelerómetro que permite una mayor seguridad que las sondas de la competencia, en el caso de un intento de robar las sondas. Función antirrobo y mayor control de las sondas.</p>

    </div>

</div>

<div class="separador"></div>


<!-- FOOTER -->

<?php require 'footer.php'; ?>

</body>
</html>