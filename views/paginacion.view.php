<div class="paginacion">
	<ul>
		<li><a class="disabled" href="<?php echo RUTA;?>">&laquo;</a></li>
		<?php for($i=1; $i<=$total_paginas; $i++): ?>
			<li><a href="<?php echo RUTA;?>lista_animes.php?p=<?php echo $i;?>"><?php echo $i; ?></a></li>
		<?php endfor; ?>
		<li><a class="disabled" href="<?php echo RUTA;?>">&raquo;</a></li>

	</ul>
</div>