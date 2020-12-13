<?php
session_start();

require 'config/config.php';
require 'functions.php';

$conexion = conexion($bd_config);

if($_SERVER['REQUEST_METHOD'] == 'GET'){

	$id = ($_GET['id']) ? (int)$_GET['id'] : false;

	$anime = traer_anime_por_id($conexion, $id);

}

require 'views/editar_anime.view.php';
?>