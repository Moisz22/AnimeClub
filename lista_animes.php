<?php 
session_start();
require 'config/config.php';
require 'functions.php';
$conexion = conexion($bd_config);

if(!$conexion){
	header('Location:error.php');
}

$animes = traer_todos_los_animes($conexion, $paginacion_config['animes_por_pagina']);

if(!$animes){
	header('Location: index.php');
}

require 'views/lista_animes.view.php';
?>