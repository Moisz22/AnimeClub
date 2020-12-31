<?php 
require '../../config/config.php';
require '../../functions.php';

$conexion = conexion($bd_config);

if(!$conexion){
	header('index');
	die();
}



//aquí se traen todos los animes de la bd
$statement = $conexion->prepare('SELECT * FROM anime');
$statement->execute();
$animes = $statement->fetchAll();

?>
<div class="container">
	<div class="table-responsive">
		<table class="table table-hover table-dark">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Foto</th>
					<th>Banner</th>
					<th>Estado Tv</th>
					<th>Estado Vista</th>
					<th>Estado</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($animes as $anime): ?>
					<tr>
						<td><?php echo $anime['anime_id'];?></td>
						<td><?php echo $anime['anime_nombre'];?></td>
						<td><img class="animes_lista centrar_imagen" src="images/animes/<?php echo $anime['anime_imagen'];?>" alt="<?php echo $anime['anime_nombre'];?>"></td>
						<td><img style="height: 150px; width: 150px; border-radius: 10px;" class="centrar_imagen" src="images/banner/<?php echo $anime['anime_banner'];?>" alt="<?php echo $anime['anime_banner'];?>"></td>
						<td><?php echo $anime['anime_actualidad'];?></td>
						<td><?php echo $anime['anime_estado_vista'];?></td>
						<td><?php echo $anime['anime_estado'];?></td>
						<td><button class="btn btn-warning fa fa-pencil"></button></td>
						<td><button class="btn btn-danger fa fa-trash"></button></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>


