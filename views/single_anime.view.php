<div class="container-fluid">
	<div class="row">
		<?php if(isset($anime['anime_banner'])):?>	
			<img style="width: 100%;" src="images/banner/<?php echo $anime['anime_banner'];?>" alt="<?php echo $anime['anime_banner'];?>">
		<?php else: ?>
			<img style="width: 100%;" src="images/banner/banner_no_existe.jpg" alt="banner no disponible">
		<?php endif;?>			
	</div>
</div>

<br />
<div class="container">
	<?php if(isset($_SESSION['usuario'])): ?>
		<div class="row">
			<div class="col-8 col-sm-10"></div>
			<div class="col-2 col-sm-1">
				<button type="button" style="margin-left: 10px;" onclick="location.href='editar_anime.php?id=<?php echo $anime['anime_id'];?>'" class="btn btn-warning fa fa-pencil-square-o" title="Editar"></button>
			</div>
			<div class="col-2 col-sm-1">
				<form id="borrar_anime" action="eliminar_anime.php" method="POST">
					<input type="hidden" name="anime_id" value="<?php echo $anime['anime_id'];?>">
					<button type="submit" class="btn btn-danger fa fa-trash" title="Eliminar"></button>
				</form>
			</div>
		</div>
	<?php endif; ?>
	<br />     
	<div id="capa" style="z-index: 3;">
		<div>
			<div class="title">Confirmar la eliminación de este anime</div>
			<div class="text">Estas seguro de eliminar el anime de <?php echo $anime['anime_nombre'];?></div>
			<div class="buttons">
				<input type="button" class="button" value="Confirmar" id="ok">&nbsp;
				<input type="button" class="button" value="Cancelar" id="ko">
			</div>
		</div>
	</div>


	<script>
	// devinimos los tres eventos del formulario
		document.getElementById("borrar_anime").addEventListener("submit", submit);
		document.getElementById("ok").addEventListener("click", enviar);
		document.getElementById("ko").addEventListener("click", cancelar);
 
		// Funcion que se ejecuta al pulsar el botón enviar el formulario
		function submit(e) {
		// Cancelams el envio a la espera de que valide el formulario
			e.preventDefault();
 
		// Mostramos la capa con el formulario de validacion
			document.getElementById("capa").style.display="block";
			
		}
 
		// Funcion que se ejecuta al pulsar el boton Enviar de cuadro de dialogo
		function enviar(e) {
			// Escondemos la capa
			document.getElementById("capa").style.display="none";
 
			// Enviamos el formulario
			document.forms["borrar_anime"].submit();
		}
 
		// Funcion que se ejecuta al pulsar el boton Cancelar de cuadro de dialogo
		function cancelar(e) {
			// Simplemente escondemos el cuadro de dialogo
			document.getElementById("capa").style.display="none";
		}
	</script>



	<div class="row">
		<div class="col-12">
			<h1 class="text_align_center"><b><?php echo $anime['anime_nombre'];?></b></h1>
		</div>
	</div>

	<?php
		$estado = (isset($_GET['estado'])) ? ($_GET['estado']) : false ;
		$estado = limpiarDatos($estado);
		if($estado == 'actualizado'){
			modal('Anime actualizado exitosamente');
		}
	?>

	<br />
	<div class="row">
		<div class="col-sm-3 col-12">
			<?php if(isset($anime['anime_imagen'])):?>
				<img class="centrar_imagen" style="width: 260px;" src="images/animes/<?php echo $anime['anime_imagen'];?>" alt="<?php echo $anime['anime_imagen'];?>">
			<?php else: ?>
				<img class="centrar_imagen" style="width: 260px;" src="images/animes/imagen_no_existe.jpg" alt="imagen no disponible">
			<?php endif; ?>
			<p class="estado_anime"><i class="fa fa-television"></i>
				<?php echo $anime['anime_actualidad']; ?></p>
			<div class="row">
				<div class="col-6">
					<p class="capitulos_vistos"><i class="fa fa-eye"></i>
						<?php echo $anime['anime_estado_vista']; ?>
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
		<div style="background: #EAF9F8;" class="col-sm-8 col-12">
			<p></p>
			<h3 class="text-align_center">Sinopsis</h3>
			<p></p>
			<nav>
				<?php if($generos == true): ?>
					<?php foreach($generos as $genero): ?>
						<a id="generos_estilo" href="lista_animes.php?g=<?php echo $genero['genero']; ?>"><?php echo $genero['genero']; ?></a>
					<?php endforeach; ?>
				<?php endif;?>
			</nav>
			<p style="display:block; margin:auto; text-align: left;"><?php echo $anime['anime_sinopsis']; ?></p>
		</div>
	</div>
</div>
<br />
<br />
<div style="background: #EAF9F8" class="container">
	<br />
	<div class="row">
		<div class="col-12">
			<h2 style="text-align: center;">Reseña</h2>
		</div>
	</div>
	<br />
	<div class="row">
		<div class="col-4">
		<?php if(isset($reseña['reseña_valoracion'])): ?>
			<?php for($i=1; $i<=$reseña['reseña_valoracion']; $i++):?>
				<i class="fa fa-star" style="color: #E4D134;"></i>
			<?php endfor;?>
		<?php endif;?>
		</div>
		<div class="col-5">
			<?php if(isset($reseña['reseña_titulo'])): ?>
				<p><?php echo $reseña['reseña_titulo'];?></p>
			<?php endif;?>
		</div>
		<div class="col-3">
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<?php if(isset($reseña['reseña_comentarios'])): ?>
				<p><?php echo $reseña['reseña_comentarios'];?></p>
			<?php endif; ?>
		</div>
	</div>
	<br />
</div>
<br />
			



