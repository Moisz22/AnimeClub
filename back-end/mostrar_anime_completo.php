<?php

require '../config/config.php';
require '../functions.php';

$conexion = conexion($bd_config);

$anime_id = $_POST['anime_id'];

$statement = $conexion->prepare('SELECT * FROM anime where anime_id = :anime_id');
$statement->execute(
	array(
		'anime_id' => $anime_id
	)
);

$resultado = $statement->fetch();

echo $resultado;

$resultado = null;

?>