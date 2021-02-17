<?php require 'header.php'; ?>
<div class="section contact_section">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12 theme_color_bg fc3726 padding_0">
            <div class="full">
               <div class="row">
                  <div class="col-sm-12 col-md-10 offset-lg-1">
                     <div class="full contact_form">
                        <?php if($errores): ?>
                           <?php  foreach($errores as $error): ?>
                           <div class="alert alert-danger alert-dismissible fade show" role="alert"> 
                              <?php echo $error;?>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <?php  endforeach; ?>
                        <?php endif; ?>
                        <form onsubmit="return validaregistro()" method="POST" class="contact_form_inner" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
                           <input type="hidden" name="id" value="<?php echo $anime['anime_id'];?>">
                           <input type="hidden" name="imagen_base" value="<?php echo $anime['anime_imagen'];?>">
                           <input type="hidden" name="banner_base" value="<?php echo $anime['anime_banner'];?>">
                           <fieldset>
                              <div class="field">
                                 <input type="text" name="anime_nombre" id="anime_nombre" value="<?php echo isset($anime['anime_nombre']) ? $anime['anime_nombre'] : '';?>" placeholder="Nombre del anime"/>
                              </div>
                              <div class="field">
                                 <input type="number" name="anime_cantidad_capitulos" id="anime_cantidad_capitulos" value="<?php echo $anime['anime_cantidad_capitulos'];?>" title="Cantidad de capítulos" placeholder="Cantidad de capítulos" min="1" required />
                              </div>
                              <div class="field">
                                 <input type="number" name="anime_capitulo_terminado_ver" id="anime_capitulo_terminado_ver" value="<?php echo $anime['anime_capitulo_terminado_ver'];?>" title="Capitulos Vistos" placeholder="Ultimo capítulo visto" min="1" required />
                              </div>
                              <div class="field">
                                 <textarea style="border: 2px solid #ccc" name="anime_sinopsis" id="anime_sinopsis" cols="15" rows="5" placeholder="Escriba la sinopsis aqui"><?php echo $anime['anime_sinopsis'];?></textarea>
                              </div>
                              <br />

                              <div class="input-group mb-3">
                                 <div class="input-group-prepend">
                                    <label class="input-group-text" for="anime_actualidad">Estado</label>
                                 </div>
                                 <select class="custom-select" id="anime_actualidad" name="anime_actualidad">
                                    <?php if($anime['anime_actualidad'] == 'Terminado'):?>
                                       <option value="Terminado" selected>Terminado</option>
                                       <option value="En emision">En emision</option>
                                    <?php elseif($anime['anime_actualidad'] == 'En emision'): ?>
                                       <option value="Terminado">Terminado</option>
                                       <option value="En emision" selected>En emision</option>
                                    <?php else:?>
                                       <option value="Terminado">Terminado</option>
                                       <option value="En emision" selected>En emision</option>
                                 <?php endif; ?>
                                </select>
                              </div>
                              <small class="form-text text-muted">Estado del anime en television: en emisión o terminado</small>
                              <br />
                              
                              <div class="input-group mb-3" id="select_estreno" style="display:none">
                                 <div class="input-group-prepend">
                                    <label class="input-group-text" for="dia_estreno">Día proximos episodios</label>
                                 </div>
                                 <select class="custom-select" id="dia_estreno" name="dia_estreno">
                                    <option value="">Elija opcion</option>
                                    <?php foreach($dias as $dia): ?>
                                       <?php if($dia == $anime['anime_dia_capitulo_siguiente']): ?>
                                          <option selected value="<?php echo $dia; ?>"><?php echo $dia; ?></option>
                                       <?php else: ?>
                                          <option value="<?php echo $dia; ?>"><?php echo $dia; ?></option>
                                       <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <br />
                              </div>

                              <div class="custom-file">
                                 <input type="file" class="custom-file-input" id="inputGroupFile03" name="foto">
                                 <label for="inputGroupFile03" class="custom-file-label">Imagen del anime</label>
                              </div>
                              <br /><br />
                              <div class="custom-file">
                                 <input type="file" class="custom-file-input" id="inputGroupFile04" name="banner">
                                 <label for="inputGroupFile03" class="custom-file-label">Banner del anime</label>
                              </div>
                              <br /><br />
                              <div class="custom-file">
                                 <select class="js-example-basic-multiple" id="id_label_multiple" name="generos[]" multiple="multiple">
                                    <?php foreach($generos as $genero): ?>
                                       <?php if($generos_seleccionados !== false): ?>
                                          <?php if(in_array($genero['genero_nombre'], $genr)): ?>
                                             <option selected value="<?php echo $genero['genero_id'];?>"><?php echo $genero['genero_nombre'];?></option>
                                          <?php else: ?>
                                             <option value="<?php echo $genero['genero_id'];?>"><?php echo $genero['genero_nombre'];?></option>
                                          <?php endif; ?>
                                       <?php else: ?>
                                          <option value="<?php echo $genero['genero_id'];?>"><?php echo $genero['genero_nombre'];?></option>
                                       <?php endif; ?>
                                    <?php endforeach; ?> 
                                 </select>
                              </div>
                              <small class="form-text text-muted">Géneros del anime</small>
                              <br />
                              <br />

                              <div class="field center">
                              <button type="submit" class="margin-top_30 btn btn-success">GUARDAR CAMBIOS</button>
                              </div>
                           </fieldset>
                        </form>
                        <br />
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php require 'footer.php';?>