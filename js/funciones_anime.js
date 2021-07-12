const capitulo_visto = document.getElementById('anime_capitulo_terminado_ver')
const cantidad_capitulos = document.getElementById('anime_cantidad_capitulos')
const anime_actualidad = document.getElementById('anime_actualidad')

function confirmar_retorno_anime(anime_id){
	alertify.confirm('Confirmar recuperación',"¿Desea recuperar el anime?",
  	function(){
    	
  		$.post({
  			url: 'back-end/regresar_anime.php',
  			data: `anime_id=${anime_id}`, 
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
  			data: `anime_id=${anime_id}`,
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

//verificar si el nombre del anime esta repetido

$(document).on('change', '.comprobar_nombre', function(){

  let nombre = $('#anime_nombre').val();

  $.post({
    url: 'back-end/comprobar_repeticion_nombre.php',
    data: `anime_nombre=${nombre}`,
    success: function(respuesta){

      if(respuesta == 1){

        $('#anime_nombre').before('<div class="alert alert-danger alert-dismissible fade show" role="alert"> Anime ya existe <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>')
        $('#anime_nombre').val("")

      }

    }

  })

})

//si el anime es de estreno, aparece un select para poner los dias de cada capitulo, caso contrario se oculta
$('#anime_actualidad').on('change', function(){

  if($('#anime_actualidad').val() == 'En emision'){
    $('#select_estreno').show()
    $('#dia_estreno').prop('required', true)
  }else{
    $('#select_estreno').hide()
    $('#dia_estreno').prop('required', false)
  }

})

if(anime_actualidad.value == 'En emision'){

  $('#select_estreno').show()
  $('#dia_estreno').prop('required', true)

}

//funcion por si el numero de capitulos vistos aumenta, la cantidad de capitulos se iguale
capitulo_visto.addEventListener('change', ()=>{

  if((cantidad_capitulos.value < capitulo_visto.value) && (anime_actualidad.value === 'En emision')){

    cantidad_capitulos.value = capitulo_visto.value

  }

})











