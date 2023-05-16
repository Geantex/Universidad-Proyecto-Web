<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GTI Sensores</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</head>

<?php require 'app/header_nav.php'; ?>


<!--Fin de header y barra de navegación-->

<body>

<!--principial-->

<div class="Hero" id="pag-principal">

    <div id="contenido">

        <div>
            <h1>Controla tus <br/>cultivos</h1>
            <h2>La mejor forma de gestionar<br/>tus campos</h2>
        </div>

        <a href="app/contactar.php">

            <div>

                <a href="app/contactar.php"><button type="button" onclick=""> CONTACTAR</button></a>

            </div>



            <a href="#espacio-descubrir">

                <div id="espacio-descubrir">
                    <p id="descubrir-mas"><b>DESCUBRE MÁS</b></p>
                    <img src="app/img/flecha.svg" alt="flecha para bajar" class="flechaDescubre">
                </div>

            </a>

    </div>
</div>







<section class="productoshero">

    <div class="container-fluid">


        <h1>PRODUCTOS</h1>

        <h2>¿Qúe sensores y funcionalidades tiene?</h2><br>

        <div class="row">


            <div  class="col-md-3 caja_productos">

                <div class="p-3 bgColorClaro">
                    <img src="app/img/ambiente.svg">

                    <h3 class="reducirTamano">Ambiente</h3>

                    <p>Iluminación y temperatura</p>

                </div>
            </div>


            <div class="col-md-3 caja_productos">

                <div class="p-3 bgColorClaro">

                    <img src="app/img/riego.svg">

                    <h3 class="reducirTamano">Riego</h3>

                    <p>Salinidad y humedad</p>

                </div>
            </div>

            <div class="col-md-3 caja_productos">

                <div class="p-3 bgColorClaro">

                    <img src="app/img/localizacion.svg">

                    <h3 class="reducirTamano">Localización</h3>

                    <p>Sondas en tiempo real</p>

                </div>
            </div>

            <div class="col-md-3 caja_productos">

                <div class="p-3 bgColorClaro">

                    <img src="app/img/seguridad.svg">

                    <h3 class="reducirTamano">Seguridad</h3>

                    <p>Antirrobo y control de las sondas</p>

                </div>
            </div>



        </div>

    </div> <br><br>
</section>





<section class="textoshero">
    <div class="container">

        <div class="row">

            <div class="col-md-6" style="padding: 30px;">
                <div >
                    <h3>Aumenta la productividad con un servicio totalmente personalizado</h3>

                    <p class="pt-3">Consigue que el rendimiento de tus cultivos se incremente gracias a las sondas de GTI. Nos preocupamos por ti, por eso hemos diseñado un producto que se ajusta a tus necesidades. Un grupo de expertos hace un seguimiento personalizado de tus cultivos.</p>

                </div>

            </div>

            <div class="col-md-6" style="padding: 30px;">
                <div >
                    <h3>Haz un seguimiento de tus cultivos de una manera sencilla</h3>

                    <p class="pt-3">Controla tus cultivos fácilmente mediante la app de las sondas de GTI. Haz un seguimiento de tus cultivos mediante una interfaz muy sencilla. Nuestro servicio se ajusta a tus necesidades tt y tiene todo lo que necesitas. Seguimiento muy simple.</p>
                </div>

            </div>

            <div class="col-md-12">
                <a href="app/contactar.php"><button type="button" onclick=""> CONTACTAR</button>
                </a><br><br>
            </div>

        </div>
    </div>

</section>


<div class="separador"></div>


<!-- FOOTER -->


<?php require 'app/footer.php'; ?>


</body>
</html>