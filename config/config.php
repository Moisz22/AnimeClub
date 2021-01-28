<?php 

//configuracion de la base de datos

$bd_config = array(
	'servidor'    => 'localhost',
	'servidor_db'    => 'mysql',
	'puerto'         => '3306',
	'basedatos'      => 'series_vistas',
	'usuario'        => 'root',
	'password'       =>  '',
	'servidor_pagina' => 'localhost'

);

//ruta de la pagina principal

define('RUTA', 'http://'.$bd_config['servidor_pagina'].'/animeclub/');


/*
	configuracion de la paginacion al visualizar la lista de animes
	* recomendable usar solo multplos de 12 en esta seccion
	* el numero de animes por pagina no puede ser menor que el index de 'animes_por_columna_moviles'
	* el numero de animes por pagina no puede ser menor que el index de 'animes_por_columna_pc'

*/

?>