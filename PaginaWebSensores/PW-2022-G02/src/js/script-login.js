$('#formLogin').submit(function(e){

    e.preventDefault();
    var usuario = $.trim($("#usuario").val());
    var password =$.trim($("#password").val());

    if(usuario.length == "" || password == ""){
        Swal.fire({
            type:'warning',
            title:'Debe ingresar un usuario y/o contraseña',
        });
        return false;
    }else{
        $.ajax({
            url:"../api/v1.0/acceso.php",
            type:"POST",
            data: {usuario:usuario, password:password},
            success:function(data){
                if(data == "null"){
                    Swal.fire({
                        type:'error',
                        title:'Usuario y/o contraseña incorrecta',
                    });
                }else{

                    data = data.replace(/["']/g, "");

                    window.location.href = data;


                }
            }
        });
    }
});