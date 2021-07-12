let vista_config = document.getElementById("vista_configuracion")


document.getElementById('conf-usuario').addEventListener('click', ()=>{

    vista_config.innerHTML = ''
    $('#vista_configuracion').load('views/configuraciones/usuario.view.php');
})


document.getElementById('conf-estadistica').addEventListener('click', ()=>{
    
    vista_config.innerHTML = ''
    
})


document.getElementById('conf-diseño').addEventListener('click', ()=>{
    
    vista_config.innerHTML = ''

})


$(document).on('submit',"#enviar_editar_usuario" , function(e) {

    e.preventDefault();
    let nombre = $('#nombre_usuario').val()
    let password = $('#password').val()

    datos=`username=${nombre}&password=${password}`;

    $.post({

        url: 'back-end/cambiar_usuario.php',
        data: datos,
        success: function(r){

            if(r==1){
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Tus credenciales han sido cambiadas',
                    showConfirmButton: false,
                    timer: 1500
                  })
                  $('#nombre_usuario').val("")
                  $('#password').val("")
            }else{
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Hubo un problema al configurar tus credenciales',
                    showConfirmButton: false,
                    timer: 1500
                  })
            }

        }

    })

})


