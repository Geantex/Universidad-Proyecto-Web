<?php
session_start();

if (!isset($_SESSION["usuario"]))
    echo"<script language='javascript'>window.location='login.html'</script>;";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mapas</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/styles.css" rel="stylesheet" type="text/css">

    <style>
        #map{
            width: 100%;
            height: 80vh;
            background-color: black;
        }
        #selector-parcelas{
            display: flex;
            flex-direction: column;
            gap: .5em;
        }
        #mapaReiniciarIcono{
            position: absolute;
            right: 65px;
            top: 72px;
            z-index: 5;
            padding: 5px    ;
            background-color: #FFFFFF;
            width: 40px;
            border-radius: 2px;

        }
        .chart-container {
            position: relative;
            width: 80vw;
            height: 50vh;
            border: solid 1px black;
            margin: 0 auto;
        }
        .botonGraficas{
            border-color: var(--colorPrincipal) ;
            color: white;
            background-color: var(--colorPrincipal) ;
            width: 20rem;
            height: 3.6rem;
            font-size: 1.5rem;
            display: block;
            margin: 0 auto;

        }
        .textoGraficasFallo{
            font-size: 48px;
            font-weight: bold;
            text-align: center;
        }

        .cajacolores{
            /*margin: 0 auto;*/
            margin-bottom: 1rem;
            margin-top: -1.5rem;
            background: #e3e3e3;
            border-radius: 0 0 5px 0;
            border: 2px #c5c5c5 solid;
            border-top: 0;
            border-left: 0;
            padding: 0.5rem 0.5rem 0 0.5rem;
            max-width: fit-content;
            max-height: fit-content;
            font-family: Inter;
            font-size: 12px;
            font-weight: 600;
            display: flex;
        }

        .cajacolores div img{
            height: 20px;
            max-width: 100%;
        }

        .cajacolores div{
            margin-right: 1rem;
            padding-left: 0.5rem ;
        }
        #informacion{
            display: none
        }
        .btn-cerrarGrafica{
            width:auto;
            background-color: #7ead62;
            color: white;
            border: red 2px solid;
        }

    </style>

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




<!-- Aquí empieza el mapa-->
<img id="mapaReiniciarIcono" src="img/recargarFlecha.svg" alt="Reiniciar parcelas" onclick="initMap()">

<section id="mapasSeccion">
    <!--    Esta parte contiene los desplegables para seleccionar las parcelas y las sondas, o añadir nuevas-->
    <!--    Me gustaria poder arreglar esto en el css-->
    <!--    <select id="selector-parcelas"></select>-->

    <div>

    </div>
    <!--Aquí empieza el mapa-->

    <div id="map">

    </div>

    <br>
    <!--    <button onclick="MostrarOcultar()">Mostrar/Ocultar parcela</button>-->

    <script>
        let map;
        let parcelas;


        async function initMap() {

            let urlParams = new URLSearchParams(window.location.search);
            let usuario = urlParams.get("usuario");
            let parcela = urlParams.get("parcela");

            if (usuario) {
                await obtenerParcelasUsuario(usuario);
            } else if (parcela) {
                await obtenerParcela(parcela)
            } else {
                await obtenerParcelasUsuario(1);
            }
        }

        function crearMapa() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 39.9965055, lng: -0.1674364},
                zoom: 18,
                mapTypeId: 'hybrid',
                styles: [
                    {
                        featureType: 'poi',
                        stylers: [{visibility: 'off'}]
                    },
                    {
                        featureType: 'transit',
                        stylers: [{visibility: 'off'}]
                    }
                ],
                mapTypeControl: false,
                streetViewControl: false,
                rotateControl: false,
            });
        }

        async function obtenerParcela(parcela) {
            crearMapa();
            let consulta = await fetch("../api/v1.0/parcela/" + parcela);
            parcelas = [];
            parcelas[0] = await consulta.json();
            await crearPoligono(parcelas[0]);
            ajustarMapa();
        }

        async function obtenerParcelasUsuario(usuario) {
            let consulta = await fetch("../api/v1.0/parcela?usuario=" + usuario);
            console.log("consulta: "+consulta);
            parcelas = await consulta.json();

            console.log("parcelas: "+parcelas);

            // crearSelector();

            crearMapa();

            for (let i = 0; i < parcelas.length; i++) {

                await crearPoligono(parcelas[i]);
            }
            ajustarMapa();
        }
        async function obtenerSondasParcela(parcela) {
            // Estas son las consultas a la base de datos
            let consulta = await fetch("../api/v1.0/sonda")
            let sondas = await consulta.json();
            let consulta2 = await fetch("../api/v1.0/sondasParcelas")
            let sondasParcelas = await consulta2.json();


            for(let i=0; i<sondas.length; i++){
                // Las variables y los ifs para el código de colores
                let averiado = 0;
                let apagado = 0;
                if (parcela.parcela == sondasParcelas[i].IDparcela){
                    if (sondas[i].encendido == "false"){
                        parcela.marker = new google.maps.Marker({
                            position: {lat: parseFloat(sondas[i].CoorX), lng: parseFloat(sondas[i].CoorY)},
                            label: "",
                            icon: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png",
                            animation: google.maps.Animation.DROP,
                            map: map,
                        })
                        apagado = 1;
                    } else if(sondas[i].funcional == "false") {
                        parcela.marker = new google.maps.Marker({
                            position: {lat: parseFloat(sondas[i].CoorX), lng: parseFloat(sondas[i].CoorY)},
                            label: "",
                            icon: "http://maps.google.com/mapfiles/ms/icons/yellow-dot.png",
                            animation: google.maps.Animation.DROP,
                            map: map,
                        })
                        averiado = 1;
                    } else {
                        parcela.marker = new google.maps.Marker({
                            position: {lat: parseFloat(sondas[i].CoorX), lng: parseFloat(sondas[i].CoorY)},
                            label: "",
                            icon: "http://maps.google.com/mapfiles/ms/icons/green-dot.png",
                            animation: google.maps.Animation.DROP,
                            map: map,
                        })
                    }

                    //
                    let noGrafica = 0;
                    if (apagado == 1){
                        noGrafica = 1;
                    } else if (averiado == 1){
                        noGrafica = 2;
                    }
                    console.log("noGrafica: "+noGrafica+ " en la sonda: "+ (i+1))

                    parcela.marker.addListener('click', function () {
                        // Aqui hacemos la llamada a las gráficas
                        openDiv(i+1, noGrafica);
                        console.log("llamando a gráfica de la sonda: "+ (i+1))
                    });
                }

            }



        }

        // function crearSelector() {
        //     let selector = document.getElementById("selector-parcelas");
        //     let optVacia = document.createElement("option");
        //     optVacia.textContent = "Selecciona una parcela ...";
        //     optVacia.value = "";
        //     selector.append(optVacia);
        //     parcelas.forEach(function (parcela, index) {
        //         let opt = document.createElement("option");
        //         opt.textContent = parcela.nombre_parcela;
        //         opt.value = index;
        //         selector.append(opt);
        //     });
        //     selector.addEventListener('change', function () {
        //         mostrarOcultarParcela(parseInt(selector.value));
        //         console.log(selector.value)
        //     })
        //     /*parcelas.forEach(function (parcela, index) {
        //         let label = document.createElement('label');
        //         label.textContent = parcela.nombre_parcela;
        //         let check = document.createElement('input');
        //         check.type = 'checkbox';
        //         check.addEventListener('change', function () {
        //             mostrarOcultarParcela(index, check.checked);
        //         })
        //         label.prepend(check);
        //         selector.append(label);
        //     })*/
        // }

        async function crearPoligono(parcela) {
            let id = parcela.parcela || parcela.id;
            let consulta = await fetch("../api/v1.0/parcela/" + id + "/vertices");
            let vertices = await consulta.json();
            parcela.polygon = new google.maps.Polygon({
                paths: vertices,
                strokeColor: parcela.color,
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: parcela.color,
                fillOpacity: 0.35,
                map: map
            });
            parcela.marker = new google.maps.Marker({
                position: vertices[0],
                label: "",
                animation: google.maps.Animation.DROP,
                map: map,
            })
            parcela.polygon.addListener('click', function () {
                ocultarOtrasParcelas(parseInt(parcelas.indexOf(parcela)));
                console.log()

            });
            parcela.marker.addListener('click', function () {
                ocultarOtrasParcelas(parseInt(parcelas.indexOf(parcela)));
                console.log()

            });
        }



        async function mostrarOcultarParcela(index, mostrar) {
            for (let i = 0; i < parcelas.length; i++) {
                let parcela = parcelas[i];
                if (i === index) {
                    if (parcela.polygon) {
                        parcela.polygon.setMap(map);
                    } else {
                        await crearPoligono(parcela);
                    }
                } else {
                    if (parcela.polygon) parcela.polygon.setMap(null);
                }
            }
            /*if (mostrar) {
                if (parcela.polygon) {
                    parcela.polygon.setMap(map);
                } else {
                    await crearPoligono(parcela);
                }
            } else {
                if (parcela.polygon) parcela.polygon.setMap(null);
            }*/
            ajustarMapa();
        }
        async function ocultarOtrasParcelas(index) {
            for (let i = 0; i < parcelas.length; i++) {
                let parcela = parcelas[i];
                if (i === index) {
                    if (parcela.polygon) {
                        parcela.polygon.setMap(map);
                        parcela.marker.setMap(null);
                        await obtenerSondasParcela(parcelas[i])

                    } else {
                        // De momento esto no hace nada
                        await crearPoligono(parcela);

                    }
                } else {
                    if (parcela.polygon){
                        parcela.polygon.setMap(null);
                        parcela.marker.setMap(null);

                    }
                }
            }
            ajustarMapa();
        }
        // async function crearSonda(parcela) {
        //     let id = parcela.parcela || parcela.id;
        //     let consulta = await fetch("parcela/" + id + "/vertices");
        //     let vertices = await consulta.json();
        //     console.log(vertices)
        //     parcela.marker1 = new google.maps.Marker({
        //         // position: {lat:38.9981629,  lng:-0.1720151},
        //         position: vertices[0],
        //         label: "",
        //         animation: google.maps.Animation.DROP,
        //         map: map,
        //     })
        //     parcela.marker2 = new google.maps.Marker({
        //         // position: {lat:38.9981629,  lng:-0.1720151},
        //         position: vertices[2],
        //         label: "",
        //         animation: google.maps.Animation.DROP,
        //         map: map,
        //     })
        //     parcela.marker3 = new google.maps.Marker({
        //         // position: {lat:38.9981629,  lng:-0.1720151},
        //         position: vertices[3],
        //         label: "",
        //         animation: google.maps.Animation.DROP,
        //         map: map,
        //     })
        //     parcela.marker1.addListener('click', function () {
        //         // Aqui hacemos la llamada a las gráficas
        //
        //
        //              openDiv(1);
        //
        //     });
        //     parcela.marker2.addListener('click', function () {
        //         // Aqui hacemos la llamada a las gráficas
        //
        //              openDiv(2);
        //
        //
        //     });
        //     parcela.marker3.addListener('click', function () {
        //         // Aqui hacemos la llamada a las gráficas
        //
        //              openDiv(3);
        //
        //
        //     });
        // }

        function ajustarMapa() {
            let bounds = new google.maps.LatLngBounds();
            parcelas.forEach(function (parcela) {
                console.log(parcela.polygon);
                if (parcela.polygon && parcela.polygon.getMap()) {
                    parcela.polygon.getPath().getArray().forEach(function (v) {
                        bounds.extend(v);
                    })
                }
            })
            if (!bounds.isEmpty()) map.fitBounds(bounds);
        }

    </script>

    <!-- Carga datos Gráficos -->
    <script>
        let apagarSonda

        async function datosGraficos(parcela){

            let parcelas = parcela;
            let sonda = parcela;
            // Esto resetea la gráfica antes de crear la gráfica, por si hay una gráfica anterior
            $('#chart').remove(); // Este es el elemento canvas, lo borramos
            $('#encenderSonda').remove(); // Este es el boton de encender sondas, lo borramos
            $('#redactarInforme').remove(); // Este es el boton de redactar informe, lo borramos
            $('#apagarLaSonda').remove(); // Este es el boton de encender sondas, lo borramos

            // Agregamos un elemento igual al anterior, efectivamente reseteando el canvas
            $('#apagarSonda').remove(); // Este es el boton de encender sondas, lo borramos
            $('#chart-container').append('<button class="botonGraficas" id="apagarLaSonda">Apagar sonda</button>');
            $('#chart-container').append('<canvas id="chart"></canvas>');
            apagarSonda = document.getElementById("apagarLaSonda")
            apagarSonda.addEventListener("click",async function (){
                console.log("parcela !!!: "+parcela)
                await fetch("../api/v1.0/sonda?sonda="+parcela,{
                    method: "PUT"
                });
                $('#apagarLaSonda').remove(); // Este es el boton de encender sondas, lo borramos
                initMap()
                closeDiv()
            })

            $.ajax({

                url: "../api/v1.0/modelos/datosGraficos.php",
                dataType: "json",
                method:"post",
                data:{parcela:parcelas},

                success: function(datos) {




                    let datosG = {
                        labels: ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'],
                        datasets: [
                            {
                                label: 'humedad',
                                data: [datos.hum[0], datos.hum[1], datos.hum[2], datos.hum[3], datos.hum[4],datos.hum[5],datos.hum[6]],
                                fill: true,
                                backgroundColor: 'rgba(91,192,235,0.5)',
                                borderColor: 'rgb(91,192,235)',
                                //borderDash: [10,4,5,4],
                                tension: 0.2,
                                pointStyle: 'circle',
                                pointRadius: 5,
                            },
                            {
                                label: 'salinidad',
                                data: [datos.salin[0], datos.salin[1], datos.salin[2], datos.salin[3], datos.salin[4],datos.salin[5],datos.salin[6]],
                                fill: true,
                                backgroundColor: 'rgba(253,231,76,0.5)',
                                borderColor: 'rgb(253,231,76)',
                                //borderDash: [10,4,5,4],
                                tension: 0.2,
                                pointStyle: 'circle',
                                pointRadius: 5,
                            },
                            {
                                label: 'Tª',
                                data: [datos.temp[0], datos.temp[1], datos.temp[2], datos.temp[3], datos.temp[4],datos.temp[5],datos.temp[6]],
                                fill: true,
                                backgroundColor: 'rgba(155,197,69,0.5)',
                                borderColor: 'rgb(155,197,69)',
                                //borderDash: [10,4,5,4],
                                tension: 0.2,
                                pointStyle: 'circle',
                                pointRadius: 5,
                            },
                            {
                                label: 'iluminación',
                                data: [datos.lumin[0], datos.lumin[1], datos.lumin[2], datos.lumin[3], datos.lumin[4],datos.lumin[5],datos.lumin[6]],
                                fill: true,
                                backgroundColor: 'rgba(229,87,52,0.5)',
                                borderColor: 'rgb(229,87,52     )',
                                //borderDash: [10,4,5,4],
                                tension: 0.2,
                                pointStyle: 'circle',
                                pointRadius: 5,
                            }
                        ]
                    };

                    let opciones = {
                        responsive: true,
                        maintainAspectRatio: false,


                        plugins: {
                            legend: {
                                position: 'bottom',
                                align: 'center'
                            },
                            title: {
                                display: true,
                                text: 'Valores'
                            },
                            tooltip: {
                                backgroundColor: '#fff',
                                titleColor: '#000',
                                titleAlign: 'center',
                                bodyColor: '#333',
                                borderColor: '#666',
                                borderWidth: 1,
                            }
                        },

                    };

                    let ctx = document.getElementById('chart');

                    let miGrafica = new Chart(ctx, {
                        type: 'line',
                        data: datosG,
                        options: opciones
                    });
                }

            });

        }

    </script>
    <!--  Aquí hay un callback; hay que poner el nombre de la funcion al final, en este caso, initMap-->

    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>
</section>

<section class="cajacolores">

    <div>
        <img src="http://maps.google.com/mapfiles/ms/icons/blue-dot.png">
        <label>Sonda apagada</label>
    </div>
    <div>
        <img src="http://maps.google.com/mapfiles/ms/icons/yellow-dot.png">
        <label>Sonda averiada</label>
    </div>
    <div>
        <img src="http://maps.google.com/mapfiles/ms/icons/green-dot.png">
        <label>Sonda encendida</label>
    </div>
    <div>
        <svg onclick="mostrarInfo()" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </svg>
    </div>
    <div id="informacion">
        Las sondas que estén averiadas y apagadas se mostrarán como apagadas. Esto puede ocurrir cuando una sonda que estaba apagada se avería. Una sonda averiada es una la cual no responde a las llamadas del servidor, y una apagada es una la cual el servidor no hace intentos de contactar (porque ha sido apagada por el usuario voluntariamente). Apagar una sonda hace que únicamente esté activo el sistema antialarma de la misma, y no se encenderá hasta que este se active o sea activada desde esta página
    </div>
</section>

<script>
function mostrarInfo(){
    var info = document.getElementById("informacion");
    if (info.style.display === "block") {
        info.style.display = "none";
    } else {
        info.style.display = "block";
    }
}

</script>

<!-- Mostrar - Ocultar  Gráfico -->
<script>
    let encenderSonda

    function openDiv(parcela, noGrafica){
        let parcelas = parcela;
        if (noGrafica == 0){
            let div = document.querySelector('#mostrarGrafico');
            $('#mostrarGrafico').fadeIn(750);

            document.body.scrollTop = 1000; // For Safari
            document.documentElement.scrollTop = 1000; // For Chrome, Firefox, IE and Opera

            datosGraficos(parcelas);
            // Aquí abajo salen cosas si las sondas están apagadas o averiadas
        } else {
            let div = document.querySelector('#mostrarGrafico');
            $('#mostrarGrafico').fadeIn(750);

            document.body.scrollTop = 1000; // For Safari
            document.documentElement.scrollTop = 1000; // For Chrome, Firefox, IE and Opera

            if (noGrafica == 1){
                // Esto resetea la gráfica antes de crear la gráfica, por si hay una gráfica anterior
                $('#chart').remove(); // Este es el elemento canvas, lo borramos
                $('#encenderSonda').remove(); // Este es el boton de encender sondas, lo borramos
                $('#redactarInforme').remove(); // Este es el boton de redactar informe, lo borramos
                $('#apagarLaSonda').remove(); // Este es el boton de encender sondas, lo borramos


                // Agregamos un elemento igual al anterior, efectivamente reseteando el canvas
                $('#chart-container').append('<div class="textoGraficasFallo" id="chart">Tu sonda está apagada</div>');
                $('#chart-container').append('<button class="botonGraficas" id="encenderSonda">Encender sonda</button>');
                encenderSonda = document.getElementById("encenderSonda")
                encenderSonda.addEventListener("click", async function(){
                    console.log("encender !!!: "+parcela)
                    await fetch("../api/v1.0/encenderSonda?sonda="+parcela,{
                        method: "PUT"
                    });
                    $('#encenderSonda').remove(); // Este es el boton de encender sondas, lo borramos
                    $('#apagarSonda').remove(); // Este es el boton de encender sondas, lo borramos
                    $('#chart').remove(); // Este es el elemento canvas, lo borramos
                    initMap()
                    closeDiv()
                })


                // apagarSonda = document.getElementById("apagarLaSonda")
                // apagarSonda.addEventListener("click",async function (){
                //     console.log("encender !!!: "+parcela)
                //     await fetch("sonda?sonda="+parcela,{
                //         method: "PUT"
                //     });
                //     $('#apagarSonda').remove(); // Este es el boton de encender sondas, lo borramos
                //     await ocultarOtrasParcelas(parcela-1);
                // })

            }
            if (noGrafica == 2){
                // Esto resetea la gráfica antes de crear la gráfica, por si hay una gráfica anterior
                $('#chart').remove(); // Este es el elemento canvas, lo borramos
                $('#redactarInforme').remove(); // Este es el boton de redactar informe, lo borramos
                $('#encenderSonda').remove(); // Este es el boton de encender sondas, lo borramos
                $('#apagarLaSonda').remove(); // Este es el boton de encender sondas, lo borramos


                // Agregamos un elemento igual al anterior, efectivamente reseteando el canvas
                $('#chart-container').append('<div class="textoGraficasFallo" id="chart">¡Esta sonda está averiada! </div>');
                $('#chart-container').append('<a href="contactar.php"><button class="botonGraficas" id="redactarInforme">Redactar un informe</button></a>');

            }
        }

    }

    function closeDiv(){
        $('#chart').remove(); // Este es el elemento canvas, lo borramos
        $('#encenderSonda').remove(); // Este es el boton de encender sondas, lo borramos
        $('#redactarInforme').remove(); // Este es el boton de redactar informe, lo borramos
        $('#apagarSonda').remove(); // Este es el boton de encender sondas, lo borramos
        let div = document.querySelector('#mostrarGrafico');
        document.body.scrollTop  = 0; // For Safari
        document.documentElement.scrollTop  = 0; // For Chrome, Firefox, IE and Opera
        $('#mostrarGrafico').fadeOut(750);
        let ctx = document.getElementById('chart');

    }
    function encenderLaSonda(sonda){
        //quiero que esta función, cuando se ejecute, cambie el valor
        console.log("Encender sonda: "+sonda)
    }
    function apagarLaSonda(sonda){
        console.log("Apagar sonda: "+sonda)
    }



</script>


<br>
<!-- Gráfico -->

<section id="mostrarGrafico" style="display: none">

    <div id="close" class="text-center"><a style=" width:auto; background-color: #7ead62;color: white;" type="button" class="btn btn-cerrarGrafica"onclick="closeDiv();" >Cerrar Gráfica</a></div> <br>

    <div id="chart-container" class="chart-container">

    </div>



</section>


<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">    </script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.2/js/umd/util.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php require 'footer.php'; ?>

</body>
</html>