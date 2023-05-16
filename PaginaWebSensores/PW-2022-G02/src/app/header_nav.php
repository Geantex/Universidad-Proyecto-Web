<?php

if (isset($_SESSION["usuario"]))

{
    $mostrarMenuUsuario = "block";
    $mostrarMenuCerrar = "inline";


}

else {   $mostrarMenuUsuario = "none";
    $mostrarMenuCerrar = "none";

}


if ( isset($_SESSION["administrador"]))
{   $mostrarMenuAdmin = "block";
    $mostrarMenuCerrar = "inline";


}


else{  $mostrarMenuAdmin = "none";
    $mostrarMenuCerrar = "none";

}


if (isset($_SESSION["administrador"]) || isset($_SESSION["usuario"] )  ) {

    $mostrarMenuLogin = "none";
    $mostrarMenuCerrar = "inline";

}

else{ $mostrarMenuLogin = "inline";}

?>

<header>


    <div style="width:100% ;">

        <a href="index.php"><img style="height: 60px;" src="app/img/logoverde.png" class="logoGti" alt="El logo de la empresa, las letras G T I, con la T y la I de color verde">
        </a>

        <a href="javascript:void(0);" onclick="myFunction()"><img class="IconoHeader float-right" src="app/img/lineas.svg"></a>

        <a style = "display: <?php echo $mostrarMenuLogin; ?>;" href="app/login.html" id="headerUsuario"><button class="botonHeader float-right" >Iniciar sesión</button></a>
        <a  style = "display: <?php echo $mostrarMenuCerrar; ?>;" href="api/includes/logout.php" id="headerUsuario"><button class="botonHeader float-right" >Cerrar sesión</button></a>


    </div>



</header>

<!--Este es el menú desplegable, cuando hacemos click en el icono del header-->

<div class="topnav">

    <div id="myLinks">

        <!--TODO: Hay que añadir páginas para cada una de estos links, aunque sean de demostración que son links-->

        <a class="otrasPaginas" href="app/productos.php">Nuestros productos</a>
        <a id="contactaLink" class="otrasPaginas" href="app/contactar.php">Contacta</a>
        <a id="quienesSomosLink" class="otrasPaginas" href="app/nosotros.php">¿Quiénes somos?</a>


    </div>

</div>

</div>



<!--Código de JavaScript para desplegar el menú desplegable al hacer click en el icono de las 3 líneas horizontales en el header-->

<script>
    function myFunction() {
        var x = document.getElementById("myLinks");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }
</script>
