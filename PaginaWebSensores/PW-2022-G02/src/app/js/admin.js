let formContainer = document.getElementById("form-usuario");
let containerParcelas = document.getElementById("contenedor-parcelas");
let formParcelas = document.getElementById("form-parcela");
let parcelaForm = document.getElementById("form-parcela-childForm");

let form = formContainer.querySelector("#form-child-usuario");
let formParcelasQuery = document.querySelector("#form-parcela-childForm");

form.addEventListener("submit", enviarFormulario);
formParcelasQuery.addEventListener("submit", enviarFormularioParcelas);
//formParcelasQuery.addEventListener("submit", crearVertice);
let usuarios;
let parcelas;
let parcelasUsuario;
let vertices;
var numeroVertice = 1;
var numeroName = 1;

let busqueda = document.getElementById('buscar');
busqueda.addEventListener('input', buscarUsuario);

async function buscarUsuario(){
    console.log(busqueda.value);
    usuarios = await searchUsuario(busqueda.value);
    crearListadoUsuarios();
}
// region ---Formulario---
function openForm(){
    closeForm();
    formContainer.style.display = "block";
    form.reset();
    document.getElementById("usuario").disabled=false;
    document.getElementById("password").hidden=false;
    document.getElementById("labelPass").hidden=false;
    document.getElementById("verParcelasButton").hidden = true;
    // "block" es la propiedad por defecto de visibilidad para los divs
}

async function openParcelasUser(){
    let peticion = await fetch("../api/v1.0/parcelasAdmin/?propietario=" + document.getElementById("id").value )
    parcelasUsuario = await peticion.json();
    crearListadoParcelas()
    containerParcelas.style.display = "block";

}

function closeForm(){
    const aEliminar = document.querySelectorAll('.vertices');

    aEliminar.forEach(div => {
        div.remove();
    });
    formContainer.style.display = "none";
    containerParcelas.style.display = "none";
    containerParcelas.innerHTML = "";
    formParcelas.hidden = true;
    form.reset();
    parcelaForm.reset();
    // .reset() pone el formulario en blanco
    document.getElementById("id").value = "";

}

function closeFormParcelas(){
    formParcelas.hidden = true;
    parcelaForm.reset();
}
// endregion



async function enviarFormulario(event) {
    event.preventDefault();
    let data = new FormData(form)

    if(data.get("id") === ""){
        await crearUsuario(data);
    } else {
        await updateUsuario(data);
    }
    closeForm();
    init()
}

async function enviarFormularioParcelas(event) {
    event.preventDefault();
    let data = new FormData(formParcelasQuery);
    for (const key of data.keys()) {
        console.log(key);
    }
    for (const value of data.values()) {
        console.log(value);
    }
    /*console.log(data.get("IDparcela"))
    console.log(document.getElementById("IDparcela").value)*/

    if(data.get("IDparcela") === ""){
        await crearParcela(data);
        await closeFormParcelas();
        await openParcelasUser();
    } else {
        await updateParcela(data);
        await closeFormParcelas();
        await openParcelasUser();
        await crearVertice()
    }
}


function editarUsuario(item) {
    closeForm();
    openForm();
    document.getElementById("id").value = item.ID;
    document.getElementById("IDDatos").value = item.IDDatos;
    document.getElementById("usuario").value = item.usuario;
    document.getElementById("nombre").value = item.nombre;
    document.getElementById("apellidos").value = item.apellidos;
    document.getElementById("email").value = item.email;
    document.getElementById("telefono").value = item.telefono;
    document.getElementById("rolSelect").value= item.rol;
    document.getElementById("password").value = item.password;
    document.getElementById("usuario").disabled=true;
    document.getElementById("password").hidden=true;
    document.getElementById("labelPass").hidden=true;
    document.getElementById("verParcelasButton").hidden = false;
    document.getElementById("IDusuario_parcela").value = item.ID;
}



async function borrarUsuario(item) {
    if(confirm("¿Seguro que quieres eliminar el usuario " + item.apellidos + ", " + item.nombre+ "?")){
        await deleteUsuario(item)
        init()
    }
}

function crearItemUsuario(item) {
    let div = document.createElement("div")
    div.textContent = "    "+item.nombre + ", " + item.apellidos;
    let editBtn = document.createElement("button");
    editBtn.classList.add("btn","btn-outline-secondary")

    editBtn.textContent = "Editar";
    editBtn.onclick = function () {
        editarUsuario(item)
    }
    let delBtn = document.createElement("button");
    delBtn.textContent = "Borrar";
    delBtn.classList.add("btn","btn-outline-danger");
    delBtn.onclick = function () {
        borrarUsuario(item)
    }
    div.prepend(editBtn,delBtn)
    return div;
}

function crearListadoUsuarios() {
    let container = document.getElementById("listado-usuarios");
    container.innerHTML = "";
    usuarios.forEach(function (item) {
        container.append(crearItemUsuario(item))
    })
}

async function init() {
    usuarios = await getUsuarios();
    crearListadoUsuarios();

}

init()

//region parcelas
function nuevaParcela(){
    document.getElementById("nuevoVerticeBtn").hidden = true;
    console.log("nuevaParcela");
    numeroVertice = 1;
    formParcelasQuery.reset();
    const aEliminar = document.querySelectorAll('.vertices');

    aEliminar.forEach(div => {
        div.remove();
    });
    const aEliminarLabels = document.querySelectorAll('.labelVertices');

    aEliminarLabels.forEach(div => {
        div.remove();
    });



    const aEliminarDIV = document.querySelectorAll('.InputverticesDIV');

    aEliminarDIV.forEach(div => {
        div.remove();
    });
    document.getElementById("form-parcela").hidden = false;
}

async function editarParcela(item) {
    numeroVertice = 1;
    document.getElementById("nuevoVerticeBtn").hidden = false;
    const eliminarVerices = document.querySelectorAll('.vertices');

    eliminarVerices.forEach(div => {
        div.remove();
    });
    const eliminarInputVerices = document.querySelectorAll('.InputverticesDIV');

    eliminarInputVerices.forEach(div => {
        div.remove();
    });
    const eliminarlabelVerices = document.querySelectorAll('.labelVertices');

    eliminarlabelVerices.forEach(div => {
        div.remove();
    });
    let container = document.getElementById("form-parcela-childForm")
    document.getElementById("IDparcela").value = item.parcela;
    let peticion = await fetch("../api/v1.0/vertices/?parcela=" + document.getElementById("IDparcela").value )
    vertices = await peticion.json();
    vertices.forEach(function (item) {
        container.insertBefore(crearItemVertice(item, numeroVertice),document.getElementById("IDparcela"))
    })
    document.getElementById("nameP").value = item.nombre_parcela;
    document.getElementById("color").value = item.color;
}
function crearInputVertice() {
    let container = document.createElement("div")
    let label = document.createElement("label")
    let lng = document.createElement("input")
    let lat = document.createElement("input")
    lat.setAttribute("name", "vertice")
    container.classList.add("InputverticesDIV", "input-group")
    lng.className = "form-control";
    lat.className = "form-control";
    lat.setAttribute('type', 'number');
    lng.setAttribute('type', 'number');
    lat.setAttribute("placeholder", "Latitud");
    lng.setAttribute("placeholder", "Longitud");
    label.textContent = "Vertice " + numeroVertice;
    label.className = "labelVertices";
    let name = "_" + numeroName
    lat.setAttribute("name", "lat"+name)
    lng.setAttribute("name", "lng"+name)

    document.getElementById("form-parcela-childForm").insertBefore(label,document.getElementById("IDparcela"))
    container.prepend(lng);
    container.prepend(lat);
    document.getElementById("form-parcela-childForm").insertBefore(container,document.getElementById("IDparcela"))
    numeroVertice += 1;
    numeroName += 1;
}

/*function crearInputVertice() {
    let container = document.getElementById("form-parcela-childForm");
    let label = document.createElement("label")
    let lng = document.createElement("input")
    let lat = document.createElement("input")
    lng.className = "verticesInput";
    lat.className = "verticesInput";
    label.className = "labelVertices";
    lng.setAttribute('type', 'number');
    lat.setAttribute('type', 'number');
    label.textContent = "Vertice " + numeroVertice;
    container.insertBefore(crearItemVertice(item, numeroVertice),document.getElementById("IDparcela"))
    container.append(label);
    container.append(lng);
    container.append(lat);
    numeroVertice += 1;

}*/

function crearItemVertice(item) {
    let div = document.createElement("div")
    let label = document.createElement("label")
    let input = document.createElement("input")
    div.className = "vertices";
    input.setAttribute('type', 'text');
    input.value = item.lat + ", " + item.lng;
    label.textContent = "Vertice " + numeroVertice;
    input.disabled = true;
    div.append(label);
    div.append(input);
    numeroVertice += 1;
    return div;
}


async function borrarParcela(item) {
    if(confirm("¿Seguro que quieres eliminar la parcela " + item.nombre_parcela + "?")){
        await deleteParcela(item)
        await openParcelasUser();
    }
}

function actualizarParcela(){

}

function crearItemParcela(item) {
    let div = document.createElement("div")
    div.textContent = item.nombre_parcela;
    let editBtn = document.createElement("button");
    editBtn.classList.add("btn","btn-outline-secondary")
    editBtn.textContent = "Editar";
    editBtn.onclick = function () {
        numeroName = 1;
        document.getElementById("form-parcela").hidden = false
        editarParcela(item)
    }
    let delBtn = document.createElement("button");
    delBtn.classList.add("btn", "btn-outline-danger")
    delBtn.textContent = "Borrar";
    delBtn.onclick = function () {
        borrarParcela(item)
    }
    div.prepend(editBtn,delBtn)
    return div;
}

function crearListadoParcelas() {
    let container = document.getElementById("contenedor-parcelas");
    container.innerHTML = "";
    parcelasUsuario.forEach(function (item) {
        container.append(crearItemParcela(item))
    })
    let crearParcelaBtn = document.createElement("button");
    crearParcelaBtn.textContent = "Nueva Parcela";
    crearParcelaBtn.classList.add("btn", "btn-outline-secondary")
    crearParcelaBtn.addEventListener("click", nuevaParcela)
    container.append(crearParcelaBtn)
}

//endregion