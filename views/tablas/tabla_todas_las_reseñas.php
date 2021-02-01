<?php 
require '../../config/config.php';
require '../../functions.php';

$conexion = conexion($bd_config);

if(!$conexion){
	header('Location: index');
	die();
}

//aquí se traen todos los animes de la bd
$statement = $conexion->prepare("SELECT * FROM resenia as r, anime as a WHERE r.anime_id=a.anime_id");
$statement->execute();
$reseñas = $statement->fetchAll();

?>
<div class="container">
	<div class="table-responsive">
		<table class="table table-hover table-dark">
			<thead>
				<tr>
					<th>ID</th>
					<th>Anime</th>
					<th>Titulo</th>
					<th>Comentario</th>
					<th>Valoración</th>
					<th>Fecha</th>
					<th>Estado</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($reseñas as $reseña): ?>
					<tr>
						<td><?php echo $reseña['resenia_id'];?></td>
						<td><?php echo $reseña['anime_nombre'];?></td>
						<td><?php echo $reseña['resenia_titulo'];?></td>
						<td><?php echo $reseña['resenia_comentarios'];?></td>
						<td><?php echo $reseña['resenia_valoracion'];?></td>
						<td><?php echo $reseña['Fecha_Registro'];?></td>
						<td><?php echo $reseña['resenia_estado'];?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>


