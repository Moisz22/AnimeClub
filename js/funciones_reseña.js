function añadir_reseña(){
  Swal.mixin({
    input: 'text',
    confirmButtonText: 'Siguiente &rarr;',
    showCancelButton: true,
    progressSteps: ['1', '2', '3']
  }).queue([
    {
      title: 'titulo',
      text: 'Agrega el titulo de tu reseña',
      input: 'text'
    },
    {
      title: 'Reseña',
      text: 'Comenta aquí tu reseña',
      input: 'textarea'
    },
    {
      title: 'Valoración',
      text: 'Agrega tu valoracion del 1 al 5',
      input: 'range',
      inputAttributes: {
      min: 1,
      max: 5,
      step: 1
    }
    }
  ]).then((result) => {
    if (result.value) {
      const answers = JSON.stringify(result.value)
      $.post({
        url:'back-end/agregar_reseña.php',
        data: `titulo=${result.value[0]}
        &reseña=${result.value[1]}
        &valoracion=${result.value[2]}
        &anime_id=${$('#anime_id').val()}`,
        success: function(r){
          if(r==1){
            location.href=`single_anime?id=${$('#anime_id').val()}`
          }else{
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Hemos tenido un problema al agregar la reseña!'
            //footer: '<a href>Why do I have this issue?</a>'
          })
         }
        }    	
      });
      
    }
  })
}



function confirmar_retorno_reseña(reseña_id){
    alertify.confirm('Confirmar recuperación',"¿Desea recuperar esta reseña?",
      function(){
        
        $.post({
          url: 'back-end/regresar_reseña.php',
          data: `resenia_id=${reseña_id}`, 
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
  
  
  function confirmar_eliminacion_logica_reseña(reseña_id){
		alertify.confirm('Confirmar eliminación',"¿Desea eliminar la reseña?", function(){
    	
	  		$.post({
	  			url: 'back-end/eliminar_reseña.php',
	  			data: `resenia_id=${reseña_id}`,
	  			success: function(r){
	          if(r==1){
	            location.href=`single_anime?id=${$('#anime_id').val()}`
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


  
  function confirmar_eliminacion_fisica_reseña(reseña_id){
    alertify.confirm('Confirmar eliminación',"¿Desea eliminar permanentemente la reseña?",
      function(){
        
        $.post({
          url: 'back-end/eliminar_reseña_permanente.php',
          data: `resenia_id=${reseña_id}`,
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
  