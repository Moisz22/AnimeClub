<?php require 'header.php'; ?>
<div class="container-fluid">
	<div class="row">
		<?php if(isset($anime['anime_banner']) && file_exists("images/banner/$anime[anime_banner]")):?>	
			<img style="width: 100%;" src="images/banner/<?php echo $anime['anime_banner'];?>" alt="<?php echo $anime['anime_banner'];?>">
		<?php else: ?>
			<img style="width: 100%;" src="<?php echo RUTA_BANNER_DE_ERROR; ?>" alt="banner no disponible">
		<?php endif;?>			
	</div>
</div>
		<?php
			$estado = (isset($_SESSION['estado'])) ? ($_SESSION['estado']) : false;
			
			if(isset($_SESSION['usuario'])){

				if($estado == 'registrado'){
					echo '<script>Swal.fire(
	              		"Buen trabajo",
	              		"Anime agregado con éxito!",
	              		"success"
	            	)</script>';
				}elseif($estado == 'actualizado'){
					echo '<script>Swal.fire(
	              		"Buen trabajo",
	              		"Anime actualizado con éxito!",
	              		"success"
	            	)</script>';	
				}elseif($estado == 'eliminado'){	
					echo '<script>Swal.fire(
	              		"Buen trabajo",
	              		"Anime eliminado con éxito!",
	              		"success"
	            	)</script>';
				}elseif($estado == 'reseña agregada'){
					echo '<script>Swal.fire(
						"Buen trabajo",
						"Reseña agregada con éxito!",
						"success"
				  	)</script>';
				}elseif($estado == 'reseña eliminada'){
					echo '<script>Swal.fire(
						"Buen trabajo",
						"Reseña eliminada con éxito!",
						"success"
				  	)</script>';
				}
			}
		?>

<br />
<div class="container">
	<?php if(isset($_SESSION['usuario'])): ?>
		<div class="row">
			<div class="col-8 col-sm-10"></div>
			<div class="col-2 col-sm-1">
				<button type="button" style="margin-left: 10px;" onclick="location.href='editar_anime?id=<?php echo $anime['anime_id'];?>'" class="btn btn-warning fa fa-pencil-square-o" title="Editar"></button>
			</div>
			<div class="col-2 col-sm-1">
				<form id="borrar_anime" action="back-end/eliminar_anime.php" method="POST">
					<input type="hidden" name="anime_id" value="<?php echo $anime['anime_id'];?>">
					<button type="submit" class="btn btn-danger fa fa-trash" title="Eliminar"></button>
				</form>
			</div>
		</div>
	<?php endif; ?>
	<br />

	<div class="row">
		<div class="col-12">
			<h1 class="text_align_center text-capitalize"><b><?php echo $anime['anime_nombre'];?></b></h1>
		</div>
	</div>
	<?php
		if(isset($_SESSION['estado'])){
			unset($_SESSION['estado']);
		}
	?>

	<br />

	<div class="row">
		<div class="col-sm-3 col-12">
			<?php if(isset($anime['anime_imagen']) && file_exists("images/animes/$anime[anime_imagen]")):?>
				<img class="centrar_imagen" style="width: 260px;" src="images/animes/<?php echo $anime['anime_imagen'];?>" alt="<?php echo $anime['anime_imagen'];?>">
			<?php else: ?>
				<img class="centrar_imagen" style="width: 260px;" src="<?php echo RUTA_IMAGEN_DE_ERROR; ?>" alt="imagen no disponible">
			<?php endif; ?>
			<p class="estado_anime"><i class="fa fa-television"></i>
				<?php echo $anime['anime_actualidad']; ?></p>
			<div class="row">
				<div class="col-6">
					<p class="capitulos_vistos"><i class="fa fa-eye"></i>
						<?php echo $anime['anime_capitulo_terminado_ver']; ?>
					</p>
				</div>
				<div class="col-6">
					<p class="episodios"><i class="fa fa-film"></i>
						<?php echo $anime['anime_cantidad_capitulos'].' EP'; ?>
					</p>
				</div>
			</div>
		</div>
		<div class="col-sm-1"></div>
		<div style="background: #EAF9F8; border-radius: 10px" class="col-sm-8 col-12">
			<p></p>
			<h3 class="text_align_center">Sinopsis</h3>
			<p></p>
			<nav>
				<?php if($generos == true): ?>
					<?php foreach($generos as $genero): ?>
						<a class="generos_estilo" href="lista_animes?g=<?php echo $genero['genero_nombre']; ?>"><?php echo $genero['genero_nombre']; ?></a>
					<?php endforeach; ?>
				<?php endif;?>
			</nav>
			<p class="centrar_imagen text_align_left"><?php echo($anime['anime_sinopsis']); ?></p>
		</div>
	</div>
</div>
<br />
<br />
<div class="container" style="background: #EAF9F8; border-radius: 10px;" id="resenia_container">
	<br />
	<div class="row">
	<?php if(isset($_SESSION['usuario'])): ?>
		<?php if(!isset($reseña['resenia_valoracion'])): ?>
			<button onclick="añadir_reseña()" style="margin-left: 10px;" class="btn btn-success fa fa-comments-o"></button>
		<?php else: ?>
			<button style="margin-left: 10px;" class="btn btn-danger fa fa-trash" onclick="confirmar_eliminacion_logica_reseña('<?php echo $reseña["resenia_id"];?>')"></button>
		<?php endif; ?>
	<?php endif; ?>
		<div class="col-12">
			<h2 class="text_align_center">Reseña</h2>
		</div>
	</div>
	<br />
	<div class="row">
		<div class="col-4">
		<?php if(isset($reseña['resenia_valoracion'])): ?>
			<?php for($i=1; $i<=$reseña['resenia_valoracion']; $i++):?>
				<i class="fa fa-star" style="color: #E4D134;"></i>
			<?php endfor;?>
		<?php endif;?>
		</div>
		<div class="col-5">
			<?php if(isset($reseña['resenia_titulo'])): ?>
				<p><?php echo $reseña['resenia_titulo'];?></p>
			<?php endif;?>
		</div>
		<div class="col-3">
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<?php if(isset($reseña['resenia_comentarios'])): ?>
				<p><?php echo $reseña['resenia_comentarios'];?></p>
			<?php endif; ?>
		</div>
	</div>
	<br />
</div>
<br />

<input type="hidden" id="anime_id" value="<?php echo $anime['anime_id'];?>">

<script type="text/javascript">
	
	// devinimos los tres eventos del formulario
	document.getElementById("borrar_anime").addEventListener("submit", submit);
	document.getElementById("ok").addEventListener("click", enviar);
	document.getElementById("ko").addEventListener("click", cancelar);
 
	// Funcion que se ejecuta al pulsar el botón enviar el formulario
	function submit(e) {
	// Cancelams el envio a la espera de que valide el formulario
		e.preventDefault();
 
	// Mostramos la capa con el formulario de validacion
		alertify.confirm('Confirmar eliminación', 'Estas seguro de eliminar el anime', function(){ document.forms["borrar_anime"].submit(); }
                ,function(){ alertify.error('Cancelado')});
			
		}
</script>

<?php require 'footer.php';
			



