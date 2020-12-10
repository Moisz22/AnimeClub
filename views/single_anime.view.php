<div class="container-fluid">
	<div class="row">	
			<img style="width: 100%; height:400px;" src="<?php echo RUTA;?>/images/banner/<?php echo $anime['anime_banner'];?>" alt="">	
				

	</div>
</div>

<br />
<div class="container">
	<div class="row">
		<div class="col-sm-3 col-12">
			<img style="width: 260px; display:block; margin:auto;" src="<?php echo RUTA;?>/images/animes/<?php echo $anime['anime_imagen'];?>" alt="">
			<p class="estado_anime"><i class="fa fa-television"></i>
				<?php echo $anime['anime_actualidad']; ?></p>
			<div class="row">
				<div class="col-6">
					<p class="estado_anime"><i class="fa fa-eye"></i>
						<?php echo $anime['anime_estado_vista']; ?>
					</p>
				</div>
				<div class="col-6">
					<p class="estado_anime"><i class="fa fa-film"></i>
						<?php echo $anime['anime_cantidad_capitulos'].' EP'; ?>
					</p>
				</div>
			</div>
		</div>
		<div class="col-sm-1"></div>
		<div style="background: #EAF9F8;" class="col-sm-8 col-12">
			<p></p>
			<h3 style="text-align: center;">Sinopsis</h3>
			<p></p>
			<nav>
				<?php foreach($generos as $genero): ?>
					<a href="<?php echo RUTA;?>lista_animes.php?g=<?php echo $genero['genero']; ?>"><?php echo $genero['genero']; ?></a>
				<?php endforeach; ?>
			</nav>
			<p style="display:block; margin:auto; text-align: left;"><?php echo $anime['anime_sinopsis']; ?></p>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-12">
			<h2 style="text-align: center;">Reseña</h2>
		</div>
	</div>
</div>

