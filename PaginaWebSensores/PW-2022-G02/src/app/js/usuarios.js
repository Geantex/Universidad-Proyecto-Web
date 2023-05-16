let formContainer = document.getElementById("form-usuario");
let form = formContainer.querySelector("form");


form.addEventListener("submit", enviarFormulario)
let usuarios;

// region ---Formulario---
function openForm(){
    formContainer.style.display = "block";
    form.reset();
    document.getElementById("usuario").disabled=false;
    document.getElementById("password").hidden=false;
    document.getElementById("labelPass").hidden=false;
    // "block" es la propiedad por defecto de visibilidad para los divs
}

function closeForm(){
    formContainer.style.display = "none";
    form.reset();
    // .reset() pone el formulario en blanco
    document.getElementById("id").value = "";

}
// endregion



async function enviarFormulario(event) {
    event.preventDefault();
    let data = new FormData(form)
    console.log(data)
    console.log("ID:" + data.get("id"))
    if(data.get("id") === ""){
        await crearUsuario(data);
    } else {
        await updateUsuario(data);
    }
    closeForm();
    init()
}

function editarUsuario(item) {
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
}



async function borrarUsuario(item) {
    if(confirm("¿Seguro que quieres eliminar el usuario " + item.apellidos + ", " + item.nombre+ "?")){
        await deleteUsuario(item)
        init()
    }
}

function crearItemUsuario(item) {
    let div = document.createElement("div")
    div.textContent = item.apellidos + ", " + item.nombre;
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