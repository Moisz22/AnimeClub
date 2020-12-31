<?php 
require '../../config/config.php';
require '../../functions.php';

$conexion = conexion($bd_config);

if(!$conexion){
	header('Location:'.RUTA);
	die();
}


$generos = traer_todos_los_generos($conexion);

?>
<div class="container">
	<div class="table-responsive">
		<table class="table table-hover table-dark">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Estado</th>
					<th>Fecha</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($generos as $genero): ?>
					<tr>
						<td><?php echo $genero['genero_id'];?></td>
						<td><?php echo $genero['genero_nombre'];?></td>
						<td><?php echo $genero['genero_estado'];?></td>
						<td><?php echo $genero['FechaRegistro'];?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
