<?php

require '../config/config.php';
require '../functions.php';

$conexion = conexion($bd_config);

$anime_id = $_POST['anime_id'];
$anime_nombre = $_POST['anime_nombre'];
$anime_sinopsis = $_POST['anime_sinopsis'];

$statement = $conexion->prepare('UPDATE FROM anime set anime_nombre=:anime_nombre, anime_sinopsis=:anime_sinopsis where anime_id = :anime_id');
$statement->execute(

	':anime_nombre'   => $anime_nombre,
	':anime_sinopsis' => $anime_sinopsis,
	':anime_id'       => $anime_id

);


?>