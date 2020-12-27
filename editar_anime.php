<?php
session_start();

require 'config/config.php';
require 'functions.php';

$errores = '';
$conexion = conexion($bd_config);

if(!$conexion){

	header('Location: error.php');

}

if(!isset($_SESSION['usuario'])){

	header('Location: index.php');
}

$id = (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) ? (int)$_REQUEST['id'] : false;

//comprobar si se pasó algun id 
if($id == false || $id == ''){
	header('Location: error.php');
}

$anime = traer_anime_por_id($conexion, $id);

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	//verifica que no esté vacío el campo de foto para el anime y así evitar el error de getimagesize que no puede estar vacío
	if((!empty($_FILES['foto']['tmp_name']) && $_FILES['foto']['tmp_name'] !== null)){
		$check1 = @getimagesize($_FILES['foto']['tmp_name']);
	}

	if((!empty($_FILES['banner']['tmp_name']) && $_FILES['banner']['tmp_name'] !== null)){
		$check2 = @getimagesize($_FILES['banner']['tmp_name']);
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

	if(isset($check1) && $check1 !== false){
		unlink('images/animes/'. $anime['anime_imagen']);
		$carpeta_destino = 'images/animes/';
		$extension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
		$nombre_imagen = $nombre. '-imagen.'. $extension;
		$nombre_imagen = limpiar_nombre_imagenes($nombre_imagen);
		$archivo_subido = $carpeta_destino . $nombre_imagen;
		move_uploaded_file($_FILES['foto']['tmp_name'], $archivo_subido);
	}else{
		$nombre_imagen = $_POST['imagen_base'];
	}

	if(isset($check2) && $check2 !== false){
		unlink('images/banner/'. $anime['anime_banner']);
		$carpeta_destino = 'images/banner/';
		$extension = pathinfo($_FILES['banner']['name'], PATHINFO_EXTENSION);
		$nombre_banner = $nombre. '-banner.'.$extension;
		$nombre_banner = limpiar_nombre_imagenes($nombre_banner);
		$archivo_subido = $carpeta_destino . $nombre_banner;
		move_uploaded_file($_FILES['banner']['tmp_name'], $archivo_subido);
	}else{
		$nombre_banner = $_POST['banner_base'];
	}


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


	if(!$errores && $errores == ''){
		$statement = $conexion->prepare('UPDATE anime SET anime_nombre = :anime_nombre, anime_cantidad_capitulos = :anime_cantidad_capitulos, anime_capitulo_terminado_ver = :anime_capitulo_terminado_ver, anime_sinopsis = :anime_sinopsis, anime_actualidad = :anime_actualidad, anime_imagen = :anime_imagen, anime_banner = :anime_banner,
			anime_estado_vista = :anime_estado_vista WHERE anime_id=:id');
		$statement = $statement->execute(
			array(

			':anime_nombre' => $nombre,
			':anime_cantidad_capitulos' => $total_capitulos,
			':anime_capitulo_terminado_ver' => $capitulo_terminado,
			':anime_sinopsis' => $sinopsis,
			':anime_actualidad' => $actualidad,
			':anime_estado_vista' => $anime_estado_vista,
			':anime_imagen' => $nombre_imagen,
			':anime_banner' => $nombre_banner,
			':id' => $id

			)
	);  
		$_SESSION['estado'] = 'actualizado';
		header('Location: single_anime?id='.$id);
	}
}

require 'views/editar_anime.view.php';
?>