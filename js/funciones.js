const boton = document.querySelector("#enviar_config");

boton.addEventListener("click", function(evento){
	
	animes_por_pagina = $('#animes_por_pagina').val();
	animes_por_columna_movil = $('#animes_por_columna_movil').val();
	animes_por_columna_pc = $('#animes_por_columna_pc').val();

	cadena = "animes_por_pagina=" + animes_por_pagina +
	"&animes_por_columna_movil=" + animes_por_columna_movil +
	"&animes_por_columna_pc=" + animes_por_columna_pc;

	$.post({
		url: 'editar_archivo_config.php',
		data: cadena,
		success: function(r){
			location.href="lista_animes";
				
		}
	});

});

