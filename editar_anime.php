<?php
session_start();

require 'config/config.php';
require 'functions.php';

$errores = [];
$conexion = conexion($bd_config);

if(!$conexion){

	header('Location: error');

}

if(!isset($_SESSION['usuario'])){

	header('Location: index');
}

$id = (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) ? (int)$_REQUEST['id'] : false;

//comprobar si se pasó algun id 
if($id == false || $id == ''){
	header('Location: error');
}

$anime = traer_anime_por_id($conexion, $id);

$generos = traer_todos_los_generos($conexion);

$generos_seleccionados = traer_genero_de_un_anime($conexion, $anime['anime_nombre']);


$dias = array("domingo","lunes","martes","miercoles","jueves","viernes","sabado");

//para traer seleccionados los generos del anime
if($generos_seleccionados !== false){
	$genr = array();
	$genr_id = array();
	foreach($generos_seleccionados as $gs){
		array_push($genr,$gs['genero_nombre']);
		array_push($genr_id,$gs['genero_id']);
	}
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	//verifica que no esté vacío el campo de foto para el anime y así evitar el error de getimagesize que no puede estar vacío
	if((!empty($_FILES['foto']['tmp_name']) && $_FILES['foto']['tmp_name'] !== null)){
		$check1 = @getimagesize($_FILES['foto']['tmp_name']);
	}

	if((!empty($_FILES['banner']['tmp_name']) && $_FILES['banner']['tmp_name'] !== null)){
		$check2 = @getimagesize($_FILES['banner']['tmp_name']);
	}

	if(isset($_POST['dia_estreno']) && $_POST['anime_actualidad'] == 'En emision'){
		$dia_estreno = limpiarDatos($_POST['dia_estreno']);
		$dia_estreno = filter_var($dia_estreno, FILTER_SANITIZE_STRING);
	}else{
		$dia_estreno = '';
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
		array_push($errores, 'El capitulo que terminaste de ver no puede ser mayor al total de capítulos');
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


	if(!$errores){
		$statement = $conexion->prepare('UPDATE anime SET anime_nombre = :anime_nombre, anime_cantidad_capitulos = :anime_cantidad_capitulos, anime_capitulo_terminado_ver = :anime_capitulo_terminado_ver, anime_sinopsis = :anime_sinopsis, anime_actualidad = :anime_actualidad, anime_dia_capitulo_siguiente = :anime_dia_capitulo_siguiente, anime_imagen = :anime_imagen, anime_banner = :anime_banner,
			anime_estado_vista = :anime_estado_vista WHERE anime_id=:id');
		$statement = $statement->execute(
			array(

			':anime_nombre' => $nombre,
			':anime_cantidad_capitulos' => $total_capitulos,
			':anime_capitulo_terminado_ver' => $capitulo_terminado,
			':anime_sinopsis' => $sinopsis,
			':anime_actualidad' => $actualidad,
			':anime_dia_capitulo_siguiente' => $dia_estreno,
			':anime_estado_vista' => $anime_estado_vista,
			':anime_imagen' => $nombre_imagen,
			':anime_banner' => $nombre_banner,
			':id' => $id

			)
	);  

		$borrar_generos = $conexion->prepare('DELETE FROM anime_genero where anime_id=:id');
		$borrar_generos->execute(
			array(
				':id' => $id
			)
		);

		//guardar generos del anime
		if(isset($_POST['generos'])){
			if (is_array($_POST['generos'])) {
				foreach ($_POST['generos'] as $key => $value) {	
					agregar_genero($conexion, $id, $value);
				}
			}
		}

		$_SESSION['estado'] = 'actualizado';
		header('Location: single_anime?id='.$id);
	}
}

require 'views/editar_anime.view.php';

$statement = null;
$anime = null;
$generos = null;
$generos_seleccionados = null;
$borrar_generos = null;