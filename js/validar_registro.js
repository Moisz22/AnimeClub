function validaregistro(){

	var anime_nombre = document.getElementById("anime_nombre").value;
	var cantidad_capitulos = document.getElementById("anime_cantidad_capitulos").value;
	var capitulo_terminado = document.getElementById("anime_capitulo_terminado_ver").value;
	var sinopsis = document.getElementById("anime_sinopsis").value;

	if(anime_nombre === null || anime_nombre === ''){
		alertify.warning('El nombre del anime no puede estar vacío');
		return false;
	}

	if(cantidad_capitulos === null || cantidad_capitulos === ''){
		alertify.warning('La cantidad de capitulos no puede estar vacía');
		return false;
	}

	if(capitulo_terminado === null || capitulo_terminado === ''){
		alertify.warning('La cantidad de capitulos no puede estar vacía');
		return false;
	}

	if(sinopsis === null || sinopsis === ''){
		alertify.warning('La sinopsis no puede estar vacía');
		return false;
	}

	if(capitulo_terminado < cantidad_capitulos){
		alertify.warning('La cantidad de capítulos del anime no puede ser menor que la cantidad de capítulos vistos');
		return false;
	}

	return true;
}