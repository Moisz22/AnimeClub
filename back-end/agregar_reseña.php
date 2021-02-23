<?php
require '../config/config.php';
require '../functions.php';

session_start();

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

//rowcount cuenta las filas que fueron afectadas por un insert, delete o update
$num_filas_afectadas = $statement->rowCount();
//en el caso de que se actualice correctamente enviará la respuesta a ajax con 1
if($num_filas_afectadas > 0){
	$_SESSION['estado'] = 'reseña agregada';
	echo 1;
}

