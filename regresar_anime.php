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

	$statement = $conexion->prepare("UPDATE anime SET anime_estado=1 WHERE anime_id=:anime_id");
	$statement->execute(array(
		':anime_id' => $anime_id
		)
	);
}

?>