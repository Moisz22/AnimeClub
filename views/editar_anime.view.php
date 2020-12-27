<?php require 'header.php'; ?>
<div class="section contact_section">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12 theme_color_bg fc3726 padding_0">
            <div class="full">
               <div class="row">
                  <div class="col-sm-12 col-md-10 offset-lg-1">
                     <div class="full contact_form">
                        <form onsubmit="return validaregistro()" method="POST" class="contact_form_inner" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
                           <input type="hidden" name="id" value="<?php echo $anime['anime_id'];?>">
                           <input type="hidden" name="imagen_base" value="<?php echo $anime['anime_imagen'];?>">
                           <input type="hidden" name="banner_base" value="<?php echo $anime['anime_banner'];?>">
                           <fieldset>
                              <div class="field">
                                 <input type="text" name="anime_nombre" value="<?php echo isset($anime['anime_nombre']) ? $anime['anime_nombre'] : '';?>" placeholder="Nombre del anime" required />
                              </div>
                              <div class="field">
                                 <input type="number" name="anime_cantidad_capitulos" value="<?php echo $anime['anime_cantidad_capitulos'];?>" placeholder="Cantidad de capítulos" min="1" required />
                              </div>
                              <div class="field">
                                 <input type="number" name="anime_capitulo_terminado_ver" value="<?php echo $anime['anime_capitulo_terminado_ver'];?>" placeholder="Ultimo capítulo visto" min="1" required />
                              </div>
                              <div class="field">
                                 <textarea style="border: 2px solid #ccc" name="anime_sinopsis" cols="15" rows="5" placeholder="Escriba la sinopsis aqui"><?php echo $anime['anime_sinopsis'];?></textarea>
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

                              <br />
                              <div class="custom-file">
                                 <input type="file" class="custom-file-input" id="inputGroupFile03" name="foto">
                                 <label for="inputGroupFile03" class="custom-file-label">Imagen del anime</label>
                              </div>
                              <br /><br />
                              <div class="custom-file">
                                 <input type="file" class="custom-file-input" id="inputGroupFile04" name="banner">
                                 <label for="inputGroupFile03" class="custom-file-label">Banner del anime</label>
                              </div>
                              <br />
                                 <br />

                              <div class="field center">
                                 <button class="margin-top_30">ACTUALIZAR</button>
                              </div>
                           </fieldset>
                        </form>
                        <ul>
                           <?php if(isset($errores) && !empty($errores)): ?>
                              <?php echo $errores; ?>
                           <?php endif; ?>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php require 'footer.php';?>