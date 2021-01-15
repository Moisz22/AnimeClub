<?php
session_start();

if(!isset($_SESSION['usuario']) || $_SESSION['usuario'] == ''){
	header('Location: index');
}

require 'config/config.php';
require 'functions.php';

$errores = [];

$conexion = conexion($bd_config);

if(!$conexion){

	header('Location: error');
}

$generos = traer_todos_los_generos($conexion);

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)){

	if((!empty($_FILES['foto']['tmp_name']) && $_FILES['foto']['tmp_name'] !== null)){
		$check1 = @getimagesize($_FILES['foto']['tmp_name']);
	}else{
		$check1 = false;
	}

	if((!empty($_FILES['banner']['tmp_name']) && $_FILES['banner']['tmp_name'] !== null)){
		$check2 = @getimagesize($_FILES['banner']['tmp_name']);
	}else{
		$check2 = false;
	}

	$nombre = limpiarDatos($_POST['anime_nombre']);
	$nombre = filter_var($nombre, FILTER_SANITIZE_STRING);

	$total_capitulos = limpiarDatos($_POST['anime_cantidad_capitulos']);
	$total_capitulos = filter_var($total_capitulos, FILTER_VALIDATE_INT);

	$capitulo_terminado = limpiarDatos($_POST['anime_capitulo_terminado_ver']);
	$capitulo_terminado = filter_var($capitulo_terminado, FILTER_VALIDATE_INT);

	$sinopsis = limpiarDatos($_POST['anime_sinopsis']);
	$sinopsis = filter_var($sinopsis, FILTER_SANITIZE_STRING);

	$actualidad = limpiarDatos($_POST['anime_actualidad']);
	$actualidad = filter_var($actualidad, FILTER_SANITIZE_STRING);

	if($capitulo_terminado > $total_capitulos){
		array_push($errores,'El capitulo que terminaste de ver no puede ser mayor al total de capítulos');
	}

	if($capitulo_terminado < $total_capitulos){
		$anime_estado_vista = 'proceso';
	}elseif($capitulo_terminado == $total_capitulos){
		$anime_estado_vista = 'terminado';
	}

	if(!isset($nombre) || $nombre == '' || !isset($total_capitulos) || $total_capitulos == '' || !isset($sinopsis) || $sinopsis == '' || !isset($actualidad) || $actualidad == ''){
		array_push($errores, 'Uno o mas campos están vacíos');
	}

	if($total_capitulos == false || $capitulo_terminado == false){
		array_push($errores, 'Uno o más campos están incorrectos');
	}

	if($check1 !== false){
		$carpeta_destino = 'images/animes/';
		$extension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
		$nombre_imagen = $nombre. '-imagen.'. $extension;
		$nombre_imagen = limpiar_nombre_imagenes($nombre_imagen);
		$archivo_subido = $carpeta_destino . $nombre_imagen;
		move_uploaded_file($_FILES['foto']['tmp_name'], $archivo_subido);
	}else{
		array_push($errores, 'El archivo para su foto no es una imagen o es muy pesado');
	}

	if($check2 !== false){
		$carpeta_destino = 'images/banner/';
		$extension = pathinfo($_FILES['banner']['name'], PATHINFO_EXTENSION);
		$nombre_banner = $nombre. '-banner.'.$extension;
		$nombre_banner = limpiar_nombre_imagenes($nombre_banner);
		$archivo_subido = $carpeta_destino . $nombre_banner;
		move_uploaded_file($_FILES['banner']['tmp_name'], $archivo_subido);
	}else{
		array_push($errores, 'El archivo para su banner no es una imagen o es muy pesado');
	}

	if(!$errores){
		$statement = $conexion->prepare('INSERT INTO anime(anime_nombre,anime_cantidad_capitulos, anime_capitulo_terminado_ver, anime_sinopsis, anime_estado_vista, anime_actualidad, anime_imagen, anime_banner) VALUES(:anime_nombre, :anime_cantidad_capitulos, :anime_capitulo_terminado_ver, :anime_sinopsis, :anime_estado_vista,:anime_actualidad, :anime_imagen, :anime_banner )');
		$statement->execute(
			array(

				'anime_nombre' => $nombre,
				'anime_cantidad_capitulos' => $total_capitulos,
				'anime_capitulo_terminado_ver' => $capitulo_terminado,
				'anime_sinopsis' => $sinopsis,
				'anime_actualidad' => $actualidad,
				'anime_imagen' => $nombre_imagen,
				'anime_banner' => $nombre_banner,
				'anime_estado_vista' => $anime_estado_vista
			)
		);

		//obtenemos el ultimo id del insertad
		$last_id = $conexion->lastInsertId();


	if(isset($_POST['generos'])){
		if (is_array($_POST['generos'])) {
        $selected = '';
        $num_countries = count($_POST['generos']);
        $current = 0;
        foreach ($_POST['generos'] as $key => $value) {

        	agregar_genero($conexion, $last_id, $value);

            /*if ($current != $num_countries-1)
                $selected .= $value.', ';
            else
                $selected .= $value.'.';
            */
            $current++;
        	}
    	}

	}


	//envia el estado {registrado, actualizado o eliminado} en sesion y la elimina al llegar a la vista
		$_SESSION['estado'] = 'registrado';
		header('Location:lista_animes');

	}

}

require 'views/registrar_anime.view.php';

?>