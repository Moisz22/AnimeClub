<?php 


$bd_config = array(
	'servidor'    =>  'localhost',
	'servidor_db' => 'mysql',
	'basedatos'   => 'series_vistas',
	'usuario'     => 'root',
	'password'    =>  ''

);

define('RUTA', 'http://'.$bd_config['servidor'].'/animes/');

$paginacion_config = array(
	'animes_por_pagina' => 5
);



?>