<div class="container-fluid">
	<div class="row">	
			<img style="width: 100%; height:400px;" src="<?php echo RUTA;?>/images/banner/<?php echo $anime['anime_banner'];?>" alt="">	
				

	</div>
</div>

<br />
<div class="container">
	<div class="row">
		<div class="col-sm-3 col-12" style="">
			<img style="width: 260px; display:block; margin:auto;" src="<?php echo RUTA;?>/images/animes/<?php echo $anime['anime_imagen'];?>" alt="">
		</div>
		<div class="col-sm-1"></div>
		<div class="col-sm-8 col-12">
			<p></p>
			<h3 style="text-align: center;">Sinopsis</h3>
			<p></p>
			<p style="display:block; margin:auto; text-align: left;"><?php echo $anime['anime_sinopsis']; ?></p>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<p><?php echo $anime['anime_nombre']; ?></p>
		<p><i class="fa fa-television"></i><?php echo $anime['anime_actualidad']; ?></p>
		<p><?php echo $anime['anime_estado_vista']; ?></p>
		<p><?php echo $anime['anime_cantidad_capitulos']; ?></p>
		<p></p>
	</div>
</div>

<ul>
	<?php foreach($generos as $genero): ?>
		<li><a href=""><?php echo $genero['genero']; ?></a></li>
	<?php endforeach; ?>
</ul>