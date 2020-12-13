<?php
session_start();
require 'config/config.php';
require 'functions.php';

$conexion = conexion($bd_config);

$generos = traer_todos_los_generos($conexion);



if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)){
	$check1 = @getimagesize($_FILES['foto']['tmp_name']);
	$check2 = @getimagesize($_FILES['banner']['tmp_name']);
	$nombre = limpiarDatos($_POST['anime_nombre']);
	$total_capitulos = limpiarDatos($_POST['anime_cantidad_capitulos']);
	$sinopsis = limpiarDatos($_POST['anime_sinopsis']);
	$actualidad = limpiarDatos($_POST['anime_actualidad']);

}

require 'views/registrar_anime.view.php';

?>