<?php
require '../config/config.php';
require '../functions.php';

$conexion = conexion($bd_config);

$titulo = $_POST['titulo'];

$reseña = (isset($_POST['reseña'])) ? $_POST['reseña'] : '';

$valoracion = $_POST['valoracion'];

$anime_id = $_POST['anime_id'];

$statement = $conexion->prepare('INSERT INTO resenia(resenia_titulo, resenia_comentarios, resenia_valoracion, anime_id) VALUES(:resenia_titulo, :resenia_comentarios, :resenia_valoracion, :anime_id)');

$statement->execute(array(

	'resenia_titulo' => $titulo,
	':resenia_comentarios' => $reseña,
	':resenia_valoracion' => $valoracion,
	':anime_id' => $anime_id
));

echo 1;

?>