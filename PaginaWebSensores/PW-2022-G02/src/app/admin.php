<?php
session_start();

if (!isset($_SESSION["administrador"]))
    echo"<script language='javascript'>window.location='login.html'</script>;";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--<link href="../../app/css/styles.css" rel="stylesheet" type="text/css">-->
    <style>
        /* IMPORT FONT */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap%27');
        h1, h2, h3, h4, h5, h6, p {
            font-family: "Inter"}
        /* region ESTILOS HEADER */

        .separador{
            margin-bottom: 200px;
        }

        .text-center {
            text-align: center !important;
        }

        header {
            display: grid;
            grid-template-columns: 50% 50%;
            grid-template-rows: minmax(0, 4rem);
            position: sticky;
            top: 0;
            background-color: #f1f1f1;
            z-index: 98;
            border-bottom: 1px solid gray;
        }

        .contenedorMenu {
            margin-right: 1rem;
            padding: 0.2rem;
            display: flex;
            flex-direction: row-reverse;
            /*min-width: 220px;*/
        }

        #headerUsuario{
            margin: 8px;
        }

        .IconoHeader {
            margin-top: 11px;
            height: 80%;
            margin-left: 0;
        }

        .logoGti {
            padding: 0;
            height: 100%;

        }
        .botonHeader{
            border: none;
            color: white;
            background-color: #558914 ;
            width: 8rem;
            height: 2.4rem;
            margin-top: 0.6rem;
            margin-right: 4px;
            font-size: 1.1rem;
            border-radius: 5px;

        }

        .botonHeader:hover{

            border-color: #124F09 ;
            color: white;
            background-color: #124F09 ;
        }

        .contenedorLogo {
            width: 12rem;
        }

        /* endregion */

        /* region ESTILOS NAV */

        /* Style the navigation menu */
        .topnav {
            overflow: hidden;
            background-color: #ddd;
            position: sticky;
            top: 60px; /*Esto es lo que hace que se quede sticky, junto a la propiedad sticky, por supuesto*/
            z-index: 50;
        }

        /* Hide the links inside the navigation menu (except for logo/home) */
        .topnav #myLinks {
            display: none;
        }

        /* Style navigation menu links */
        .topnav a {
            color: #558914;
            background-color: #F1F1F1 ;
            text-decoration: none !important;
            font-size: 18px;
            display: block;
            font-family: Inter;

            /*Con esto de abajo el texto de los links del menú de navegación se va a la derecha*/
            /*text-align: right;*/

        }
        #quienesSomosLink{
            border-top: 1px solid #558914;
            border-bottom: 1px solid #558914;
        }

        #contactaLink{
            border-top: 1px solid #558914;
        }

        #escuchaLink{
            border-top: 1px solid #558914;
        }

        /* Style the hamburger menu */
        .topnav a.icon {
            background-color: #ddd;
            display: block;
            position: absolute;
            right: 0;
            top: 0;
        }

        /* Add a grey background color on mouse-over */
        .topnav a:hover {
            background-color: #124F09;
            color: white;
        }

        /* Style the active link (or home/logo) */
        .active {
            background-color: #04AA6D;
            color: white;
        }

        .otrasPaginas {
            padding: 14px 16px;

        }

        .botonSolicitarPresupuesto {
            border-color: #558914 ;
            color: white;
            background-color: #558914;
        }

        .contenedorBotones {
            display: block;
            margin: 16px;
        }

        #aInicioDeSesionHeader {
            padding-left: 0;
        }

        #headerIniciar{
            padding: 14px 16px;
            font-size: 17px;
            display: block;
            font-family: Inter;
            border-radius: 5px;
            margin-top: 10px;
            margin-bottom: 20px;
            width: 370px;
        }

        #headerPresupuesto{
            padding: 14px 16px;
            font-size: 17px;
            display: block;
            font-family: Inter;
            border-radius: 5px;
            width: 370px;
        }
        #headerCerrarSesion{
            text-decoration: none;
        }

        /* endregion */

        /* region ESTILOS ADMIN */

        .btn{
            border: grey solid 1px;
        }
        .DELBtn:hover{
            background: #FFBAB1;
        }
        .editBtn:hover{
            background: #afc68c;
        }

        .pattern {
            z-index: -1;
            position: fixed;
            width: 100vw;
            height: 100vh;

            background-color: #ecf1e5;
            opacity: 0.3;
            background-image: radial-gradient(#558914 0.5px, #ecf1e5 0.5px);
            background-size: 10px 10px;
        }
        /*body{
            background-color: #e5e5f7;
            opacity: 0.3;
            background-image:  linear-gradient(30deg, #558914 12%, transparent 12.5%, transparent 87%, #558914 87.5%, #558914), linear-gradient(150deg, #558914 12%, transparent 12.5%, transparent 87%, #558914 87.5%, #558914), linear-gradient(30deg, #558914 12%, transparent 12.5%, transparent 87%, #558914 87.5%, #558914), linear-gradient(150deg, #558914 12%, transparent 12.5%, transparent 87%, #558914 87.5%, #558914), linear-gradient(60deg, #55891477 25%, transparent 25.5%, transparent 75%, #55891477 75%, #55891477), linear-gradient(60deg, #55891477 25%, transparent 25.5%, transparent 75%, #55891477 75%, #55891477);
            background-size: 24px 42px;
            background-position: 0 0, 0 0, 12px 21px, 12px 21px, 0 0, 12px 21px;
        }*/
        #contenedorFormularios{
            display: grid;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        #form-usuario{
            grid-column: 1 / 2;
            grid-row: 1 / 3;
        }

        #form-parcela{
            grid-column: 3;
            grid-row: 2;
            margin-left: 20px;
            box-shadow: 0px 3px 6px rgba(0,0,0,.5);
            padding: 1em;
            background-color: white;
        }
        #form-parcela label{
            grid-row: 1;
        }
        #contenedor-parcelas{
            height: auto;
            grid-column: 3;
            grid-row: 1;
            margin-left: 20px;
        }
        #form-usuario, #contenedor-parcelas{
            box-shadow: 0px 3px 6px rgba(0,0,0,.5);
            padding: 1em;
            display: none;
            background-color: white;
        }

        form {
            display: flex;
            width: 300px;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: space-evenly;
        }
        label {
            width: 100px;
        }
        .fijos{
            width: 50%;
        }
        .buttonParcelas {
            width: 46%;
            margin: 0 auto;
        }
        .vertices{
            display: flex;
            width: 100%;
            justify-content: space-between;
        }
        #usuariosLabel{
        /*    Hacer de esto el título */
            font-weight: bold;
            font-size: 42px;
            margin: 5px 20px;
        }
        #contenedor-parcelas.side div{
            min-width: 220px;
        }

        @media(max-width: 750px){
            #contenedorFormularios{
                bottom: 50px;
                display: flex;
                flex-direction: column;
            }
            #contenedorFormularios div{
                margin: 6px auto;
                min-width: 332px;
            }
            #form-parcela.side div{
                margin-left: 60px;
            }
            #form-parcela.side div label{
                width: 75px;
            }
            #form-parcela.side div input{
                margin: 0 auto ;
            }
        }
        #contenedor button{
            margin: 5px 5px 5px;
            border: 1px black solid;
        }

        /* endregion */
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
<div class='pattern'></div>
<div id="contenedor">
    <label id="usuariosLabel">USUARIOS</label>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <button class="btn btn-outline-secondary" type="button" onclick="openForm()" >Nuevo Usuario</button>
        </div>
        <input type="text" class="form-control" id="buscar" placeholder="Busca a un usuario..." aria-label="" aria-describedby="basic-addon1">
    </div>

<div id="listado-usuarios" class="">

</div>
</div>

<div id="listado-parcelas">

</div>

<div id="contenedorFormularios">

    <div id="form-usuario" class="side">
        <form id="form-child-usuario" onsubmit="">
            <label for="usuario">* Usuario:</label>
            <input type="text" name="usuario" id="usuario" required>
            <label for="password" id="labelPass">* Contraseña:</label>
            <input type="text" name="password" id="password">
            <label id="labelrol">Rol: </label>
            <select name="rol" id="rolSelect">
                <option selected>Selecciona el rol</option>
                <option value="admin">admin</option>
                <option value="normal">normal</option>
            </select>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre">
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
            <label for="telefono">Teléfono:</label>
            <input type="tel" name="telefono" id="telefono" pattern="{11}" placeholder="000 000 000" maxlength= 11 onkeydown="if(isNaN(event.key) && event.keyCode !== 8) { event.preventDefault(); return false;} if ((this.value.length === 3 && event.keyCode !== 8)|| (this.value.length === 7 && event.keyCode !== 8)){
            this.value = this.value + ' ';
        }">
            <input class="btn btn-outline-secondary" id="verParcelasButton" type="button" value="Ver Parcelas" onclick="openParcelasUser();">
            <input type="submit" class="btn btn-outline-success">
            <input type="button" class="btn btn-outline-danger" value="Cancelar" onclick="closeForm();">
            <input type="hidden" name="id" id="id">
            <input type="hidden" name="IDDatos" id="IDDatos">
        </form>
    </div>
    <div id="contenedor-parcelas" class="side">
    </div>
    <div id="form-parcela" class="side" hidden>
        <form id="form-parcela-childForm" onsubmit="" >
            <label for="color"> Color:</label>
            <input type="color" name="color" id="color" class ="fijos" required>
            <label for="nameP" >Nombre de Parcela:</label>
            <input type="text" id="nameP" name="nameP" class="fijos">
            <input type="text"  name="IDparcela" id="IDparcela" hidden>
            <input type="text"  name="IDusuario_parcela" id="IDusuario_parcela" hidden>
            <input type="submit" class ="buttonParcelas btn btn-outline-success" id= "guardarParcelaBtn" value="Guardar parcela">
            <input type="button" class ="buttonParcelas btn btn-outline-secondary" id= "nuevoVerticeBtn" value="Nuevo vertice" onclick="crearInputVertice() ">
        </form>
    </div>
</div>

<!--<label>Mensajes de contactar</label>
<div id="contenedorContactar"></div>-->
<script src="js/adminREST.js"></script>
<script src="js/admin.js"></script>
<script src="js/parcelasAdminREST.js"></script>
</body>

</html>