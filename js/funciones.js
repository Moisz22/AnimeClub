const boton = document.querySelector("#enviar_config");

boton.addEventListener("click", function(evento){
	
	animes_por_pagina = $('#animes_por_pagina').val();
	animes_por_columna_movil = $('#animes_por_columna_movil').val();
	animes_por_columna_pc = $('#animes_por_columna_pc').val();

	cadena = "animes_por_pagina=" + animes_por_pagina +
	"&animes_por_columna_movil=" + animes_por_columna_movil +
	"&animes_por_columna_pc=" + animes_por_columna_pc;

  //validando que los campos no estén vacíos antes de agregar la configuracion
  if(animes_por_pagina==""){
    alertify.warning('el primer campo no puede estar vacío');
  }else if(animes_por_columna_movil==""){
    alertify.warning('el segundo campo no puede estar vacío');
  }else if(animes_por_columna_pc==""){
    alertify.warning('el tercer campo no puede estar vacío');
  }
  else{
	$.post({
		url: 'editar_archivo_config.php',
		data: cadena,
		success: function(r){
			location.href="lista_animes";
		}
	});

  }

});


function confirmar_retorno(){
	alertify.confirm('Confirmar recuperación',"¿Desea recuperar el anime?",
  	function(){
    	
  		$.post({
  			url: 'regresar_anime.php',
  			data: "anime_id=" + $('#retorno_registro').val(),
  			success: function(){
  				alertify.success('Anime recuperado :)');
  				$('#tabla_dibujar').load('tabla_animes_eliminados.php');
  			}

  		})

  	},
  	function(){
    	alertify.error('Cancelado');
  	});

}

function confirmar_eliminacion(){
	alertify.confirm('Confirmar eliminación',"¿Desea eliminar permanentemente el anime?",
  	function(){
    	
  		$.post({
  			url: 'eliminar_anime_permanente.php',
  			data: "anime_id=" + $('#eliminacion_permanente').val(),
  			success: function(e){
          console.log(e);
  				alertify.success('Anime eliminado');
  				$('#tabla_dibujar').load('tabla_animes_eliminados.php');
  			}

  		})

  	},
  	function(){
    	alertify.error('Cancelado');
  	});

}






