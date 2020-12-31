<?php 
require '../../config/config.php';
require '../../functions.php';

$conexion = conexion($bd_config);

if(!$conexion){
	header('Location:'.RUTA);
	die();
}



$reseñas = reseñas_eliminadas($conexion);

?>
<div class="container">
	<div class="table-responsive">
		<table class="table table-hover table-dark">
			<thead>
				<tr>
					<th>Anime</th>
					<th>Título</th>
					<th>Reseña</th>
					<th>Recuperar</th>
					<th>Eliminar</th>

				</tr>
			</thead>
			<tbody>
				<?php foreach($reseñas as $reseña): ?>
					<tr>
						<td><?php echo $reseña['anime_nombre'];?></td>
						<td><?php echo $reseña['resenia_titulo'];?></td>
						<td><?php echo $reseña['resenia_comentarios'];?></td>
						<td><button class="btn btn-warning fa fa-arrow-up" onclick="confirmar_retorno_reseña('<?php echo $reseña["resenia_id"];?>')"></button></td>
						<td><button class="btn btn-danger fa fa-trash" onclick="confirmar_eliminacion_fisica_reseña('<?php echo $reseña["resenia_id"];?>')"></button></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
