var nombre= document.getElementById('nombre');
var correo= document.getElementById('correo');
var telefono= document.getElementById('telefono');
var mensajetexto= document.getElementById('mensajetexto');
var error= document.getElementById('error');
var correcto= document.getElementById('correcto');

var form= document.getElementById('formulario');
let contactos

function crearItemUsuario(item) {
    let div = document.createElement("div")
    div.textContent = item.nombre + ", " + item.apellidos;
    let editBtn = document.createElement("button");
    editBtn.textContent = "Editar";
    editBtn.onclick = function () {
        editarUsuario(item)
    }
    let delBtn = document.createElement("button");
    delBtn.textContent = "Borrar";
    delBtn.onclick = function () {
        borrarUsuario(item)
    }
    div.prepend(editBtn,delBtn)
    return div;
}


form.addEventListener('submit',function (evt){
    evt.preventDefault();
    let data = new FormData(form);

    var mensajeError =[];
    if ( nombre.value===null || nombre.value=== '' ||
        correo.value===null || correo.value=== '' ||
        mensajetexto.value===null || mensajetexto.value=== '')
    {
        var mensajeCorrecto =[]; mensajeError.push('Rellene todos los campos');
    } else{
        var mensajeCorrecto=[];
        mensajeCorrecto.push('Gracias por contactar con GTI. <br>Nos pondremos en contacto contigo lo antes posible.<br> ¡Saludos!');
        crearContactar(data);
        formulario.reset();
    }


    error.innerHTML=mensajeError.join('');
    correcto.innerHTML=mensajeCorrecto.join('');



});

/*function init(){
    contactos = getContacto();
    crearListadoContacto();
}

function crearListadoContacto() {
    let container = document.getElementById("contenedorContactar");
    container.innerHTML = "";
    contactos.forEach(function (item) {
        container.append(crearItemUsuario(item))
    })
}*/
