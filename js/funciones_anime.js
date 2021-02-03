function confirmar_retorno_anime(anime_id){
	alertify.confirm('Confirmar recuperación',"¿Desea recuperar el anime?",
  	function(){
    	
  		$.post({
  			url: 'back-end/regresar_anime.php',
  			data: "anime_id=" + anime_id,
  			success: function(r){
          if(r==1){
            Swal.fire(
              'Buen trabajo',
              'Anime recuperado con éxito!',
              'success'
            )
          $('#tabla_dibujar').load('views/tablas/tabla_animes_eliminados.php');

          }else{

            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Hemos tenido un problema al recuperar el anime!'
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

function confirmar_eliminacion_fisica_anime(anime_id){
	alertify.confirm('Confirmar eliminación',"¿Desea eliminar permanentemente el anime?",
  	function(){
    	
  		$.post({
  			url: 'back-end/eliminar_anime_permanente.php',
  			data: "anime_id=" + anime_id,
  			success: function(r){
          if(r==1){
            Swal.fire(
              'Buen trabajo',
              'Anime eliminado con éxito!',
              'success'
            )
            $('#tabla_dibujar').load('views/tablas/tabla_animes_eliminados.php');
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











