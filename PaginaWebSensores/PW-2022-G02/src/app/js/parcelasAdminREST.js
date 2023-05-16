
async function getParcelas(){
    let peticion = await fetch("parcelasAdmin")
    // al ser con GET solamente hay que pasarle la URL
    return await peticion.json();
}

async function updateParcela(data) {
    let peticion = await fetch("parcelasAdmin", {
        method: "put",
        body: formDataToJSON(data),
        // con put hay que formatear los datos a JSON
    })
    // al ser con GET solamente hay que pasarle la URL
    return await peticion.json();
}

async function crearParcela(data) {
    // console.log("crearParcela");
    let peticion = await fetch("parcelasAdmin", {
        method: "post",
        body: data,
    })
    // al ser con GET solamente hay que pasarle la URL
}

async function deleteParcela(item) {
    let peticion = await fetch("parcelasAdmin/" + item.parcela, {
        method: "delete",

    })
    // al ser con GET solamente hay que pasarle la URL
}

function formDataToJSON(formData){
    return JSON.stringify(Object.fromEntries(formData.entries()))
}