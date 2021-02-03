function confirmar_retorno_reseña(reseña_id){
    alertify.confirm('Confirmar recuperación',"¿Desea recuperar esta reseña?",
      function(){
        
        $.post({
          url: 'back-end/regresar_reseña.php',
          data: "resenia_id=" + reseña_id,
          success: function(r){
            if(r==1){
              //si la respuesta recibida por el servidor es 1 se muestra este mensaje, caso contrario se muestra el mensaje de error
              Swal.fire(
                'Buen trabajo',
                'Reseña recuperada con éxito!',
                'success'
              )
            $('#tabla_dibujar').load('views/tablas/tabla_reseñas_eliminadas.php');
  
            }else{
  
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Hemos tenido un problema al recuperar esta reseña!'
                //footer: '<a href>Why do I have this issue?</a>'
              })
  
            }
            
          }
  
        })
  
      },
      function(){
        alertify.error('Cancelado');
      });
  
  }
  
  
  
  function confirmar_eliminacion_fisica_reseña(reseña_id){
    alertify.confirm('Confirmar eliminación',"¿Desea eliminar permanentemente la reseña?",
      function(){
        
        $.post({
          url: 'back-end/eliminar_reseña_permanente.php',
          data: "reseña_id=" + reseña_id,
          success: function(r){
            if(r==1){
              Swal.fire(
                'Buen trabajo',
                'Reseña eliminada con éxito!',
                'success'
              )
              $('#tabla_dibujar').load('views/tablas/tabla_reseñas_eliminadas.php');
            }else{
  
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Hemos tenido un problema al eliminar el anime!'
                //footer: '<a href>Why do I have this issue?</a>'
              })
  
            }
          }
  
        })
  
      },
      function(){
        alertify.error('Cancelado');
      });
  
  }
  