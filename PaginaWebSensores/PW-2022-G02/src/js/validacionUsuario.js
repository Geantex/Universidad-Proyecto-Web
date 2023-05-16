async function validarUsuario(ok, error) {
    let consulta = await fetch('../api/v1.0/sesion');
    if (consulta.status !== 200) {
        if(error) error();
    } else {
        if(ok) ok();
    }
}
