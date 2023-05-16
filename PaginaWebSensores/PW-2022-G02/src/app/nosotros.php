<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nosotros</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/styles.css" rel="stylesheet" type="text/css">

    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

</head>

<?php require 'header_nav_v.php'; ?>

<body>


<section class="nosotros">

    <H1>¿QUIÉNES SOMOS?</H1>

    <p id="textosobrenosotros"> GTI nace por la necesidad de crear un servicio que ayude a los agricultores a controlar sus cultivos de una manera sencilla. Al mismo tiempo que ahorren en tiempo y en dinero.
    </p>

    <H2>Nuestros fundamentos</H2>
    <br>

    <div id="accordion" class="accordion" role="tablist">
        <div class="card">
            <div class="card-header" role="tab" id="heading1">
                <h5 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapse1" aria-expanded="false" aria-controls="collapse1">
                        <svg id="tick" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16"><path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/></svg>
                        Servicio único y personalizado
                        <svg class="flecha_nosotros" xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='#{$accordion-icon-color}'><path fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/></svg>
                    </a>
                </h5>
            </div>
            <div id="collapse1" class="collapse" role="tabpanel" aria-labelledby="heading1">
                <div class="card-body">
                    Nos comprometemos a que tengas una experiencia agradable, para ello, te ofrecemos un servicio único, como nunca antes lo has tenido. Nos preocupamos por ti.<br><br>Hacemos que tu experiencia durante la compra de los sensores y mientras los usas o haces un seguimiento de éstos sea única. Queremos que no te sientas como uno más, por eso te ofrecemos una experiencia totalmente personalizada.
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" role="tab" id="heading2">
                <h5 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
                        <svg id="tick" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16"><path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/></svg>
                        Nos adaptamos a ti
                        <svg class="flecha_nosotros" xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='#{$accordion-icon-color}'><path fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/></svg>
                    </a>
                </h5>
            </div>
            <div id="collapse2" class="collapse" role="tabpanel" aria-labelledby="heading2">
                <div class="card-body">
                    Queremos que no te tengas que preocupar por nada y para eso tenemos horarios que se ajustan a tus necesidades y horarios.<br><br>Si no tienes una amplia disponibilidad no tienes que preocuparte, nosotros conseguimos quedar contigo gracias al amplio horario y al servicio personalizado que te realizamos.
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" role="tab" id="heading3">
                <h5 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapse3" aria-expanded="false" aria-controls="collapse3">
                        <svg id="tick" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16"><path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/></svg>
                        Equipo comprometido y profesional
                        <svg class="flecha_nosotros" xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='#{$accordion-icon-color}'><path fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/></svg>
                    </a>
                </h5>
            </div>
            <div id="collapse3" class="collapse" role="tabpanel" aria-labelledby="heading3">
                <div class="card-body">
                    Nuestro equipo de expertos se preocupa por ti y consigue que no te tengas que preocupar por nada. Realizan un trabajo totalmente profesional y correcto.<br><br>Contamos con un amplio equipo de profesionales. En nuestro equipo hay ingenieros, técnicos, gente de soporte, supervisores y por último pero no menos importante, un director que controla y coordina que todo vaya perfectamente.
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" role="tab" id="heading4">
                <h5 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
                        <svg id="tick" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16"><path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/></svg>
                        Servicio técnico experto
                        <svg class="flecha_nosotros" xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='#{$accordion-icon-color}'><path fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/></svg>
                    </a>
                </h5>
            </div>
            <div id="collapse4" class="collapse" role="tabpanel" aria-labelledby="heading4">
                <div class="card-body">
                    En nuestro equipo hay grandes expertos, los mejores en su puesto trabajan en la empresa GTI y se coordinan a la perfección para que los trabajos que realizan se ajusten con las exigencias del cliente.<br><br>Nuestro equipo se compromete y te ayuda, son grandes expertos, por lo que se preocuparán de que todo vaya a la perfección y así tú no te tengas que preocupar por nada extra, solamente por lo esencial.
                </div>
            </div>
        </div>
    </div>

    <br><br>
    <H2>Nuestro Equipo</H2>

    <div class="cajasequipo">
        <div><img src="img/equipo1.png" alt="Imagen equipo1" >
            <H3>Pablo</H3>
            <p>Director</p>
        </div>
        <div>
            <img src="img/equipo2.png" alt="Imagen equipo2" >
            <H3>Jose</H3>
            <p>Supervisor</p>
        </div>
        <div>
            <img src="img/equipo3.png" alt="Imagen equipo3" >
            <H3>Quevedo</H3>
            <p>Ingeniero</p>
        </div>
        <div>
            <img src="img/equipo4.png" alt="Imagen equipo4" >
            <H3>Rosa</H3>
            <p>Técnica</p>
        </div>
        <div>
            <img src="img/equipo5.png" alt="Imagen equipo5" >
            <H3>Marta</H3>
            <p>Soporte</p>
        </div>
        <div>
            <img src="img/equipo6.png" alt="Imagen equipo6" >
            <H3>Rafa</H3>
            <p>Soporte</p>
        </div>

    </div>

</section>

<div class="separador"></div>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>

<!-- FOOTER -->

<?php require 'footer.php'; ?>

</body>
</html>