<?php 
require 'config/config.php';
require 'functions.php';

$conexion = conexion($bd_config);

$animes = animes_eliminados($conexion);

?>
<div class="container">
	<div class="table-responsive">
		<table class="table table-hover table-dark">
			<thead>
				<tr>
					<th class="text_align_center">Nombre</th>
					<th class="text_align_center">Foto</th>
					<th class="text_align_center">Estado Tv</th>
					<th class="text_align_center">Estado Vista</th>
					<th class="text_align_center">Restaurar</th>
					<th class="text_align_center">Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($animes as $anime): ?>
					<tr>
						<td class="text_align_center"><?php echo $anime['anime_nombre'];?></td>
						<td><img class="animes_lista centrar_imagen" src="images/animes/<?php echo $anime['anime_imagen'];?>" alt="<?php echo $anime['anime_nombre'];?>"></td>
						<td class="text_align_center"><?php echo $anime['anime_actualidad'];?></td>
						<td class="text_align_center"><?php echo $anime['anime_estado_vista'];?></td>
						<td class="text_align_center"><button style="margin-top: 50px;" value="<?php echo $anime['anime_id'];?>" class="btn btn-warning fa fa-arrow-up" onclick="confirmar_retorno()" id="retorno_registro"></button></td>
						<td class="text_align_center"><button style="margin-top: 50px;" value="<?php echo $anime['anime_id'];?>" onclick="confirmar_eliminacion()" class="btn btn-danger fa fa-trash" id="eliminacion_permanente"></button></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>



