<br /><br /><br /><br />
	<?php $c=1; ?>

	<h1 style="text-align: center;"><b>Lista Completa de Animes</b></h1>
	<br />
	<div class="container">
		<div class="row">
			<?php foreach($animes as $anime): ?>
				<div class="col-3 col-sm-2">
					<a href="single_anime.php?id=<?php echo $anime['anime_id']; ?>">
						<img id="animes_lista" src="<?php echo RUTA;?>images/animes/<?php echo $anime['imagen']; ?>">
						<p><?php echo $anime['anime_nombre'];?></p>
					</a>
				</div>
			<?php endforeach; ?>
		</div>
			
	</div>
</body>
</html>

<?php require 'paginacion.php'; ?>

<?php require 'footer.php'; ?>


?>