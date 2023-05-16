
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reestablecer Contraseña</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <LINK HREF="../css/styles.css" rel="stylesheet" type="text/css">
    <!--<link href="css/reestablecerContraseña.css" rel="stylesheet" type="text/css">
    <link href="css/header.css" rel="stylesheet" type="text/css">-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/styles.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">    </script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.2/js/umd/util.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<?php require 'header_nav_v.php'; ?>


<body>
<section class="restablecercontraseña">
    <h1>Restablece tu contraseña</h1>
    <p>Indica tu correo electrónico y te enviaremos un enlace para que puedas cambiarla.</p>
    <form>
    <input class="correo" type="email" name="contraseña" id="contraseña"  placeholder="CORREO ELECTRÓNICO" required>
    <br>
    <a href="consultaEnviada.html"><button type="submit" class="boton_enviar" id="boton_enviar">ENVIAR</button></a>
    </form>
    <br>
    <a class="volver" href="login.html">Volver al inicio de sesión</a>
</section>


</body>
</html>
