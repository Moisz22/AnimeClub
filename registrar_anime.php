<?php
session_start();

if(!isset($_SESSION['usuario']) || $_SESSION['usuario'] == ''){
	header('Location: index.php');
}

require 'config/config.php';
require 'functions.php';

$errores = '';

$conexion = conexion($bd_config);

if(!$conexion){

	header('Location: error.php');
}

$generos = traer_todos_los_generos($conexion);



if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)){

	$check1 = @getimagesize($_FILES['foto']['tmp_name']);
	$check2 = @getimagesize($_FILES['banner']['tmp_name']);

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
		$errores .= '<li>El capitulo que terminaste de ver no puede ser mayor al total de capítulos</li>';
	}

	if($capitulo_terminado < $total_capitulos){
		$anime_estado_vista = 'proceso';
	}elseif($capitulo_terminado == $total_capitulos){
		$anime_estado_vista = 'terminado';
	}

	if(!isset($nombre) || $nombre == '' || !isset($total_capitulos) || $total_capitulos == '' || !isset($sinopsis) || $sinopsis == '' || !isset($actualidad) || $actualidad == ''){
		$errores .= '<li>Uno o mas campos están vacíos</li>';
	}

	if($total_capitulos == false || $capitulo_terminado == false){
		$errores .= '<li>Uno o más campos están incorrectos</li>';
	}

	if($check1 !== false){
		$carpeta_destino = 'images/animes/';
		$archivo_subido = $carpeta_destino . $_FILES['foto']['name'];
		move_uploaded_file($_FILES['foto']['tmp_name'], $archivo_subido);
	}else{
		$errores .= '<li>El archivo para su foto no es una imagen o es muy pesado</li>';
	}

	if($check2 !== false){
		$carpeta_destino = 'images/banner/';
		$archivo_subido = $carpeta_destino . $_FILES['banner']['name'];
		move_uploaded_file($_FILES['banner']['tmp_name'], $archivo_subido);
	}else{
		$errores .= '<li>El archivo para su banner no es una imagen o es muy pesado</li>';
	}

	if(!$errores && $errores == ''){
		$statement = $conexion->prepare('INSERT INTO anime(anime_nombre,anime_cantidad_capitulos, anime_capitulo_terminado_ver, anime_sinopsis, anime_estado_vista, anime_actualidad, anime_imagen, anime_banner) VALUES(:anime_nombre, :anime_cantidad_capitulos, :anime_capitulo_terminado_ver, :anime_sinopsis, :anime_estado_vista,:anime_actualidad, :anime_imagen, :anime_banner )');
		$statement->execute(
			array(

				'anime_nombre' => $nombre,
				'anime_cantidad_capitulos' => $total_capitulos,
				'anime_capitulo_terminado_ver' => $capitulo_terminado,
				'anime_sinopsis' => $sinopsis,
				'anime_actualidad' => $actualidad,
				'anime_imagen' => $_FILES['foto']['name'],
				'anime_banner' => $_FILES['banner']['name'],
				'anime_estado_vista' => $anime_estado_vista
			)
		);
		header('Location:lista_animes.php?estado=registrado');
	}

}

require 'views/registrar_anime.view.php';

?>