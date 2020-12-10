<?php 



function conexion($bd_config){

	try{
		$conexion = new PDO($bd_config['servidor_db'].':host='.$bd_config['servidor'].';dbname='.$bd_config['basedatos'],$bd_config['usuario'],$bd_config['password']);
		return $conexion;
	}catch(PDOException $e){
		return false;
	}
	
}

function pagina_actual(){
	return (isset($_GET['p'])) ? (int)$_GET['p'] : 1;
}

function traer_todos_los_animes($conexion, $animes_por_pagina){

	$inicio = (pagina_actual() > 1) ? pagina_actual() * $animes_por_pagina - $animes_por_pagina : 0;

	$statement = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM anime LIMIT $inicio, $animes_por_pagina");
	$statement->execute();
	return $statement->fetchAll();
}

function traer_anime_por_id($conexion, $id){
	$statement = $conexion->prepare("SELECT * FROM anime where anime_id=$id LIMIT 1");
	$statement->execute();
	return $statement->fetch()[0];
}

function paginacion($conexion, $animes_por_pagina){

	$totalanimes = $conexion->prepare('SELECT COUNT(*) anime from anime');
	$totalanimes->execute();
	$totalanimes = $totalanimes->fetch()[0];
	return ceil($totalanimes / $animes_por_pagina);
}

function traer_genero_de_un_anime($conexion, $anime){

	$statement = $conexion->prepare('SELECT g.genero_nombre FROM genero AS g, anime_genero AS ag, anime AS a  WHERE a.anime_nombre = :anime && a.anime_id=ag.anime_id && ag.genero_id=g.genero_id');
	$statement->execute( array(
		':anime' => $anime
		)
	);

	return ($statement) ? $statement : false;
}





 ?>