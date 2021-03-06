<?php

$total_paginas = paginacion_tablas($conexion, 5, 'anime');

$pagina = 'lista_animes';

?>
<section class="paginacion">
	<ul>
		<?php if(pagina_actual() == 1):?>
			<li class="disabled">&laquo;</li>
		<?php else:?>
			<li style="padding-bottom: 10px;"><a href="<?php echo $pagina;?>?p=<?php echo pagina_actual() - 1;?>">&laquo;</a></li>
		<?php endif;?>
		
		<?php for($i=1; $i<=$total_paginas; $i++): ?>
			<?php if(pagina_actual() == $i):?>
				<li class="active"><?php echo $i; ?></li>
			<?php else: ?>
				<li><a href="<?php echo $pagina;?>?p=<?php echo $i;?>"><?php echo $i; ?></a></li>
			<?php endif;?>
			
		<?php endfor; ?>

		<?php if(pagina_actual() == $total_paginas): ?>
			<li class="disabled">&raquo;</li>
		<?php else:?>
			<li><a href="<?php echo $pagina;?>?p=<?php echo pagina_actual() +1;?>">&raquo;</a></li>
		<?php endif; ?>
		

	</ul>
</section>