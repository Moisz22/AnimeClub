<?php 

function conexion($bd_config){

	try{
		$conexion = new PDO($bd_config['servidor_db'].':host='.$bd_config['servidor'].';port='.$bd_config['puerto'].';dbname='.$bd_config['basedatos'],$bd_config['usuario'],$bd_config['password']);
		return $conexion;
	}catch(PDOException $e){
		return false;
	}
	
}

//reemplaza los caracteres especiales en los nombres de las imagenes que se van a subir por espacios en blanco
function limpiar_nombre_imagenes($imagen){

	$imagen = str_replace(':', ' ',$imagen);
	$imagen = str_replace('/', ' ',$imagen);
	$imagen = str_replace('*',' ',$imagen);
	$imagen = str_replace('?',' ',$imagen);
	$imagen = str_replace('"',' ',$imagen);
	$imagen = str_replace('<',' ',$imagen);
	$imagen = str_replace('>',' ',$imagen);
	$imagen = str_replace('|',' ',$imagen);
	return $imagen;
}

function limpiarDatos($dato){

	$dato = trim($dato);
	$dato = stripcslashes($dato);
	$dato = htmlspecialchars($dato);
	return $dato;

}

function pagina_actual(){
	return (isset($_GET['p'])) ? (int)$_GET['p'] : 1;
}

function total_animes($conexion){

	$totalanimes = $conexion->prepare('SELECT COUNT(*) anime from anime WHERE anime_estado = 1');
	$totalanimes->execute();
	return $totalanimes = $totalanimes->fetch()[0];
}

function traer_todos_los_animes($conexion, $animes_por_pagina, $b = NULL){

	$inicio = (pagina_actual() > 1) ? pagina_actual() * $animes_por_pagina - $animes_por_pagina : 0;

	if(isset($b) && !empty($b)){
		$statement = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM anime WHERE anime_nombre LIKE :b && anime_estado = 1 LIMIT $inicio, $animes_por_pagina");
		$statement->execute(array(
			'b' => "%$b%"
		)
		);
	}else{
		$statement = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM anime WHERE anime_estado = 1 LIMIT $inicio, $animes_por_pagina");
		$statement->execute();
	}
	return $statement->fetchAll();
}

//traer los animes que están eliminados logicamente
function animes_eliminados($conexion){
	$statement = $conexion->prepare("SELECT * FROM anime WHERE anime_estado = 0 ORDER BY anime_nombre");
		$statement->execute();
	return $statement->fetchAll();
}

//traer todas las reseñas que están eliminadas logicamente
function reseñas_eliminadas($conexion){
	$statement = $conexion->prepare("SELECT * FROM resenia as r, anime as a WHERE r.anime_id=a.anime_id && resenia_estado = 0");
		$statement->execute();
	return $statement->fetchAll();
}

//funcion de prueba para traer todos los datos de un anime en algunas tablas(anime y reseña)
function traer_anime_por_id($conexion, $id){
	$statement = $conexion->prepare('SELECT * FROM anime WHERE anime_id=:id && anime_estado = 1');
	$statement->execute(array(
		':id' => $id
	)
	);
	return $statement->fetch();
}

function traer_animes_por_genero($conexion, $animes_por_pagina, $g){

	$inicio = (pagina_actual() > 1) ? pagina_actual() * $animes_por_pagina - $animes_por_pagina : 0;
	$statement = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM anime as a, anime_genero as ag, genero as g  WHERE a.anime_id=ag.anime_id && ag.genero_id=g.genero_id && g.genero_nombre=:g && a.anime_estado=1 LIMIT $inicio, $animes_por_pagina");
		$statement->execute(array(

			'g' => $g
		)
		);
		return $statement->fetchAll();
}

//trae informacion de un anime con estado 0
function traer_anime_eliminado_por_id($conexion, $id){
	$statement = $conexion->prepare('SELECT * FROM anime WHERE anime_id=:id && anime_estado = 0');
	$statement->execute(array(
		':id' => $id
	)
	);
	return $statement->fetch();
}

function traer_reseña_por_id($conexion, $id){
	$statement = $conexion->query("SELECT * FROM anime as a, resenia as r where a.anime_id=$id && a.anime_id = r.anime_id && r.resenia_estado=1 LIMIT 1");
	return $statement->fetch();
}

function paginacion($conexion, $animes_por_pagina){
	if(isset($_GET['g']) && !empty($_GET['g'])){
		$totalanimes = $conexion->prepare('SELECT FOUND_ROWS() as total');
	}elseif (isset($_GET['b']) && !empty($_GET['b'])) {
		$totalanimes = $conexion->prepare('SELECT FOUND_ROWS() as total');
	}else{
		$totalanimes = $conexion->prepare('SELECT COUNT(*) anime from anime WHERE anime_estado = 1');
		$totalanimes->execute();
	}
	$totalanimes->execute();
	$totalanimes = $totalanimes->fetch()[0];
	return ceil($totalanimes / $animes_por_pagina);
}


function paginacion_tablas($conexion, $registros_por_pagina, $tabla){

	$totalregistros = $conexion->prepare("SELECT COUNT(*) FROM $tabla");
	$totalregistros->execute();
	$totalregistros = $totalregistros->fetch()[0];
	return ceil($totalregistros / $registros_por_pagina);

}


function traer_todos_los_generos($conexion){
	$statement = $conexion->query('SELECT * FROM genero ORDER BY genero_nombre');
	return $statement->fetchAll();
}

function traer_genero_de_un_anime($conexion, $nombre_anime){

	$statement = $conexion->prepare('SELECT g.genero_nombre genero FROM genero AS g, anime_genero AS ag, anime AS a  WHERE a.anime_nombre = :anime && a.anime_id=ag.anime_id && ag.genero_id=g.genero_id');
	$statement->execute( array(
		':anime' => $nombre_anime
		)
	);

	$generos = $statement->fetchAll();

	return ($generos) ? $generos : false;
}

function eliminar_anime_por_id($conexion, $id){

	$statement = $conexion->prepare('UPDATE anime SET anime_estado = 0 WHERE anime_id = :id');
	$statement->execute(array(
		':id' => $id
	)
	);
}

function agregar_genero($conexion, $anime_id, $genero_id){

		$statement = $conexion->prepare('INSERT INTO anime_genero(anime_id, genero_id) VALUES(:anime_id, :genero_id)');

		$statement->execute(array(
			':anime_id' => $anime_id,
			'genero_id' => $genero_id

		));

}

?>