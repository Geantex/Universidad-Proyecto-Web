<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/styles.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <title>Contacta</title>
    </head>

<?php require 'header_nav_v.php'; ?>

<body id="contactar">

    <h1 id="h1contacta">Contacta con nosotros</h1>
    <p class="infoContactar">Estaremos encantados de atenderte</p>

<div class="container">
    <div class="row">
    <form action="" id="formulario">

        <div class="form-group">
            <label for="nombre">Nombre*</label>
            <input type="text" class="form-control" id="nombre" placeholder="ej: Anuel">
        </div>

        <div class="form-group">
            <label for="correo">Correo electrónico*</label>
            <input type="email" class="form-control" id="correo" placeholder="ej:quevedo@gmail.com">
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono*</label>
            <input type="tel" class="form-control" id="telefono" placeholder="123456789">
        </div>

        <div class="form-group">
            <label for="mensajetexto">Mensaje*</label>
            <textarea  type="text"  id="mensajetexto" placeholder="Contacta con nosotros" ></textarea>
        </div>

        <input  id="boton" type="submit"  onclick='enviarFormulario()' value="ENVIAR">

        <div id="error"></div>

        <div id="correcto"></div>

        </form>
    </div>

</div>

<div class="separador"></div>

<script src="js/contactar.js"></script>


<!-- FOOTER -->


<?php require 'footer.php'; ?>

</body>
</html>