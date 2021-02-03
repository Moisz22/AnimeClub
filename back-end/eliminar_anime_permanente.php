<?php
require '../config/config.php';
require '../functions.php';

$conexion = conexion($bd_config);
if(!$conexion){
	header('Location:error');
	die();
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$anime_id = $_POST['anime_id'];

	//traer el anime que se va a eliminar permanentemente, para extraer informacion de la imagen y banner para eliminarlos
	$anime = traer_anime_eliminado_por_id($conexion, $anime_id);

	//guardar las rutas de las imagenes 
	$imagen_eliminar = '../images/animes/'.$anime['anime_imagen'];
	$banner_eliminar = '../images/banner/'.$anime['anime_banner'];

	//eliminar los generos asociados a ese anime
	$statement = $conexion->prepare("DELETE FROM anime_genero WHERE anime_id=:anime_id");
	$statement->execute(array(

		'anime_id' => $anime_id

	));

	//eliminando todas las reseñas asociadas a ese anime
	$statement2 = $conexion->prepare("DELETE FROM resenia WHERE anime_id=:anime_id");
	$statement2->execute(array(

		'anime_id' => $anime_id

	));

	//eliminando el anime
	$statement3 = $conexion->prepare("DELETE FROM anime WHERE anime_id=:anime_id");
	$statement3->execute(array(
		'anime_id' => $anime_id
		)
	);

	//rowcount cuenta las filas que fueron afectadas por un insert, delete o update
	$num_filas_afectadas = $statement3->rowCount();
	//en el caso de que se actualice correctamente enviará la respuesta a ajax con 1
	if($num_filas_afectadas > 0){
		//si se elimina el registro correctamente, se eliminan las fotos tambien
		unlink($imagen_eliminar);
		unlink($banner_eliminar);
		echo $num_filas_afectadas;	
	}

}



?>