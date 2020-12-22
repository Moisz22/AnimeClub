<?php 



function conexion($bd_config){

	try{
		$conexion = new PDO($bd_config['servidor_db'].':host='.$bd_config['servidor'].';dbname='.$bd_config['basedatos'],$bd_config['usuario'],$bd_config['password']);
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

function traer_todos_los_animes($conexion, $animes_por_pagina, $b = NULL){

	$inicio = (pagina_actual() > 1) ? pagina_actual() * $animes_por_pagina - $animes_por_pagina : 0;

	if(isset($b) && !empty($b)){
		$statement = $conexion->prepare("SELECT * FROM anime WHERE anime_nombre LIKE :b && anime_estado = 1 LIMIT $inicio, $animes_por_pagina");
		$statement->execute(array(
			'b' => "%$b%"
		)
		);
	}else{
		$statement = $conexion->prepare("SELECT * FROM anime WHERE anime_estado = 1 LIMIT $inicio, $animes_por_pagina");
		$statement->execute();
	}
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

function traer_reseña_por_id($conexion, $id){
	$statement = $conexion->query("SELECT * FROM anime as a, reseña as r where a.anime_id=$id && a.anime_id = r.anime_id LIMIT 1");
	return $statement->fetch();
}

function paginacion($conexion, $animes_por_pagina){

	$totalanimes = $conexion->prepare('SELECT COUNT(*) anime from anime WHERE anime_estado = 1');
	$totalanimes->execute();
	$totalanimes = $totalanimes->fetch()[0];
	return ceil($totalanimes / $animes_por_pagina);
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

function modal($mensaje){

	?><div class="container">
  			<!-- Modal -->
	  		<div class="modal fade" id="mostrarmodal" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
	    		<div class="modal-dialog">
	      			<!-- Modal content-->
	      			<div class="modal-content">
	        			<div class="modal-header">
	        				<p class="modal-title text_align_center"><b>Mensaje</b></p>
				        	<button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
	        			</div>
	        			<div class="modal-body">
	        				<img class="centrar_imagen" src="images/success.gif" alt="">
	          				<p class="text_align_center"><?php echo $mensaje?></p>
	        			</div>
	        			<div class="modal-footer">
	          				<button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
	        			</div>
	      			</div>
	      
	    		</div>
	  		</div>
  
		</div>
	<?php 
}


?>