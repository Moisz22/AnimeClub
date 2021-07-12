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
					<th>Estado Tv</th>
					<th>Estado Vista</th>
					<th>Estado</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($animes as $anime): ?>

					<?php 
					//poniendo los datos de cada anime en una variable para que estén al momento de editar
					$datos=$anime['anime_nombre']."||".
						   $anime['anime_actualidad']."||".
						   $anime['anime_sinopsis']."||".
						   $anime['anime_estado']."||".
						   $anime['anime_cantidad_capitulos']."||".
						   $anime['anime_id']; 

					?>
					<tr>
						<td><?php echo $anime['anime_id'];?></td>
						<td><?php echo $anime['anime_nombre'];?></td>
						<td><img class="animes_lista centrar_imagen" src="images/animes/<?php echo $anime['anime_imagen'];?>" alt="<?php echo $anime['anime_nombre'];?>"></td>
						<td><?php echo $anime['anime_actualidad'];?></td>
						<td><?php echo $anime['anime_estado_vista'];?></td>
						<td><?php echo $anime['anime_estado'];?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php 
	//require '../../paginacion_tablas.php'; ?>
</div>
