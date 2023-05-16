
async function getUsuarios(){
    let peticion = await fetch("../api/v1.0/usuarios")
    // al ser con GET solamente hay que pasarle la URL
    return await peticion.json();
}

async function updateUsuario(data) {
    let peticion = await fetch("../api/v1.0/usuarios", {
        method: "put",
        body: formDataToJSON(data),
        // con put hay que formatear los datos a JSON
    })
    // al ser con GET solamente hay que pasarle la URL
    return await peticion.json();
}

async function crearUsuario(data) {
    let peticion = await fetch("../api/v1.0/usuarios", {
        method: "post",
        body: data,
    })
    // al ser con GET solamente hay que pasarle la URL
}

async function deleteUsuario(item) {
    let peticion = await fetch("../api/v1.0/usuarios/" + item.ID+"/"+item.IDDatos, {
        method: "delete",

    })
    // al ser con GET solamente hay que pasarle la URL
}

async function searchUsuario(valor){
    let peticion = await fetch('../api/v1.0/usuarios?q=' + valor);
    return await peticion.json();
}

function formDataToJSON(formData){
    return JSON.stringify(Object.fromEntries(formData.entries()))
}

async function getVertices(){
    let peticion = await fetch("../api/v1.0/vertices")
    // al ser con GET solamente hay que pasarle la URL
    return await peticion.json();
}

async function updateVertice(data) {
    let peticion = await fetch("../api/v1.0/vertices", {
        method: "put",
        body: formDataToJSON(data),
        // con put hay que formatear los datos a JSON
    })
    // al ser con GET solamente hay que pasarle la URL
    return await peticion.json();
}

async function crearVertice() {
    // console.log("crearParcela");
    const idP = document.getElementById("IDparcela")

    const data = document.getElementsByClassName("form-control");
    for (let i = 0; i < data.length; i+=2) {
        let peticion = await fetch("../api/v1.0/vertices/"+data[i].value+"/"+data[i+1].value+"/"+idP.value, {
            method: "post",
            body: data,
        })
        console.log(data[i].value);
    }
    /*let peticion = await fetch("vertices/", {
        method: "post",
        body: data,
    })*/
    //
    // al ser con GET solamente hay que pasarle la URL
}

async function deleteVertice(item) {
    let peticion = await fetch("../api/v1.0/vertices/" + item.parcela, {
        method: "delete",

    })
    // al ser con GET solamente hay que pasarle la URL
}