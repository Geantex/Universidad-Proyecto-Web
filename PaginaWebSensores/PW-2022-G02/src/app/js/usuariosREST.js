
async function getUsuarios(){
    let peticion = await fetch("usuarios")
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

function formDataToJSON(formData){
    return JSON.stringify(Object.fromEntries(formData.entries()))
}