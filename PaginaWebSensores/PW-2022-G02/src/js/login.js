


function enviarLogin(event){
    event.preventDefault()
    let formData = new FormData(event.target)
    console.log("Se ha enviado el Login.")


    let nombreDeUsuario = document.getElementById("usuario").value
    let numeroDeContrseña = document.getElementById("contraseña").value

    let link = "api/v1.0/modelos/usuarios.php"
    console.log(link)
    let link2 = "usuario.php?usuario=" + nombreDeUsuario // Faltaba la extención php en usuario.php
    console.log(link2)

    fetch(link2, {
        method: 'post',
        body: formData
    }).then(function (respuesta){
        console.log(respuesta)
		console.log("a")
        return respuesta.json()
		
    }).then(function (datos){
        console.log("Hola")
        console.log()
        console.log("------")
        console.log(datos[0].rol);
        //location.href = "test/TestLogin.html"
        if(datos[0].rol == 'admin'){
            location.href = "pagina_admin/inicioadmin.html"
        } else if(datos[0].rol == 'normal') {
            location.href = "mapas.html?usuario=" + nombreDeUsuario
        }
    }).catch(function (){
		console.log("ERROR")
        //document.getElementById("Error").style.visibility = "visible"
    })
}

