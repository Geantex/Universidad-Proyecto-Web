var nombre= document.getElementById('nombre');
var correo= document.getElementById('correo');
var telefono= document.getElementById('telefono');
var mensajetexto= document.getElementById('mensajetexto');
var error= document.getElementById('error');
var correcto= document.getElementById('correcto');

var form= document.getElementById('formulario');
form.addEventListener('submit',function (evt){
    evt.preventDefault();


    var mensajeError =[];
    if ( nombre.value===null || nombre.value=== '' ||
        correo.value===null || correo.value=== '' ||
        mensajetexto.value===null || mensajetexto.value=== '')
    {
        var mensajeCorrecto =[]; mensajeError.push('Rellene todos los campos');
    } else{
        var mensajeCorrecto=[];
        mensajeCorrecto.push('Gracias por contactar con GTI. <br>Nos pondremos en contacto contigo lo antes posible.<br> ¡Saludos!');
        formulario.reset();
    }


    error.innerHTML=mensajeError.join('');
    correcto.innerHTML=mensajeCorrecto.join('');



});
