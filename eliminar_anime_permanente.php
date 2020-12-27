<?php
require 'config/config.php';
require 'functions.php';

$conexion = conexion($bd_config);
if(!$conexion){
	header('Location:error');
	die();
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$anime_id = $_POST['anime_id'];

	//traer el anime que se va a eliminar permanentemente, para extraer informacion de la imagen y banner para eliminarlos
	$anime = traer_anime_eliminado_por_id($conexion, $anime_id);

	//eliminar la imagen y el banner antes de eliminarlo de la bd
	unlink('images/animes/'.$anime['anime_imagen']);
	unlink('images/banner/'.$anime['anime_banner']);

	$statement = $conexion->prepare("DELETE FROM anime WHERE anime_estado=0 && anime_id=:anime_id");
	$statement->execute(array(
		':anime_id' => $anime_id
		)
	);
}

?>