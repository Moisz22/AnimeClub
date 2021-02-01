<?php 
require '../../config/config.php';
require '../../functions.php';

$conexion = conexion($bd_config);

if(!$conexion){
	header('Location:'.RUTA);
	die();
}

$animes = animes_eliminados($conexion);

?>
<div class="container">
	<div class="table-responsive">
		<table class="table table-hover table-dark">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Foto</th>
					<th>Estado Tv</th>
					<th>Estado Vista</th>
					<th>Restaurar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($animes as $anime): ?>
					<tr>
						<td><?php echo $anime['anime_nombre'];?></td>
						<td><img class="animes_lista centrar_imagen" src="images/animes/<?php echo $anime['anime_imagen'];?>" alt="<?php echo $anime['anime_nombre'];?>"></td>
						<td><?php echo $anime['anime_actualidad'];?></td>
						<td><?php echo $anime['anime_estado_vista'];?></td>
						<td><button style="margin-top: 50px;" class="btn btn-warning fa fa-arrow-up" onclick="confirmar_retorno_anime(<?php echo $anime['anime_id'];?>)"></button></td>
						<td><button style="margin-top: 50px;" onclick="confirmar_eliminacion_fisica_anime(<?php echo $anime['anime_id'];?>)" class="btn btn-danger fa fa-trash"></button></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>



